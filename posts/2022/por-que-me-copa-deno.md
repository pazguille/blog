---
title: >
  ¿Por qué me copa Deno?
description: >
  Una dato que no suma nada es que DE-NO al revés es NO-DE, pero ahora todo tiene sentido.
publish_date: 2022-07-30
cover_html: <img alt="" src="/assets/deno-logo.png" style="margin:0 auto;" width="256" height="256">
---

---

Una dato que no suma nada es que DE-NO al revés es NO-DE, pero ahora todo tiene sentido.

Deno (se pronuncia [/ˈdiːnoʊ/](http://ipa-reader.xyz/?text=%CB%88di%CB%90no%CA%8A), en argento dino) es un runtime para JavaScript y TypeScript basado en V8, escrito en Rust + Tokio por [Ryan Dahl](https://github.com/ry) (el creador de Node).

Me copa porque:

- Tiene foco en ser [compatible con la plataforma web](https://deno.land/manual/runtime/web_platform_apis) (funciona como el navegador).
- Soporta TypeScript y WebAssembly out-of-the-box.
- Usa solo ES Modules, no CommonJS.
- Usa URLs para cargar dependencias locales o remotas (como el navegador) en vez de NPM.
- Permite controlar permisos para acceder al sistema de archivos. el acceso de red o el entorno.
- [Toma los errores de diseño de Node.js](https://www.youtube.com/watch?v=M3BM9TB-8yA&ab_channel=JSConf) y evoluciona.
- Nos permite server-side rendering (SSR) + JSX out-of-the-box.

En lo personal no uso TypeScript y por suerte está la opción de usar JavaScript vanilla. Sin embargo, [gracias a TypeScript es que soporta JSX](https://deno.land/manual/jsx_dom/overview).

Gracias a esto podemos enfocarnos en lo que tenemos que resolver y no perder tiempo en configurar dependencias, transpilers y *such much boilerplate*.

Así es como podemos tener un server-side rendering (SSR) + JSX en Deno:

```js
// deno-ssr.jsx

/** @jsx h */
/** @jsxFrag Fragment */
import { serve } from "https://deno.land/std@0.140.0/http/server.ts";
import { h } from "https://esm.sh/preact";
import { render } from "https://esm.sh/preact-render-to-string";

function App() {
  return (
    <html>
      <head>
        <title>Deno + JSX</title>
      </head>
      <body>
        <h1>Deno con Preact</h1>
      </body>
    </html>
  );
}

function handler() {
  const html = render(<App />);
  return new Response(html, {
    headers: {
      "content-type": "text/html",
    },
  });
}

serve(handler, { port: 3030 });
// deno run --allow-net=:3030 https://gist.githubusercontent.com/pazguille/7a4e0569937d00abef45564d10542bd5/raw/12e31508adc92591fbcfde163571f73da2bda63c/deno-ssr.jsx
```

Node fue la tecnología que permitió evolucionar el frontend y su desarrollo. Acercarnos al server y pensar en isomorphic, eso lo cambió todo. Deno sigue el mismo camino y más cerca de los estándares y la plataforma web, por eso me copa.

Comparto [la visión que tiene Ryah sobre como construir los fronts](https://www.youtube.com/watch?v=pBcFJmQ6UVM&ab_channel=Remix) y la simplicidad que necesitamos.

¿Deno hoy reemplaza Node? ¿Salgo corriendo a migrar todo? ¿Me enojo porque en mi  laburo no lo usamos?

- No.

Considero que necesita madurar, necesita comunidad e involucrarnos para potenciarlo. Como paso con Node en unos años empresas de gran tamaño lo van a estar usando y posiblemente ayude a potenciar aún más el desarrollo de frontend.

Chao. 🚀

---
