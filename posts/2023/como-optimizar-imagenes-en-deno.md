---
title: >
  ¿Cómo optimizar imágenes en Deno?
description: >
  La idea es compartir cómo utilizar ImageMagick para optimizar imágenes en Deno.
publish_date: 2023-03-08
cover_html: <img alt="" src="/assets/imagemagick-deno.jpg" style="margin:0 auto;" width="592" height="303">
og:image: https://blog.pazguille.me/assets/imagemagick-deno.jpg
---

---

Hace unos meses escribí sobre cómo [mejoré la métrica LCP usando WebP](https://blog.pazguille.me/2022/mejorando-el-lcp-usando-webp) en [xstoregames.com](http://xstoregames.com/) creando una [Serverless Function](https://github.com/pazguille/xbox-games-api/blob/main/api/image.js) en Vercel.

Actualmente, estoy trabajando en [la tienda de PlayStation](https://pstoregames.deno.dev/) usando Deno y [🍋 Fresh](https://fresh.deno.dev/) y quería mantener esta optimización para las imágenes.

El principal problema que encontré fue que [sharp no tiene soporte completo para Deno](https://github.com/lovell/sharp/issues/2583). Por lo menos, leyendo y probando lo que mencionaban en los comentarios no lo pude hacer andar.

Luego de buscar un rato, encontré el módulo [ImageMagick](https://github.com/lumeland/imagemagick-deno) con soporte completo y fue super fácil.

## ImageMagick al rescate

```js
import {
  ImageMagick,
  MagickFormat,
  initializeImageMagick,
} from 'imagemagick';

await initializeImageMagick();

function optimizeImage(imageBuffer, format) {
  return new Promise(resolve => {
    const ib = new Uint8Array(imageBuffer);
    ImageMagick.read(ib, img => {
      img.quality = 70;
      img.write(
        d => resolve(d),
        format === 'webp' ? MagickFormat.Webp : MagickFormat.Jpg
     );
    });
  });
};
```

**Antes: 1 MB**

<img src="https://image.api.playstation.com/vulcan/ap/rnd/202208/0921/3XopdGAJGRy3xNQKnQDvaCRs.png" loading="lazy" width="100%" />

**Después: 448 kB**

<img src="https://ps-games-api.deno.dev/api/image/vulcan/ap/rnd/202208/0921/3XopdGAJGRy3xNQKnQDvaCRs.png" loading="lazy" decoding="async" width="100%" />

## En el servicio usando acorn

```js
import {
  ImageMagick,
  MagickFormat,
  initializeImageMagick,
} from 'imagemagick';

await initializeImageMagick();

function optimizeImage(imageBuffer, format) {
  return new Promise(resolve => {
    const ib = new Uint8Array(imageBuffer);
    ImageMagick.read(ib, img => {
      img.quality = 70;
      img.write(
        d => resolve(d),
        format === 'webp' ? MagickFormat.Webp : MagickFormat.Jpg
     );
    });
  });
};

export default async (ctx) => {
  const path = ctx.params.path;
  const queryString = new URLSearchParams(ctx.searchParams).toString();
  const ps = `https://image.api.playstation.com/${path}?${queryString}`;

  const response = await fetch(ps).then(res => res.arrayBuffer());
  const format = ctx.request.headers.get('accept').includes('image/webp') ? 'webp' : 'jpeg';

  const data = await optimizeImage(response, format);

  return new Response(data, {
    status: 200,
    headers: {
      'Content-Type': `image/${format}`,
      'Content-Length': data.byteLength,
      'Cache-Control': 'public, max-age=31536000, immutable',
    },
  });
};
```

Chao. 🚀

---
