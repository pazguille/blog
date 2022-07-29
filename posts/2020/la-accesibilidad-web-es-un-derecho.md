---
title: >
  La accesibilidad web es un derecho
description: >
  Todas las personas tienen derecho de acceder e interactuar con nuestro contenido y no debemos privar a nadie.
publish_date: 2020-06-07
---

---

![Accesibilidad no es un feature](https://photos.collectednotes.com/photos/147/3cb2020d-d5a4-46bb-98a7-a9a302e4f999)

>  La accesibilidad web es la práctica inclusiva de garantizar que los sitios web, las herramientas y las tecnologías estén diseñados y desarrollados para que las personas con discapacidad puedan usarlas. Más específicamente, que todos aquellos usuarios puedan percibir, comprender, navegar, interactuar y contribuir con la Web.

> Wikipedia.

Todas las personas tienen derecho de acceder e interactuar con nuestro contenido y no debemos privar a nadie.

Ser accesibles es responsabilidad de quienes construimos la web. Sin embargo, por algún motivo es un tema tabú, es el feature a futuro y a veces ni la tenemos en cuenta.

En la mayoría de los casos, las técnicas que tenemos que implementar para ser accesibles son seguir las buenas prácticas en general y los estándares web. *¿Alguien sigue los estándares en 2020?*

Los problemas más comunes se solucionan [utilizando HTML semántico](https://web.dev/use-semantic-html). *¿2020 y seguimos hablando de semántica? Sí.*

Los controles nativos del browser son accesibles por defecto. Un claro ejemplo, puede ser el <select> y su soporte de teclado, que lo rompemos todo el tiempo cuando implementamos dropdowns que se ven lindos.

En el siguiente ejemplo, queda muy claro como rompemos la web y no somos accesibles por reinventar los controles nativos del browser (aclaro que esto se encuentra en producción, no fue inventado):

```html
<a href="javascript:void(1)" onClick='window.location="index.html"'>Link</a>
```

Por otro lado, contamos con WAI-ARIA que nos permite hacer más accesible el HTML. Tiene un papel fundamental para las interacciones y contenido dinámico.

> HTML + JS + ARIA => Salvamos un gatito!

De todos modos, ARIA no es la salvación!

![Por ejemplo, rompemos la accesibilidad web al no usar un elemento div en lugar de un botón](https://pbs.twimg.com/media/EZutBrMWoAI0s3l?format=jpg&name=medium)

[Pueden ver más ejemplos!](https://twitter.com/htm_hell)

Una dato de vital importancia es que [existen leyes de a11y en varios países de América Latina](http://accesibilidadweb.dlsi.ua.es/?menu=iberoamerica ) y Argentina es uno de ellos!

> **[Ley 26.653](http://servicios.infoleg.gob.ar/infolegInternet/anexos/175000-179999/175694/norma.htm)**: “Ley de accesibilidad de la información en las páginas web para gente con discapacidades”.

*Conclusión*

Me encantan los estándares y siempre me cuestiono si lo que hago es accesible o cómo puedo mejorarlo (no siempre lo logro).

No soy un experto pero me gusta pensar en a11y y por eso que tenía ganas de escribir sobre este tema.

Piensen que antes de la cuarentena por Covid muchas personas iban a los locales físicos porque la web no era accesible y ahora...

Para cerrar, les comparto algunos links:

- https://web.dev/accessible
- https://developer.mozilla.org/en-US/docs/Web/Accessibility
- https://reactjs.org/docs/accessibility.html
- https://webaim.org/projects/million/
- https://dev.to/jfelx/semantic-html-what-why-and-how-14n0

Chao. 🚀

---
