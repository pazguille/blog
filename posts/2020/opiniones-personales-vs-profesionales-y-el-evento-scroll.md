---
title: >
  Opiniones personales vs. profesionales y el evento scroll
description: >
  El otro día @okbel publicó un tweet comentando sobre el deseo de un Infinity Scroll para navegar los listados de productos y...
publish_date: 2020-06-21
---

---

El otro día [@okbel](https://twitter.com/okbel/) publicó un tweet comentando sobre el deseo de un Infinity Scroll para navegar los listados de productos.

[twitter https://twitter.com/okbel/status/1274089886031777792]

Esto despertó sensaciones encontradas en mí dado que tengo una opinión personal sobre este feature: [no me roben el scroll](https://speakerdeck.com/pazguille/no-me-robes-el-scroll).

Me hizo pensar sobre cómo me desenvuelvo cuando lo que opino o me gusta no está alineado con lo que tengo que desarrollar.

Sostengo que uno es una persona y sus opiniones se trasladan a cada ámbito, tanto cuando desarrollamos en proyectos personales como laborales (la famosa pelea sobre tabs o espacios, 2 o 4, te suena?).

Algo que aprendí con los años es separar mis opiniones y gustos de lo que se necesite a nivel negocio / producto.

[twitter https://twitter.com/pazguille/status/1274095569703763970]

Parece muy simple de leer pero en la práctica les aseguro que no es sencillo. Fueron muchos años de chocarme contra la pared y enojarme, casi siempre por una frustración personal.

Esta separación no quita que me exprese o dé mi punto de vista sobre un feature o cómo implementar algo.

**Lo importante es dar a conocer nuestra opinión, debatir, negociar y adaptarse.**

Es acá donde encuentro un desafío que me motiva: *¿Cómo puedo hacer que eso con lo que no estoy de acuerdo me deje lo más cómodo posible?*

> Si la hacemos, la hacemos bien.

Recuerdo un caso donde había que implementar Parallax Scrolling (claramente me estaban robando el scroll) y me puse como objetivo que iba a ser lo más performante posible.

Esto me llevó a leer muchos artículos sobre buenas prácticas para manejar el scroll y entender qué hace el browser mientras scrolleamos.

Les comparto algunos de los que leí y me ayudaron mucho:

- https://developers.google.com/web/updates/2016/06/passive-event-listeners
- https://developers.google.com/web/updates/2017/11/overscroll-behavior
- https://developers.google.com/web/updates/2017/01/scrolling-intervention
- https://developers.google.com/web/updates/2018/07/css-scroll-snap
- https://medium.com/remys-blog/smooth-scroll-sticky-navigation-2-3-6d3004cdd0c3
- https://www.rubensuet.com/intersectionObserver/
- https://addyosmani.com/blog/react-window/

Luego de aprender e iterar, el resultado fue increíble!

![Utilizando la API de requestAnimationFrame se obtienen resultados performantes al hacer cosas en el scroll](https://photos.collectednotes.com/photos/147/d35a42ae-7156-44d7-9e1d-297b403378d5)

> No nos roben el scroll!

Chao. 🚀

---
