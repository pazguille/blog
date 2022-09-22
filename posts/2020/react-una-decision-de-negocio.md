---
title: >
  React: una decisión de negocio
description: >
  A principios de 2016 empecé a probar React y pude "ver" con mis propios dedos los beneficios que brinda en la experiencia de desarrollo y en la performance de la UI.
publish_date: 2020-05-30
cover_html: <img alt="" src="https://photos.collectednotes.com/photos/147/546a4a14-18d9-4c4b-ac60-9a2daf75c2d6" style="margin:0 auto;" width="592" height="395">
og:image: https://photos.collectednotes.com/photos/147/546a4a14-18d9-4c4b-ac60-9a2daf75c2d6
---

---

A principios de 2016 empecé a probar React y pude "ver" con mis propios dedos los beneficios que brinda en la experiencia de desarrollo y en la performance de la UI.

En dicho año la popularidad de React ni se asemejaba a lo que sucede en la actualidad. Facebook no lo usaba, nadie hablaba de server-side rendering y [Next.js no existía](https://github.com/zeit/next.js/commit/9b06a22f31655ca3ff70954ebacef0fc351e7097) para ese entonces.

En Mercado Libre queríamos ser muy ágiles desarrollando web y planteamos hacer un cambio del stack de front, ya que era una de las causas de ser lentos.

Recuerdo haber leído muchísimos artículos de [Netflix](https://netflixtechblog.com/netflix-likes-react-509675426db), [Airbnb](https://medium.com/airbnb-engineering/rearchitecting-airbnbs-frontend-5e213efc24d2), [Paypal](https://medium.com/paypal-engineering/isomorphic-react-apps-with-react-engine-17dae662379c), [Uber](https://eng.uber.com/tech-stack-part-one-foundation/) [Walmart](https://medium.com/walmartlabs/building-react-js-at-enterprise-scale-17c17a36fd1f), entre otras, que comentaban como empezaron a utilizar React y los beneficios técnicos que obtuvieron.

Sin embargo, no estaba encontrando la respuesta al “¿Por qué?”. ¿Qué era lo que los llevó a tomar esa decisión? Sentía que había algo más.

Luego de muchas lecturas, charlas y pruebas puede dar con la respuesta. [Encontré lo que buscaba!](https://formidable.com/blog/2015/12/04/using-react-is-a-business-decision-not-a-technology-choice/):

*`Using React is a Business Decision, not a Technology Choice.`*

Gracias a cuestionar "¿Por Qué?" me di cuenta que la elección de una nueva tecnología (en este caso React) no era solamente un tema técnico.

Esta decisión parte de una necesidad de negocio y hay que tomarla como tal, por eso tuvimos en cuenta los siguientes puntos:

### Detrás de la tecnología
Es importante saber quiénes están detrás para conocer el tipo de soporte, mantenimiento y comunidad que se puede generar. No es lo mismo que haya una persona, una comunidad sólida o una gran empresa.

Por otro lado, conocer quienes ya la están usando en producción es clave, en qué tipo de proyectos y cuáles fueron sus necesidades y desafíos.

### Complejidad de adopción
La curva de aprendizaje es un factor a tener en cuenta ya que está directamente relacionado al onboarding de nuevas personas: cuan rápido empiezan a desarrollar sin previo conocimiento.

Muy importante la documentación, cursos, soporte y comunidad que va a acompañar en el proceso de adopción dentro de la compañía.

Por otro lado, la cantidad de gente que hay en el mercado desarrollando con la tecnología va a facilitar la contratación y crecer más rápido.

### Reutilización y Organización
React se basa en [una arquitectura de componentes](https://medium.com/omarelgabrys-blog/component-based-architecture-3c3c23c7e348) por lo que nos permite componentizar y módularizar muy bien el código, casi sin pensarlo.

De esta manera podemos reutilizar código dentro de una aplicación y entre aplicaciones de diferentes equipos de una manera muy sencilla.

Este punto es clave para escalar y no reinventar la rueda en cada nuevo desarrollo. Los equipos pueden enfocarse en lo que realmente tienen que desarrollar y evitar resolver siempre los mismos problemas.

Por otro lado, podemos reutilizar los componentes en el server ya que lo usamos como template engine. Por ejemplo, el header de Mercado Libre es un componente de React que funciona server-side only y se reutiliza en toda la compañía.

**Conclusión**

Actualmente parece impensable dudar de React como parte del stack de front y justamente **es cuando más hay que preguntarnos el "¿Por Qué?"**.

Puede resultar algo obvio el planteo pero en ese entonces no llegaba a verlo.

Por otro lado, es clave separar las preferencias personales o lo cool que está de moda de lo que realmente necesitamos.

```
¿Hoy usas React en tus proyectos personales?
Cómo saberlo Marge, cómo saberlooo..
```

Chao. 🚀

---
