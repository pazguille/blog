---
title: >
  Micro-frontends: más problemas que soluciones
description: >
  Los micro-frontends con horizontal split son una solución a un problema organizacional que impacta de lleno en la UX.
publish_date: 2023-03-30
cover_html: <img alt="" src="/assets/microfrontend-horizontal.jpg" style="margin:0 auto;" width="592" height="357">
og:image: https://blog.pazguille.me/assets/microfrontend-horizontal.jpg
---

---

La arquitectura de micro-frontend permite separar una aplicación monolítica en pequeñas partes, que podrían ser otras aplicaciones de frontend o componentes de UI.

De esta manera, cada equipo tiene la autonomía de desarrollar, deployar e iterar rápidamente sin dependencias.

Principalmente, hay dos formas de hacerlo:

**Horizontal split**: permite dividir las interfaces del negocio en porciones de UI que se asignan a diferentes equipos. Una pantalla con  múltiples responsables.

**Vertical split**: permite dividir el negocio en varias aplicaciones de frontend priorizando la experiencia completa de cada interfaz. Cada aplicación se asigna a un equipo responsable. Una pantalla un  responsable.

![alt](https://microfrontend.dev/images/frameworks/splits.dark.svg)

Los micro-frontends con horizontal split traen más problemas que soluciones y lo que intentan es resolver un problema organizacional del equipo de IT / Producto, que impacta directamente en la UX.

Cuando muchos equipos son responsables de una parte ¿quién es realmente el responsable?

Se vuelve complejo velar por la performance, la estabilidad, la accesibilidad y la UX general. La cosa empeora si cada micro-frontend está desarrollado en un stack diferente. La consistencia visual y funcional entra en riesgo y ni hablar de la performance.

Uno de los principales beneficios que plantea esta estrategia es ganar agilidad e independencia para... ¿el user o el dev? ¿qué impacto tiene en el user final? Es una solución 100% orientada a desarrollo.

Hago una distinción entre micro-frontends y fragments:

- **Micro-frontends**: la separación de una experiencia completa (el negocio) en diferentes partes (aplicaciones de frontend).

- **Fragments**: componentes de UI que se comparten entre múltiples aplicaciones de frontend (ej. header/footer o sidebar), o bien, que los responsables son otros equipos.

Los fragments son necesarios y resuelven una necesidad de negocio. Lo importante es que el responsable es quien lo incluye ya que vela por la experiencia completa.


En base a mi experiencia con micro-frontends recomiendo:

- Usar la estrategia Vertical split (múltiples aplicaciones).
- Responsables claros de cada parte de la experiencia.
- Todos los equipos usando el mismo stack.
- Priorizar una experiencia MPA en vez de SPA.
- Reutilizar la mayor cantidad de código ayuda a la DX y a la UX (un design system brinda agilidad de desarrollo, cohesión y consistencia).
- Crear con un equipo de plataforma o arquitectura de frontend que defina y vele por la arquitectura.
- Contar con governance y observability de la experiencia completa.


Lectura recomendada:
- [microfrontend.dev](https://microfrontend.dev/)


Chao. 🚀

---

*La foto de cover y del post es del sitio https://microfrontend.dev/architecture/#patterns.*
