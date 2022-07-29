---
title: >
  Micro frontends a escala
description: >
  Me preguntaron si en Mercado Libre usamos microfrontends. Mi respuesta fue: "Si, pero..."
publish_date: 2021-10-08
---

---

Me preguntaron si en Mercado Libre usamos microfrontends. Mi respuesta fue: "Si, pero..."

![alt](https://photos.collectednotes.com/photos/147/080d8556-b873-4d21-b024-6d1b14be63d7)

Últimamente el termino está muy relacionado a componentes, usar múltiples frameworks, SPAs y bundles de JS, pero en nuestro caso no es tan así.

Cuando se habla de microfrontend se refiere a una arquitectura que nos permite romper una aplicación monolítica en partes  pequeñas, que podrían ser otras aplicaciones o componentes.

El stack actual que usamos es Node + Express + React, con Server Side Rendering en la mayoría de los casos (hay excepciones, pero las menos).

Vamos a pensar en uno de los flujos que hace una persona al ingresar a MELI.

Entra en Mercado Libre, busca productos, ve sus detalles, los agrega al carrito y los compra.

Cada uno de los pasos son diferentes aplicaciones que pertenecen a distintos equipos, los cuales trabajan para ofrecer "una única experiencia de compra".

Veamos las aplicaciones:

1. Entra a Mercado Libre -> HOME
2. busca un productos -> SEARCH
3. ve sus detalles -> PDP
4. los agrega al carrito -> CART
5. los compra -> CHO

De esta manera, cada equipo tiene la autonomía de desarrollar, deployar e iterar rápidamente sin dependencias.

A nivel código, todos los frontends parten de una misma base. De esta manera, nos aseguramos de reutilizar la mayor cantidad de código y es clave nuestro design system (librería de React) para lograr consistencia visual y de interacción. Así es como parece una sola  aplicación.

### Resumiendo

- Usamos microfrontends con múltiples aplicaciones
- Todos los equipos usan React
- Reutilizamos la mayor cantidad de código
- Preferimos MPAs en vez de SPAs
- Queremos jugar con Webpack module federation

Lectura recomendada sobre microfrontends:

- https://t.co/L5pXg2CJKd

Chao. 🚀

---
