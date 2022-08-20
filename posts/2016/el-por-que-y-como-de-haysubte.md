---
title: >
  El por qué y cómo de ¿HaySubte? 🚊
description: >
  ¿Otra aplicación para ver el estado del subte? Si.
publish_date: 2016-11-30
---

---

Hace tiempo que tenía ganas de probar now y luego de escuchar la charla de Guille Rauch en la NodeConf me decidí por probarlo y ver qué onda.

Para aquellos que no saben, [now](https://vercel.com/home) te permite hacer deploys de aplicaciones o servicios en Node en “segundos”.

Algo que me gusta a la hora de probar o aprender algo nuevo, es hacerlo en un proyecto que luego “cobre vida” (siempre que se pueda). Entonces, empecé a revisar mis “proyectos abandonados” en Github en donde pudiera aplicarlo y encontré el repositorio [HaySubte](https://github.com/pazguille/haysubte).

Hace un año atrás había empezado a armar [una web app para ver el estado del subte](https://haysubte.herokuapp.com/), orientada a personas que no tienen espacio en sus celulares, o aquellas que piensan dos veces antes de instalar apps que van a usar de vez en cuando (holis!) y/o para esos momentos de poca conectividad.

Para llevarla a cabo tenía que hacer 2 cosas muy simples pero importantes:

1. Un “servicio” para obtener la información de los subtes.
2. Tener un domino en https para poder hacer uso de ServiceWorkers (offline, caches, etc).
Como pueden ver eran cosas básicas, pero en su momento me dió paj.. “fatiga” tan sólo pensar en levantar un server, dominios, hice un par de commits y ahí quedó, [es como que me canso de nada](https://www.youtube.com/watch?v=wAmyDO8LEps&t=34s&ab_channel=MediosRegistrados). Pero ahora era el proyecto perfecto para jugar con now.

*Spoiler: Fueron segundos literalmente y muuuuy fácil.*

## Manos a la obra
Para construir el “servicio” que me devuelva los estados de las líneas de subte, tenía que obtener la información del sitio de [Metrovías](https://www.metrovias.com.ar/), ya que es el único lugar donde se encuentra esta data (una API? eso con qué se come?).

![Esta es la sección a scrapear, acá está la papa!](https://miro.medium.com/max/586/1*4s1Uuyh9jFHJyi5KGIocBA.png)


Lo primero que hice fue armar [un pequeño módulo](https://github.com/pazguille/haysubte/blob/master/api/linesStatus.js) para obtener dicha información utilizando [scraperjs](https://github.com/ruipgil/scraperjs) (super recomendable y muy sencillo de usar), obteniendo como resultado el JSON con los datos del subte:

```js
{
  "A": {
    "status": "normal",
    "text": "Normal"
  },
  "B": {
    "status": "normal",
    "text": "Normal"
  },
  "C": {
    "status": "normal",
    "text": "Normal"
  },
  "D": {
    "status": "normal",
    "text": "Normal"
  },
  "E": {
    "status": "normal",
    "text": "Normal"
  },
  "H": {
    "status": "normal",
    "text": "Normal"
  }
}
```

Una vez terminado el “servicio”, tuve que tomar una decisión que puede resultar difícil para algunos… ¿Qué uso para el front-end? ¿React? ¿Preact? ¿VueJS? ¿Angular34? ¿BidetJS? Mi respuesta fue rápida: HTML, CSS y JS.

*Spoiler: No usé JS.*

Luego de construir el HTML (template de Pug) y los estilos (CSS) estaba listo para hacer deploy de la aplicación.

Entonces empecé a leer la documentación e instale now:

```
$ npm install -g now
```

Para mi sorpresa, había que correr solamente un comando para subir la aplicación:

```
$ now
```

Luego, [creé un alias](https://vercel.com/docs/cli#commands/alias) para que la url sea un poco más linda y accesible:

```
$ now alias haysubte-vqjcgbtqfq.now.sh haysubte.now.sh
```

Listo! En 3 líneas de comando y en segundos mi app ya estaba productiva.

![](https://miro.medium.com/max/640/1*unxFfOCOx0Mz2_HBrrvCEw.jpeg)
![](https://miro.medium.com/max/640/1*7HM661oBEpnkw0sKIa2oBQ.jpeg)


## Conclusión
Hacía mucho tiempo que no sentía esa sensación de simpleza a la hora de aprender y utilizar una herramienta y mucho menos en el mundo de “fatiga” que vivimos hoy en día (esa paja mental creada por nosotros mismos).

- Fácil y rápido: fueron segundos literalmente.
- Es Gratis (OSS plan).
- https y http2 de arriba!

## Notas
- Me quedó pendiente usar ServiceWorkers.
- El “servicio” está disponible para que [cualquiera pueda usarlo](https://haysubte.herokuapp.com/api) ❤.
- [El código es abierto](https://github.com/pazguille/haysubte) y están invitados a sumarse con mejoras, nuevo diseño y features, etc.

Chao. 🚀

---
