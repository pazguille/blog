---
title: >
  Construyendo módulos de frontend con Browserify
description: >
  En los últimos años el desarrollo de frontend creció tanto que hoy contamos con
  una gran variedad de herramientas, frameworks y librerías para construir aplicaciones que corren casi exclusivamente en el navegador (SPA).
publish_date: 2014-08-09
---

---

En los últimos años el desarrollo de frontend creció tanto que hoy contamos con una gran variedad de herramientas, frameworks y librerías para construir aplicaciones que corren casi exclusivamente en el navegador ([SPA](https://en.wikipedia.org/wiki/Single-page_application)).

La clave a la hora de hacer una SPA es trabajar con pequeños módulos. Esto nos va a ayudar a escribir código mucho más fácil de mantener, refactorizar (en caso de ser necesario) y testear sin volvernos locos.

La idea del post es que construyamos juntos un módulo de frontend utilizando [Browserify](https://browserify.org/) (y otras herramientas), para que nuestros días como frontenders sean más felices.

Para empezar, vamos a definir que un módulo está formado por:
- JavaScript
- Templates (html)
- Stylesheets (css, less, sass)
- Assets (imágenes, fuentes)

Y vamos a utilizar la siguiente estructura de archivos y directorios:

```
|-- module_name/
|  |-- index.js
|  |-- template.jade
|  |-- index.css
|  |-- package.json
|  |-- Readme.md
|  |-- history.md
|  |-- assets/
|  |-- test/
```

## JavaScript

Un módulo de JavaScript es uno o más archivos de código simple que expone solamente aquellas propiedades y métodos necesarios para su uso.

Trabajar de una manera modular nos permite que el código sea independiente, desacoplado, fácil de mantener y reutilizable ([DRY](https://en.wikipedia.org/wiki/Don't_repeat_yourself)).

La versión actual de JavaScript (ES5) no ofrece una forma nativa para trabajar con módulos ([pronto va a ser posible!](http://www.2ality.com/2013/11/es6-modules-browsers.html)). De todos modos, gracias al aporte de la comunidad, hoy contamos con varios proyectos que nos permiten hacerlo de una forma muy simple.

### Hola Browserify!

Browserify es una herramienta [open source](https://github.com/substack/node-browserify) que nos permite crear módulos en el cliente, utilizando la misma sintaxis que en Node ([CommonJS](https://commonjs.org/)). Por lo tanto, vamos a poder requerir y exportar módulos y manejar sus dependencias como en Node pero en el browser.

> "Browserify lets you require('modules') in the browser by bundling up all of your dependencies." - Browserify.org

Una gran ventaja es que nos permite usar [npm](https://www.npmjs.com/) para instalar y manejar las dependencias de nuestros módulos. Por lo que podemos "requerir" cualquier módulo que se encuentre publicado en npm, o bien, utilizar [módulos privados](https://stackoverflow.com/questions/10386310/how-to-install-a-private-npm-module-without-my-own-registry).

[@substack](https://twitter.com/substack) (la mente brillante detrás de todo esto) se tomo el trabajo de portar algunos [módulos core](https://github.com/browserify/browserify#compatibility) de Node para que los podamos utilizar en el navegador y así poder reutilizar al máximo nuestro código ([Isomorphic JavaScript](http://blog.nodejitsu.com/scaling-isomorphic-javascript-code/)).

Para instalarlo, tenemos que correr el siguiente comando en la consola:

```
$ npm install browserify -g
```

A modo de ejemplo, vamos a crear el módulo Modal: va a tener como dependencia al módulo "events" (que ofrece Browserify) y exponer los métodos .show() y .hide().
Ya estamos en condiciones de ponernos manos a la obra y codear:

```js
// index.js

'use strict';

/**
 * Module dependencies.
 */
var Emitter = require('events').EventEmitter;
var inherits = require('util').inherits;

/**
 * Creates a new Modal.
 * @constructor
 * @augments Emitter
 * @returns {modal} - Returns a new instance of Modal.
 * @example var modal = new Modal(options);
 */
function Modal(options) {

  // some code

}

/**
 * Inherits
 */
inherits(Modal, Emitter);

/**
 * Shows a modal.
 * @function
 * @returns {modal}
 * @example modal.show();
 */
Modal.prototype.show = function() {

  // some code

  this.emit('show');
};

/**
 * Hides a modal.
 * @function
 * @returns {modal}
 * @example modal.hide();
 */
Modal.prototype.hide = function() {

  // some code

  this.emit('hide');
};

/**
 * Expose Modal
 */
module.exports = Modal
```

Ahora, tenemos que generar el archivo ".js" que vamos a incluir en nuestro HTML. Para eso, corremos el siguiente comando en la consola:

```
$ browserify -r ./index.js:modal -o bundle.js
```

*Nota: les recomiendo que [lean la documentación](https://github.com/browserify/browserify#usage) para conocer todos los parámetros que podemos utilizar.*

Ya podemos agregar en nuestro HTML el archivo "bundle.js" y empezar a utilizar el Modal.

```html
// index.html

<script src="bundle.js"></script>
<script>
  var Modal = require('modal');
  var dialog = new Modal(options);
  dialog.show();
</script>
```

### Transformaciones

Antes de incluir los diferentes archivos de JavaScript en el bundle (archivo) final, Browserify nos permite pre-procesarlos utilizando [una serie de transformaciones](https://github.com/browserify/browserify/wiki/list-of-transforms). Son muy útiles a la hora de compilar CoffeeScript, minificar el código o compilar templates.

Para utilizarlas, primero tenemos que instalarlas y luego indicar su nombre mediante el parámetro "-t" al generar el bundle.

Supongamos que el código anterior lo escribimos en CoffeScript y ahora necesitamos compilar los ".coffee" a ".js" para poder utilizarlos. Para esto, hay una transformación que se llama coffeeify.

```
$ npm install coffeeify
$ browserify -t coffeeify index.coffee -o bundle.js
```

### Templates

Como sistema de templates vamos a utilizar [Jade](https://pugjs.org/api/getting-started.html), ya que ofrece una sintaxis muy simple y ágil, además de ser muy potente.

Si bien, Jade es un sistema de templates que fue diseñado para funcionar en el server, para nosotros es una ventaja ya que el día de mañana podríamos renderizar las vistas de nuestra aplicación tanto en el cliente, como desde el server, utilizando los mismos templates.

Algo que tenemos que tener en cuenta es que Browserify solamente nos permite requerir archivos cuya extensión sea ".js" o ".json". Es por eso, que para requerir los templates tenemos que utilizar una transformación para compilar los archivos ".jade" a funciones de JavaScript: jadeify.

Primero, instalamos la transformación:

```
$ npm install jadeify -g
```

Ahora, vamos a crear el template del Modal:

```html
// index.html

<script src="bundle.js"></script>
<script>
  var Modal = require('modal');
  var dialog = new Modal(options);
  dialog.show();
</script>
```

Requerimos el template en el JavaScript del Modal:

```js
// index.js

...

/**
 * Template
 */
var template = require('./template.jade');

...

/**
 * Expose Modal
 */
module.exports = Modal;
```

Y por último, generamos el nuevo bundle utilizando la transformación para compilar los templates:

```
$ browserify -r ./index.js:modal -t jadeify -o bundle.js
```


## Stylesheets

Para trabajar con los archivos CSS estamos [utilizando un fork de npm-css](https://github.com/impronunciable/npm-css). Éste módulo nos permite manipular archivos de CSS y sus dependencias, de la misma forma que npm con módulos de JavaScript. En vez de usar "require()", vamos a usar "@import" poder requerir el CSS de otros módulos.

```
$ npm install npm-css -g
```

Vamos a agregar [normalize.css](https://necolas.github.io/normalize.css/) como dependencia del Modal para luego poder importarlo.

```json
// package.json

...
  "dependencies": {
    "normalize.css": "^3.0.1"
  },
...

```

```css
// index.css

@import 'normalize.css';

.modal {
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.8);
  display: table;
  height: 100%;
  width: 100%;
  z-index: 9999;
}

...

```

Ya podemos crear el "bundle.css" con el siguiente comando:


```
$ npm-css index.css -o bundle.css
```

¡Con esto ya tendríamos terminado nuestro primer módulo! Pueden revisar en detalle [el código del ejemplo completo en Github](https://github.com/Mango/frontend-module-example).

## Automatización y Testeos

En este momento, estamos trabajando para automatizar estos procesos y ser mucho más ágiles. De todos modos, podemos usar [Grunt](https://gruntjs.com/) o [Gulp](https://gulpjs.com/), ya que ambos ofrecen una gran variedad de plugins o tasks para trabajar con Browserify, Jade y CSS (en la versión que subí a Github, utilicé Gulp).

En Mango, además de [CasperJS](https://getmango.com/blog/test-funcionales-con-casperjs/), usamos [Mocha](https://mochajs.org/) e [Istanbul](http://gotwarlost.github.io/istanbul/) (code coverage) para testear los módulos. Mocha es un framework de testeo que corre en el navegador y también desde la consola, al igual que Istanbul.

Utilizamos [scripts de npm](https://docs.npmjs.com/cli/v8/using-npm/scripts) para automatizar algunos tests. Lamentablemente no es posible con todos ya que a veces es necesario que se ejecuten sí o sí en el browser (en un futuro post contaremos más detalles).

Esperamos que haya sido de interés y puedan empezar a escribir los módulos de sus frontends utilizando Browserify.

Cualquier duda que tengan sobre las herramientas que usamos o de frontend en general pueden consultarme vía Twitter a [@pazguille](https://twitter.com/pazguille).

En las próximas semanas, vamos a seguir compartiendo experiencias y herramientas, así que seguimos en contacto.

*¡Bueno, esto fue todo; espero que les haya gustado y hasta la próxima!*

Chao. 🚀

---
