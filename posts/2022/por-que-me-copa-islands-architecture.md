---
title: >
  ¿Por qué me copa Islands Architecture?
description: >
  La idea de 🏝 Islands Architecture es muy simple: separar las partes dinámicas de las estáticas dentro de una página.
publish_date: 2022-08-18
cover_html: <img alt="" src="/assets/islands-cover.jpg" style="margin:0 auto;" width="592" height="296">
og:image: https://blog.pazguille.me/assets/islands-cover.png
---

---

La idea de 🏝 [Islands Architecture](https://www.patterns.dev/posts/islands-architecture/) es muy simple: separar las partes dinámicas de las estáticas dentro de una página.

> The Islands Architecture is cool: server-render HTML with small "islands" that get interactive independently.
> – Addy Osmani

Básicamente renderizar todo el HTML en el server e "inyectar marcas" en aquellas secciones que van a ser dinámicas o tendrán interacción en el cliente. Estas secciones usan en el cliente los mismos componentes que en el server para hidratar como si fueran pequeños widgets.

![](https://pbs.twimg.com/media/FKF2Qp3VkAA_OAi?format=jpg&name=4096x4096)

Es la arquitectura que mejor se adapta a mis necesidades y a como pienso el frontend:

- Server-Side Rendering (JSX) + CSS + Small JS Bundles
- "Zero JavaScript" en páginas estáticas

Parece algo obvio pero hoy en día estamos lejos de esta arquitectura y es importante volver a la simplicidad de la que nos alejamos.

Cuando empecé a usar React me molestaba enviar toda la aplicación (state, props y bundles) cuando solamente algunas partes eran interactivas.

Siempre quedó como implícito que la única forma de usar React era tener un único root y montar (hidratar) toda la aplicación, aunque sea un sitio estático con un solo click.

Hoy existe una forma "universal" de llamar a un patrón que es utilizado por la mayoría de los casos de uso en la web, porque [Maybe you don’t need that SPA](https://medium.com/@mlrawlings/maybe-you-dont-need-that-spa-f2c659bc7fec).

En mis inicios con frontend tuve la suerte de estar rodeado de personas que me enseñaron sobre [Progressive Enhancement (Mejora Progresiva)](https://blog.pazguille.me/2020/progressive-enhancement-en-los-tiempos-que-corren) para pensar, desarrollar y construir la web.

Islands se apoya en esta idea y por eso me gusta.

> The output of islands is progressively enhanced HTML.

A nivel frameworks, la simplicidad de https://fresh.deno.dev es para seguir de cerca comparada con otras soluciones ([Marko](https://markojs.com/) y [Astro](https://astro.build/)) ya que podemos usar Preact (JSX) sin necesidad de aprender nada nuevo.

Sería ideal tener Islands en Next.js para que más personas puedan adoptar esta arquitectura y mantener simpleza en sus desarrollos.

[React Server Componentes](https://nextjs.org/docs/advanced-features/react-18/server-components) parece ser la respuesta pero considero que aún sigue siendo complejo y se encuentra en desarrollo.

Chao. 🚀

---

*Foto de cover por <a href="https://unsplash.com/@vjgalaxy?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Alejandro Piñero Amerio</a>.*
