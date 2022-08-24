---
title: >
  Tagged templates para prevenir XSS
description: >
  No sabía es que se pueden crear `tagged templates`: funciones que permiten parsear los template literals de forma custom.
publish_date: 2022-08-23
cover_html: <img alt="" src="/assets/tagged-templates.png" style="margin:0 auto;" width="592" height="296">
og:image: https://blog.pazguille.me/assets/tagged-templates.png
---

---

Los [template literals o template strings](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Template_literals) fueron un antes y después a la hora de manejar strings en JavaScript.

En lo personal los uso mucho para [crear "componentes de HTML"](https://github.com/pazguille/xbox-games-app/blob/main/src/js/templates.js#L6) y poder reutilizar el markup cuando no uso frameworks o librerías.

Lo que no sabía es que se pueden crear `tagged templates`: funciones que permiten parsear los template literals de forma custom:

```js
function rocket(strings) {
  return `🚀 ${strings}!`;
};

console.log( rocket`to the moon` );

// '🚀 to the moon!'
```

Parece que no suma mucho ya que podríamos ejecutar una función y listo `rocket('to the moon')`. Pero, pero, pero... al ser un `tagged template` tenemos mucho más poder y control.

Como mencionaba anteriormente, uso mucho template literals para manejar el markup HTML y acá es donde se pone interesante la cuestión.

Un gran problema de seguridad al manejar templates y datos dinámicos son [las vulnerabilidades de XSS](https://developer.mozilla.org/en-US/docs/Glossary/Cross-site_scripting).

```js
function unSafeWelcomeTemplate(username) {
  return`<h1>Hola, ${username}!</h1>`
};

const xss = 'Guille <img src="x" onerror="alert(\'xss\')"> Paz';

document.body.insertAdjacentHTML('beforeend', unsafeWelcomeTemplate(xss));
```

Muchos frameworks y librerías lo resuelven de forma automática y por eso no nos preocupamos de resolverlo, pero en el caso de no usar ninguno podemos crear un `tagged template` que nos ayude.

La función `safe` recibe los `strings` y los `values` de sustitución (los datos dinámicos), por lo que podríamos sanitizar los datos para prevenir un XSS en nuestros templates.

```js
import { escape } from "https://esm.sh/v90/html-escaper@3.0.3/es2022/html-escaper.js";

// safe: tagged template
function safe(strings, ...values) {
  return String.raw({ raw: strings }, ...values.map(v => escape(v)));
};

function welcomeTemplate(username) {
  return safe`<h1>Hola, ${username}!</h1>`
};

const xss = 'Guille <img src="x" onerror="alert(\'xss\')"> Paz';

document.body.insertAdjacentHTML('beforeend', welcomeTemplate(xss));
```

Uso [la función estática `String.raw`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/raw) para poder iterar y formatear los valores sin perder el orden de las sustituciones.

Chao. 🚀

---
