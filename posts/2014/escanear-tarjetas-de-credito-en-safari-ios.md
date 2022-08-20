---
title: >
  Escanear tarjetas de crédito en Safari (IOS)
description: >
  Hace unos días jugando con formularios nos encontramos con una feature más que interesante para Safari en IOS: la posibilidad de escanear tarjetas de crédito.
publish_date: 2014-08-12
---

---

Hace unos días jugando con formularios (en el equipo de frontend [jugamos mucho con formularios](https://getmango.com/blog/validacion-de-formularios-con-la-api-de-vibracion/)) nos encontramos con una feature más que interesante para Safari en IOS: la posibilidad de escanear tarjetas de crédito.

Luego de buscar un poco en Google, vimos que con el lanzamiento de IOS8, Apple agregó una nueva feature en Safari, no documentada o escondida, llamada [“Scan Credit Card”](https://9to5mac.com/2014/06/05/safari-in-ios-8-uses-camera-to-scan-and-enter-credit-card-info/).

Esto nos permite escanear tarjetas de crédito desde el navegador utilizando la cámara del dispositivo y luego autocompletar los campos de un formulario con los datos de la tarjeta.

Si tienen un iPod/iPhone/iPad con IOS8, los invito a que lo prueben en [la demo que armamos](https://mango.github.io/demo-scan-credit-card/).

![](https://miro.medium.com/max/1280/0*wY39y-YeelGNvHJv.gif)


Cuando entran a la demo y presionan sobre cualquiera de los inputs del formulario, Safari les va a mostrar el teclado y la opción “Scan Credit Card” (o “Escanear tarjeta de crédito”). Eligen dicha opción y los va a llevar a una pantalla aparte para escanear su tarjeta. Una vez escaneada, el navegador autocompleta el formulario con los siguientes datos:

- el número de la tarjeta;
- el nombre que figura en la tarjeta;
- y la fechas de expiración de la tarjeta (mes y año, por separado).

## Lo quiero implementar!

Lo más importante para activar esta feature es que la página en la que se encuentre nuestro formulario tenga un certificado SSL. Lo cual no sorprende ya que si vamos a aceptar pagos online, es algo que todos tenemos que tener.

Por otra parte, es importante entender que no es necesario utilizar JavaScript para activarlo. Al parecer es algo que Safari hace automáticamente y no tenemos forma de controlarlo.

Luego de realizar varias pruebas y gritar un poco, pudimos descubrir que Safari le “presta mucha atención” (para no decir que usa una regex que no sabemos cuál es) a los textos de los labels y a los atributos placeholder de los inputs.

A continuación, tienen el ejemplo del formulario de la demo, el cual funciona correctamente:


```html
<div class="box">
  <header class="header">
    <img class="logo" src="assets/logo.png" alt="Logo Crucero">
    <h1>Crucero</h1>
  </header>

  <form class="form" action="/" method="POST">
    <fieldset>
      <div class="fieldLine">
        <label for="holdername">Name on card</label>

      </div>

      <div class="fieldLine">
        <label for="card">Credit Card Number</label>

      </div>

      <div class="fieldLine">
        <label for="month">Expiration Date</label>


      </div>
    </fieldset>

    <div class="form-action">
      <button type="submit" class="btn">Continue</button>
    </div>
  </form>
</div>
```

Pueden revisar el código completo de la demo en el repo de Github [demo-scan-credit-card](https://github.com/mango/demo-scan-credit-card/).

## Trucos y secretos

Les tengo que confesar que hay un par de trucos y secretos por los cuales este formulario funciona:


1. El primero es que todos los textos están en inglés.
2. El segundo es que estamos usando un texto “mágico” en uno de los labels: “Name on card”.


Cuando mencionaba que Safari “presta mucha atención” a los textos, es cierto, pero solamente a los textos que están en inglés, independientemente del lenguaje de nuestro dispositivo o del atributo lang del tag HTML.

¿Qué pasa si mi formulario está en español o portugués? Es acá cuando nos ponemos tristes y pensamos que no podemos usar esta feature, pero momento… es hora de hackear!

Lo que podemos hacer es agregar un segundo label que tenga el texto en inglés y luego ocultarlo. En este caso, vamos a usar el atributo hidden en dicho label.

```html
<div class="fieldLine">
  <label for="holdername" hidden>Name on card</label>
  <label for="holdername">Nombre que figura en la tarjeta</label>
</div>
```

De esta forma, logramos que todos nuestros usuarios que tengan IOS8 no se pierdan de esta feature y puedan escanear su tarjeta de crédito mejorando su experiencia y velocidad de compra.

Cualquier duda/sugerencia o si encuentran algo nuevo me pueden contactar vía Twitter a [@pazguille](https://twitter.com/pazguille).

*¡Hasta la próxima!*


Chao. 🚀

---
