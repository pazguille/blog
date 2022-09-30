---
title: >
  ¿Cómo convertir imágenes a base64 con Deno?
description: >
  El resultado sigue confirmando que me copa Deno porque tiene foco en ser compatible con la plataforma web, funciona como el navegador.
publish_date: 2022-09-30
cover_html: <img alt="" src="/assets/base64-deno.jpg" style="margin:0 auto;" width="592" height="395">
og:image: https://blog.pazguille.me/assets/base64-deno.jpg
---

---

El otro día estaba leyendo un post de Microsoft donde comentan que [usan imágenes en base64 de menor calidad](https://blogs.bing.com/search-quality-insights/august-2022/Fast-Front-End-Performance-for-Microsoft-Bing#:~:text=Two%2Dphase%20image%20loading) para acelerar la carga de LCP y luego cargan una de mayor calidad.

Esto me hizo pensar en cómo lo podría hacer en Deno. El resultado [sigue confirmando que me copa Deno](https://blog.pazguille.me/2022/por-que-me-copa-deno) porque **tiene foco en ser compatible con la plataforma web, funciona como el navegador**.

Por esto motivo, sin usar módulos adicionales y usando la plataforma es posible hacerlo con las APIs:

- [Fetch API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API)
- [Blob](https://developer.mozilla.org/en-US/docs/Web/API/Blob)
- [FileReader API]()

El código a continuación se puede ejecutar tanto en el navegador como en Deno:

```js
function readFileAsync(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => { resolve(reader.result); };
    reader.onerror = reject;
    reader.readAsDataURL(file);
  });
}

const res = await fetch('https://blog.pazguille.me/assets/deno-blog.png');
const blob = await res.blob();
const base64 = await readFileAsync(blob);

console.log(base64);
```

En un web server muy simple quedaría:

```js
/** @jsx h */
import { h } from "https://esm.sh/preact";
import { render } from "https://esm.sh/preact-render-to-string";
import { serve } from "https://deno.land/std/http/server.ts";

const img = 'https://blog.pazguille.me/assets/deno-blog.png';

function App({ base64 }) {
  return (
    <html>
      <head>
        <title>Deno + Base64</title>
      </head>
      <body>
        <h1>Deno + Base64</h1>

        <h2>URL</h2>
        <img width="600" height="300" src={img} />

        <h2>Base64</h2>
        <img width="600" height="300" src={base64} />
      </body>
    </html>
  );
}

function readFileAsync(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => { resolve(reader.result); };
    reader.onerror = reject;
    reader.readAsDataURL(file);
  });
}

async function handler() {
  const res = await fetch(img);
  const blob = await res.blob();
  const base64 = await readFileAsync(blob);

  const html = await render(<App base64={base64} />);
  return new Response(html, {
    headers: {
      "content-type": "text/html",
    },
  });
}

serve(handler, { port: 3030 });

```

¡Lo importante que es aprender a usar la plataforma web!

Chao. 🚀

---