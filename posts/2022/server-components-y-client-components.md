---
title: >
  Server Components y Client Components
description: >
  Un skill importante que se necesita en frontend es diferenciar componentes server-side y client-side.
publish_date: 2022-09-06
cover_html: <img alt="" src="/assets/server-client-components.png" style="margin:0 auto;" width="592px" height="359px">
og:image: https://blog.pazguille.me/assets/server-client-components.png
---

Un skill importante que se necesita en frontend es diferenciar componentes server-side y client-side.

[React Server Components](https://nextjs.org/docs/advanced-features/react-18/server-components), [Component Islands](https://www.patterns.dev/posts/islands-architecture/), [Web Components](https://web.dev/i18n/es/declarative-shadow-dom/) es lo que se viene y hay que ir poniendo en practica este skill para sacarles el mayor provecho.

Los **Server Components** se renderizan únicamente en el servidor y siempre son estáticos.
Mientras que los **Client Components** se renderizan en el servidor o en el cliente y siempre tienen interacción o son dinámicos.

La mejor forma de diferenciarlos es agarrando papel y lápiz (o cualquier tool para dibujar cajitas), dibujar las vistas y hacerse las siguientes preguntas:

- ***¿Cuáles son estáticos?***
- ***¿Cuáles son dinámicos?***
- ***¿Cuáles requieren interacción en el cliente?***
- ***¿Cuáles puedo cargar a demanda?***

![Análisis de los componentes Server y Client que componen el sitio xstoregames.com](/assets/server-client-anatomy.jpg)

Construir utilizando ambos componentes brindan los siguientes beneficios:

- Los Server Components no impactan en el peso de los bundles, mejor performance.
- Se reduce la cantidad de props y estado inicial que se necesita en el cliente.
- Los Server Components acceden a información privada o sensible de forma segura solamente desde el servidor.
- Ayudan a separar lógica y responsabilidades de manera más eficiente.
- Permiten compartir código entre el servidor y el cliente de manera consciente.

Es importante diferenciar Server Components de Server-Side Rendering (SSR). Con SSR renderizamos ambos tipos de componentes para generar el HTML final. Los Server Components solamente se renderizar en el servidor y no necesitan JavaScript para hidratarse en el cliente, son componentes estáticos.

Estoy haciendo el ejercicio de migrar [https://xstoregames.com](https://xstoregames.com) (full client-side rendering, solo Client Components) a [Component Island](https://blog.pazguille.me/2022/por-que-me-copa-islands-architecture).

Al finalizar voy a compartir cómo fue el proceso y aprendizajes.


Chao 🚀

---

*La foto de cover es un captura del sitio <a href="https://nextui.org/">https://nextui.org</a>.*
