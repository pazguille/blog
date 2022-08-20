---
title: >
  Validación de Formularios con la API de Vibración
description: >
  Hace unos años leí sobre la API de vibración, la cual nos permite hacer vibrar los dispositivos de nuestros usuarios utilizando solamente JavaScript.
publish_date: 2014-08-13
---

---

Hace unos años leí sobre [la API de vibración](https://www.w3.org/TR/vibration/), la cual nos permite hacer vibrar los dispositivos de nuestros usuarios utilizando solamente JavaScript.

Lo primero que se me viene a la mente al pensar en esta API son juegos. Pero si nos ponemos a pensar o a buscar un poco por la web podemos encontrar casos interesantes para usar en nuestras aplicaciones.

El objetivo principal al hacer vibrar un dispositivo es dar feedback a los usuarios cuando ocurre un evento, por ejemplo: cuando usamos el teclado, tocamos algún botón, indicar que tenemos una llamada entrante o una notificación pendiente de leer.

Teniendo en cuenta esto -y sumado a que en Mango estamos trabajando mucho con formularios- es como [encontramos un caso de uso muy útil](https://lists.w3.org/Archives/Public/public-web-mobile/2014Feb/0022.html): indicarle al usuario mediante una vibración cuando un formulario contenga errores.

A continuación, vamos a ver lo simple que es implementar la API de vibración con unas pocas líneas de código.

## Vibration API

La API es muy sencilla de usar, cuenta con un sólo método que nos permite hacer toda la magia:

```js
// Genera una vibración de 2000 milisegundos.
navigator.vibrate(2000);

// Genera una vibración de 3000ms, espera 2000ms y vuelve a vibrar 1000ms
navigator.vibrate([3000, 2000, 1000]);
```

Para asegurarnos que el navegador soporta la API, tenemos que comprobar si el método “vibrate” está definido en el objeto “navigator”:

```js
var hasVibration = "vibrate" in navigator;
if (hasVibration) {
  navigator.vibrate(2000);
}
```

Así de simple es utilizar la API de vibración.

## A vibrar los formularios

Ahora vamos a incluir estas líneas de código en la validación de un formulario para lograr el efecto que les comentaba antes:

```js
(function(window) {

  var hasVibration = 'vibrate' in navigator;

  var container = document.getElementById('demoPayment');
  var successMsg = document.getElementById('msg-success');
  var email = document.getElementById('df-email');
  var amount = document.getElementById('df-amount');
  var form = document.getElementById('d-form');

  function showError() {
    container.classList.add('shake');

    if (hasVibration) {
      navigator.vibrate(200);
    }

    setTimeout(function() {
      container.classList.remove('shake');
    }, 200);
  }

  email.addEventListener('invalid', showError);
  amount.addEventListener('invalid', showError);

  form.addEventListener('submit', function(eve) {
    eve.preventDefault();
    this.setAttribute('hidden', 'hidden');
    successMsg.removeAttribute('hidden');
  });

}(this));
```

Los invito a todos aquellos que tienen Android a [probar la demo](https://mango.github.io/demo-vibration-api/) y ver el resultado final con algunas magias de CSS.

Pueden revisar todo el código del ejemplo en el repo de Github: [demo-vibration-api](https://github.com/Mango/demo-vibration-api).

## Soporte

Por ahora [podemos utilizarla en Chrome y Firefox en Android](https://caniuse.com/?search=vibration). Las pruebas que hice sobre Safari y Chrome en IOS no tuvieron resultados positivos.

Es así de simple como con una pequeña interacción podemos darle a los usuarios un guiño mientras usan nuestra aplicación.

Estas pequeñas interacciones se las conoce como micro-interacciones. Los invito a ver [una excelente charla que dió @pixelbeat](https://www.youtube.com/watch?t=8m22s&v=F5srxM9s6lQ&feature=youtu.be&ab_channel=LABgcba-LaboratoriodeGobierno) en la meetup BAFrontend sobre este tema.

Cualquier duda que tengan pueden consultarme vía Twitter a [@pazguille](https://twitter.com/pazguille).

*¡Hasta la próxima!*

Chao. 🚀

---
