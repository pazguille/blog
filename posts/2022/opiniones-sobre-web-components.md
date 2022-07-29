---
title: >
  Opiniones sobre Web Components
description: >
  La idea principal de Web Components es extender la plataforma por eso es fundamental conocer a fondo HTML, CSS y JavaScript.
publish_date: 2022-05-12
---

---

La idea principal de Web Components es extender la plataforma por eso es fundamental conocer a fondo HTML, CSS y JavaScript.

![La frase "Opiniones sobre Web Components" escrita en una hoja junto a un lápiz y sacapuntas](https://photos.collectednotes.com/photos/147/8731e367-7874-4de3-83c3-3066c1863dc8)

Web Components es un término que engloba varias tecnologías y no es una en particular.  En este caso agrupa [**Custom elements**](https://developer.mozilla.org/en-US/docs/Web/Web_Components/Using_custom_elements),  [**Shadow DOM**](https://developer.mozilla.org/en-US/docs/Web/Web_Components/Using_shadow_DOM) y [**HTML templates**](https://developer.mozilla.org/en-US/docs/Web/Web_Components/Using_templates_and_slots).

Estas tecnologías nos dan el poder de extender "la plataforma" aunque lo que realmente extendemos es el HTML, utilizando HTML, JavaScript y CSS.

La forma de extender el HTML es creando nuevos elementos, o bien, sumando funcionalidad a los elementos que ya existen (button, input, p, a, etc).

**Crear nuevos elementos HTML**

```js
class FlagIcon extends HTMLElement { ... }

window.customElements.define(
  'flag-icon',
  FlagIcon,
);

// HTML
// <flag-icon></flag-icon>
```

**Sumar funcionalidad a elementos HTML que ya existen**

```js
class ShareButton extends HTMLButtonElement { ... }

window.customElements.define(
  'share-button',
  ShareButton,
  { extends: 'button' }
);

// HTML
// <button is="share-button">Compartir</button>
```

#### ¿Por qué necesitamos extender la plataforma?

A medida que el desarrollo web fue evolucionando, el concepto de componentes visuales, widgets o fragments también fue madurando, al punto tal que hoy pensamos la web como un conjunto de componentes.

La combinación de HTML, CSS y JS son las bases de esos componentes más allá del framework o librería de moda que usemos.

Sin embargo, la web desde sus inicios tiene un gran problema respecto a componentizar y reutilizar código (crear componentes). No tenemos una base para empaquetarlos, distribuirlos y consumirlos: reutilizarlos.

Siempre tuvimos que recurrir a frameworks o librerías ([Mootools](https://mootools.net/forge/browse), [jQueryUI](https://jqueryui.com/), [Angular](https://angularjs.org/), [React](https://reactjs.org/)) en conjunto con gestores de paquetes ([Componentjs](https://github.com/componentjs/component), [Bower](https://bower.io/) y ahora [NPM](https://www.npmjs.com/)) para solucionar este problema.

Por otro lado, tiene limitaciones para aplicar estilos a algunos elementos HTML, como el famoso caso del `<select>`.

![alt](https://photos.collectednotes.com/photos/147/8a2687cb-9e7a-475d-a3c8-b09e05e34d9d)

Parece algo básico, pero esta limitación nos llevó a crear cientos de componentes, reescribiéndolos cada vez que salía un framework nuevo y en el fondo terminamos rompiendo la web (en términos de accesibilidad seguro).

Acá es donde Web Components viene a poner orden o eso intenta.

#### ¿Qué limitaciones tiene al momento?

Una de las principales limitaciones, desde mi punto de vista, es la dependencia con JavaScript ya que la definición se realiza en tiempo de ejecución en el cliente.

Esto limita la capacidad de hacer **Server Side Rendering** lo cual es un tema a nivel performance y [estrategia de render](https://web.dev/rendering-on-the-web/).

[Si bien se está trabajando en esto](https://github.com/mfreed7/declarative-shadow-dom/blob/master/README.md) aún es una gran limitación.

> [Declarative Shadow DOM (DSD)](https://web.dev/declarative-shadow-dom/) removes this limitation, bringing Shadow DOM to the server.

Por este motivo, hay que pensar muy bien dónde usar Web Components, entender los casos de uso y cómo se integra con el resto de nuestra aplicación.

Hoy me inclinó por usarlos para componentes que sí o sí haríamos con JavaScript en el cliente, como por ejemplo compartir una url, copiar al portapapeles, tooltips, modales. En resumen posibles funcionalidades que dependan de la interacción de la persona que usa nuestra web.

Por otro lado, [**necesitamos utilizar polyfills**](https://github.com/ungap/custom-elements) o algún framework como [Lit](https://lit.dev/) ya que [hay algunos temas de soporte](https://caniuse.com/?search=web%20components).

En Safari hay que definir el método `attributeChangedCallback` (aunque no haga nada) para poder extender de elementos que ya existen en el HTML.

En los personal no estoy usando ningún y me fue muy sencillo arrancar. Tuve que aprender muy poco y mantengo la simplicidad de builds, configurar cosas raras, etc.

#### ¿Cómo la podemos cagar? 💩
De muchas formas. Depende cómo y dónde usemos Web Components.

El principal problema es que el HTML no se trata con el debido respeto a la hora de diseñar los componentes. Muchas veces no se aplican [los principios de diseño de HTML](https://www.w3.org/TR/html-design-principles/) al crear nuevos elementos.

Supongamos que tenemos un botón que nos permite compartir una URL. Lo más probable es que  pensemos en un Web Component como:

```html
<share-button url="https://..">Compartir</share-button>
```

Pero... ya existe el elemento `<button>`. ¿No sería mejor extenderlo?

```html
<button is="share-button" url="https://..">Compartir</button>
```
En estos detalles se encuentra la diferencia entre extender y reinventar la plataforma. Donde a veces hasta la rompemos, como hace Google en [web.dev](https://web.dev/custom-elements-v1/) con su botón de Share (`<share-action>`).

No es React. Evitaría pensar nuestros Web Components como una simple traducción de lo que hoy hacemos con React.

> React and Web Components are built to solve different problems. — [reactjs.org](https://reactjs.org/docs/web-components.html)

Un componente de React solo puede ser reutilizado en una aplicación que usa React pero un Web Component puede ser reutilizado en toda la web.

#### Conclusión

Me copa mucho lo que podemos crear al momento y el futuro que se viene.

Voy a seguir muy de cerca para ver cómo se termina de resolver el Server Side Rendering y qué pasa con Declarative Shadow DOM.

[Ya empecé a usar Web Components en mis proyectos](https://github.com/pazguille/xbox-games-app/blob/develop/src/js/web-components.js) y se vendrán en MELI.

Chao. 🚀

---
