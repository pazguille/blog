---
title: >
  Mejorando el LCP usando WebP
description: >
  Armé un servicio para optimizar las imágenes de la API de Microsoft que afectaban el LCP de https://xstoregames.com
publish_date: 2022-09-13
cover_html: <img alt="" src="/assets/lcp-optimize.jpg" style="margin:0 auto;" width="592" height="177">
og:image: https://blog.pazguille.me/assets/lcp-optimize.jpg
---

---


*El post fue actualizado en base a un comentario de [@javiperezrequejo](https://medium.com/@javiperezrequejo/el-problema-principal-que-yo-he-encontrado-es-la-compatibilidad-con-sobre-todo-versiones-m%C3%A1s-846611d30644).*

En los ratos libres vengo trabajando en optimizar la performance de [XStore](https://xstoregames.com), [el side project para explorar el catálogo de juegos de Xbox](https://blog.pazguille.me/2022/xstore-la-tienda-argenta-de-xbox).

Actualmente está construido con una arquitectura [100% client-side](https://www.patterns.dev/posts/client-side-rendering/) y sin usar ningún framework, es todo vanilla. A pesar de ser client-side rendering performa muy bien y con buenos valores para los [Core Web Vitals](https://web.dev/vitals/), salvo para el LCP que está en casi 3 segundos.

[![](/assets/lcp-web-vitals.webp)](https://pagespeed.web.dev/report?url=https%3A%2F%2Fxstoregames.com%2F)

En este caso el LCP son las imágenes de los juegos y vienen de una API que consumo de Microsoft de la cual no soy dueño.

[Las imágenes son el recurso más pesado de la web](https://almanac.httparchive.org/en/2021/page-weight#page-weight-by-the-numbers) cuando no se optimizan y, en mi caso, al no ser el dueño no tengo control para optimizarlas. Pero... ¿no tengo control para optimizarlas?

¡Sí, lo tengo! Para ello, armé un "servicio" que me permite optimizar las imágenes que me devuelve la API de Microsoft y entregar [WebP](https://xbox-games-api.vercel.app/api/image/apps.3458.14519454624678828.1302cdcc-5bca-4ad4-9d5f-5610ae87cd80.0060eafa-b18a-4e2e-b30b-17de3326c7f1) en vez de [JPG](https://store-images.s-microsoft.com/image/apps.3458.14519454624678828.1302cdcc-5bca-4ad4-9d5f-5610ae87cd80.0060eafa-b18a-4e2e-b30b-17de3326c7f1).

El formato de imágenes WebP es más liviano que JPEG / PNG y tiene [muy buen soporte en los navegadores modernos](https://caniuse.com/webp). Recomiendo [usar WebP siempre que se pueda](https://web.dev/serve-images-webp/).

La imagen de la izquierda está sin optimizar y pesa 304KB, mientras que la de la derecha está optimizada y pesa 140KB.

[![](/assets/jpg-to-webp.webp)](/assets/jpg-to-webp.webp)


De esta forma, [pude mejorar el LCP de 2.6s a 2.3s](https://www.webpagetest.org/video/compare.php?tests=220912_BiDcJ6_G5X%2C220831_BiDcYA_G1X&thumbSize=200&ival=100&end=lcp) y bajar el peso de todas las imágenes que se cargan.

![](/assets/webpagetest-webp.webp)

El "servicio" es muy simple ([unas 20 líneas](https://github.com/pazguille/xbox-games-api/blob/main/api/image.js)) gracias a la librería [sharp](https://www.npmjs.com/package/sharp) y, básicamente, actúa como proxy yendo a buscar la imagen original, la optimiza y la sirve con el formato WebP ⚡️.

**Actualizado**. Es importante tener en cuenta el header `accept` para validar que el dispositivo que pide la imagen soporte `image/webp`. Si lo soporta se entrega `webp`, sino entrega una versión optimizada de `jpeg`.

```js
const axios = require('axios');
const sharp = require('sharp');

module.exports = async (req, res) => {
  const path = req.query.path;
  delete req.query.path;

  const queryString = new URLSearchParams(req.query).toString();
  const microsoft = `https://store-images.s-microsoft.com/image/${path}?${queryString}`;
  const response = await axios.get(microsoft, { responseType: 'arraybuffer' });

  const format = req.headers.accept.includes('image/webp') ? 'webp' : 'jpeg';

  const data = await sharp(response.data)
    [format]({ quality: 80 })
    .toBuffer();

  res.setHeader('Content-Type', `image/${format}`);
  res.setHeader('Content-Length', data.length);
  res.setHeader('Cache-Control', 'public, max-age=31536000, immutable');

  return res.status(200).send(data);
};
```


Todo recurso se puede optimizar no importa quién sea su dueño.

Chao. 🚀

---


*Foto de cover de https://web.dev/optimize-lcp/*.
