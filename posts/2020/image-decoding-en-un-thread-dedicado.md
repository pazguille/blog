---
title: >
  Image decoding en un thread dedicado
description: >
  ¿Tiene sentido? ¿Cuándo es necesario hacerlo? ¿Por qué sibarita es tan rica?
publish_date: 2020-05-25
---

---

*¿Tiene sentido? ¿Cuándo es necesario hacerlo? ¿Por qué sibarita es tan rica?*

El proceso de `image decoding` sucede luego de descargar una imagen cuando el browser obtiene la información de los colores de cada pixel para saber cómo dibujarla en la pantalla ([rasterización](https://docs.google.com/presentation/d/1boPxbgNrTU0ddsc144rcXayGA_WF53k96imRH8Mp34Y/edit#slide=id.g60f92a5151_40_648)).

El tiempo y uso de memoria de este proceso varia según el peso y tamaño de la imagen por lo que puede llegar a penalizar el renderizado general. **Un punto para ver de cerca en Web Performance.**

Si enviamos esta tarea a otro thread podemos llegar a beneficiarnos y destrabar el render de elementos más importantes, como por ejemplo texto.

HTML ofrece [la propiedad decoding](https://html.spec.whatwg.org/multipage/images.html#decoding-images) que permite indicarle al browser si hacerlo de manera "sync" o "async".

```html
<img decoding="async" src="foo.png"/>
```

Desde JavaScript podemos utilizar el método `decode()`, antes de agregar una imagen al DOM, para realizar esta tarea en un nuevo thread dedicado.

```javascript
// Image decoding en un thread dedicado
const img = new Image();
img.src = 'foo.png';
img.decode().then(() => {
  document.body.appendChild(img);
}).catch(() => {
  throw new Error('Oops!');
});
```

De esta manera, la decodificación no bloquea el thread principal del render.

[El engine Blink](https://en.wikipedia.org/wiki/List_of_web_browsers#Blink-based) tiene un thread especial para todo lo relacionado al rasterizado llamado [Compositor Thread](https://developers.google.com/web/updates/2018/09/inside-browser-part3#raster_and_composite_off_of_the_main_thread) y el proceso de `image decoding` [sucede allí](https://gist.github.com/addyosmani/ffa9706d8d354e5354a33ac9f17e9689#gistcomment-3037449), a través de los raster threads.

Hay que tener en cuenta [la arquitectura de cada browser](https://developers.google.com/web/updates/2018/09/inside-browser-part3) para entender en dónde ocurre y cómo se puede optimizar.

**Contestando las preguntas iniciales:**

*¿Tiene sentido?*

Si.

*¿Cuándo es necesario hacerlo?*

Creo que el escenario se da cuando tenemos muchas imágenes o pocas pero con un peso importante, y el decoding puede competir con el render de otros elementos. Hay que analizar cada caso!

*¿Por qué sibarita es tan rica?*

Una pregunta que nunca tendrá respuesta. Ok, polilla.

Chao. 🚀

---
