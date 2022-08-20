---
title: >
  Buenas prácticas de performance para el frontend
description: >
  La performance y velocidad, junto a la experiencia del usuario de nuestros sitios y aplicaciones son puntos claves que tenemos que tener en cuenta desde el principio de un desarrollo.
publish_date: 2014-05-27
allow_iframes: true
---

---

La performance y velocidad, junto a la experiencia del usuario de nuestros sitios y aplicaciones son puntos claves que tenemos que tener en cuenta desde el principio de un desarrollo.

Existen varias técnicas que conocemos y utilizamos a la hora de empezar un nuevo proyecto, como por ejemplo: hacer la menor cantidad de requests, aplicar capas de caché, optimizar las imágenes, comprimir los archivos, entre otras.

Sin embargo, muchas veces olvidamos puntos básicos para evitar que los usuarios esperen una eternidad.

A continuación, vamos a revisar algunas buenas prácticas de performance que nos van a ayudar a la hora de escribir nuestro código.

## HTML

Es muy importante que nuestro markup de HTML **contenga la menor cantidad de elementos posibles** para no generar un archivo que tenga un peso innecesario.

En algunas ocasiones, tendemos a agregar `<div>`'s por todos lados para solucionar problemas de compatibilidad entre navegadores o para soportar navegadores viejos (IE8–).

En estos casos, es bueno tomarse unos minutos para buscar una solución en la que se utilice la menor cantidad de elementos posibles y no pecar de “divitis”.

Otra buena práctica, que no se ve mucho, es **eliminar los comentarios HTML**. Los comentarios nos permiten comunicarnos, a través del código, con el equipo de desarrollo pero al usuario no le interesan y es por eso que deberíamos borrarlos en la versión de producción.

**Minificar el código HTML** es otra técnica que nos permite reducir el peso de nuestro documento eliminando bytes innecesarios, como los espacios adicionales, saltos de línea y sangrías.

Al minimizar es posible acelerar la descarga, el análisis y el tiempo de ejecución.

## CSS

Es muy importante **llamar los archivos de CSS lo antes posible en el `<head>`** [utilizando el tag <link>](https://www.stevesouders.com/blog/2009/04/09/dont-use-import/) para que nuestros documentos se muestren de forma progresiva.

Los navegadores bloquean el render de nuestro sitio hasta que no se hayan descargado todos los archivos de CSS. Una vez que se descargan e interpretan, el navegador crea el CSSOM y comienza a aplicar los estilos al DOM, generando el Render Tree: a esto se lo conoce como [Critical Rendering Path](https://web.dev/critical-rendering-path/).

Les recomiendo [la charla de Ilya Grigorik](https://www.youtube.com/watch?v=PkOBnYxqj3k&ab_channel=IlyaGrigorik) dónde explica en forma detallada y muy clara cómo funciona este proceso. Es muy importante entender como funciona para poder aplicar optimizaciones de performance.

Al cargar los estilos lo antes posible, logramos que la página se muestre progresivamente y le damos la impresión a los usuarios que la página se está cargando rápido.

A continuación, [podemos ver cómo los browsers rederizan nuestros documentos](https://www.youtube.com/embed/QVFoI9HNJ34) una vez que se descargan e interpretan los archivos CSS.

<iframe width="100%" height="400" src="https://www.youtube.com/embed/QVFoI9HNJ34" title="HTML Rendering" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

**Si los archivos de CSS no son muy pesados**, podemos insertarlos directamente en el documento HTML **dentro de un tag `<style>`**.

Al igual que con el HTML, también tenemos que **eliminar los comentarios y minificar el código**. Además, es conveniente **unificar (teniendo en cuenta si aplica el caso) varios archivos CSS** en uno sólo, para realizar menos request.

## JavaScript

El navegador bloquea la descarga de todos los recursos y el render del documento hasta que no se hayan descargado e interpretado todos los archivos JavaScript.

Por este motivo, tenemos que **ubicar los llamados a los JavaScript** lo más abajo posible en el documento. Se recomienda **justo antes del cierre del elemento `</body>`**.

Es muy importante cargar de forma asincrónica aquellos JavaScripts que consideremos mejoras, o bien, que sean de terceros (redes sociales, analytics, trackers):

```html
<script>
  var script = document.createElement('script');
  var head = document.getElementsByTagName("head")[0];
  script.async = true;
  script.src = url;
  head.appendChild(script);
</script>
```

Al igual que el HTML y CSS, tenemos que **eliminar los comentarios, minificar el código y unificar los archivos** de JavaScript.

## Las mejoras pueden esperar

Es muy importante definir cuál es el contenido más importante en nuestro sitio y ocuparnos que los usuarios puedan acceder a éste lo más rápido posible. Todo lo demás va a ser considerado “mejoras”, las cuales podemos descargar de forma asincrónica.

Por ejemplo, podemos mencionar como mejoras:

- Fuentes.
- Imágenes de fondo.
- Imágenes y videos no relacionados con el contenido.
- Algunos estilos.
- Algunos scripts.

Para cargar las mejoras, podemos utilizar [aload.js](https://github.com/pazguille/aload). Una librería de JavaScript, muy fácil de usar, que nos permite cargar scripts, styles, iframes, imágenes, videos y audios de forma asincrónica.

A modo de ejemplo, veamos como podemos cargar una imágen:


```html
<img data-async="https://getmango.com/foo.png" width="400" height="300" >
<script>
  window.onload = function() {
    aload();
  };
</script>
```

Luego de implementar estas buenas prácticas en [la nueva landing de Mango](https://getmango.com/), [logramos reducir hasta 1 segundo la carga inicial](https://www.youtube.com/embed/M9fZ_0WtUOA).

<iframe width="100%" height="400" src="https://www.youtube.com/embed/M9fZ_0WtUOA" title="Mango Performance" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Si quieren conocer más detalles sobre buenas prácticas, herramientas y técnicas, [los invito a que vean la charla](https://www.youtube.com/watch?v=F5srxM9s6lQ&t=2751s&ab_channel=LABgcba-LaboratoriodeGobierno) que dí en el primer Buenos Aires Frontend Meetup.

Espero que puedan aprovechar e implementar estas buenas prácticas en sus frontends al igual que nosotros. Los usuarios se lo van a agradecer.

Cualquier duda que tengan sobre performance o de frontend en general pueden consultarme vía Twitter a [@pazguille](https://twitter.com/pazguille).

*¡Hasta la próxima!*

Chao. 🚀

---
