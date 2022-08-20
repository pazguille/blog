---
title: >
  Qué aprendimos al trabajar en accesibilidad digital
description: >
  En Mercado Libre comenzamos un recorrido para ofrecer un producto accesible y queremos compartir lo que fuimos aprendiendo.
publish_date: 2021-11-03
cover_html: <img alt="" src="https://miro.medium.com/max/1400/1*Y3e8EFhg8l0hHbkrNDWOrA.jpeg" style="margin:0 auto;" width="592" height="296">
og:image: https://miro.medium.com/max/1400/1*Y3e8EFhg8l0hHbkrNDWOrA.jpeg
allow_iframes: true
---

---

En Mercado Libre comenzamos un recorrido para ofrecer un producto accesible y queremos compartir lo que fuimos aprendiendo.

> La accesibilidad digital es la práctica inclusiva que busca garantizar el libre acceso a la web y a las aplicaciones nativas para todas las personas, a través de un diseño que permita percibir, entender, navegar e interactuar libremente con el contenido.

Parte de nuestro ADN es mejorar e iterar los productos, por lo que comenzamos un proceso continuo de aprendizaje y concientización para lograr que la accesibilidad digital esté presente al construir las experiencias e interfaces.

## El punto de partida

Los primeros esfuerzos para mejorar la accesibilidad de la plataforma fueron impulsados por diferentes personas de forma individual que buscaban concientizar sobre la problemática dando charlas y compartiendo buenas prácticas. Con el tiempo, empezó a ganar espacio y más personas comenzaron a interesarse. Se creó un grupo en Workplace y un canal de Slack con el objetivo de centralizar el conocimiento y compartir experiencias de algunas personas.

La pandemia expuso las barreras y oportunidades de mejora, y durante el 2020 recibimos feedback de personas que no podían utilizar correctamente la plataforma. Esto ayudó a acelerar parte del proceso y nos permitió ver que **los obstáculos se originan a partir de nuestra manera de pensar, diseñar y construir los productos**.

Es así como vimos la necesidad y la oportunidad de crear un equipo dentro de Frontend Platform, cross a todos los equipos de IT, que trabaje con foco en accesibilidad. Dada la dinámica de trabajo en IT, pensamos un equipo multidisciplinario con personas de UX (diseño y user research) y desarrollo (web y nativo).

El primer paso fue definir nuestra misión y una serie de objetivos basados en diagnóstico, concientización y ejecución que nos permitieron comenzar a organizar el trabajo.

*Apoyar el diseño y desarrollo de productos accesibles eliminando las barreras de acceso y creando soluciones que funcionen bien para todas las personas.*

## Las primeras tareas

Estaba claro que teníamos que aprender sobre accesibilidad y entender en dónde estábamos. Definimos una serie de tareas para comenzar y avanzar en paralelo:

- aprender sobre accesibilidad.
- concientizar al equipo de IT.
- relevar los flujos para entender dónde estábamos.
- construir un Accessibility Capability.

## Aprender sobre accesibilidad

Realizamos diferentes cursos y talleres online ([W3C](https://www.w3.org/WAI/fundamentals/foundations-course/), [Udacity](https://www.udacity.com/course/web-accessibility--ud891), [MDN](https://developer.mozilla.org/en-US/docs/Learn/Accessibility)) donde aprendimos **que los problemas de accesibilidad van más allá de cuestiones técnicas o código**. Es necesario que [los diferentes roles que definen un producto conozcan del tema](https://web.dev/a11y-for-teams/) y se trabaje en equipo en todas las etapas de desarrollo para lograr ser más accesibles.

Otra gran enseñanza fue que [no existen soluciones mágicas que mejoren la accesibilidad](https://shouldiuseanaccessibilityoverlay.com/). Es importante que las bases sean accesibles para construir de forma sólida y escalar. En este punto, nos dimos cuenta de que teníamos que pensar en una solución que resolviera los problemas actuales relacionados con el contraste de colores (principalmente el uso de grises), la falta de foco cuando se navega utilizando un teclado, con los elementos que no son enunciados correctamente por el lector de pantalla (como fue el caso de los precios) y con imágenes sin un texto alternativo, entre otros. Estas soluciones debían asimismo evitar futuros problemas.

![Modificamos los grises para contar con una paleta con mejor contraste.
](https://miro.medium.com/max/1400/0*pp378upo2dVbtuN4)

Por lo tanto, empezamos a trabajar con personas y consultoras expertas en el tema para continuar aprendiendo y que nos acompañen en las próximas tareas.

## Concientizar al equipo de IT

Es importante que todas las personas del equipo conozcan y cuenten con las herramientas para crear experiencias pensando en la accesibilidad. Con el objetivo de conocer los distintos perfiles que se benefician al ser accesibles, dictamos un taller interno de concientización orientado a comprender de forma práctica las barreras más frecuentes y a conocer cómo se navega con tecnologías asistivas, así como las herramientas que existen para validar la accesibilidad.

Asimismo, [generamos un listado de cursos y recursos online](https://gist.github.com/pazguille/b2be349554dc9b3a67ca859861e2832b) para los diferentes perfiles y estamos trabajando en una iniciativa para continuar concientizando a mayor escala.

## Relevar los flujos para entender dónde estábamos

Nuestro ecosistema de productos cuenta con una gran cantidad de flujos. Empezamos a relevar el flujo de compra en el e-commerce realizando testeos manuales sobre la plataforma web y luego lo expandimos al mundo nativo de Android y iOS. Se realizó una auditoría por cada una de las pantallas que forman parte del flujo y generamos un backlog para ir trabajando con los diferentes equipos.

Estas acciones nos permitieron aprender [la importancia de realizar testeos manuales](https://www.smashingmagazine.com/2018/09/importance-manual-accessibility-testing/) con personas que presentan alguna discapacidad para asegurarnos de que las soluciones aplicadas tengan el impacto adecuado. Los testeos automáticos son una excelente herramienta para entender si estamos siguiendo las guías y buenas prácticas, pero no garantizan que la experiencia sea accesible.

<iframe width="100%" height="400" src="https://www.youtube.com/embed/aE_jw1kD08Y" title="Precios accesibles." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

![Solucionamos el estado de foco en los elementos al navegar por teclado.
](https://miro.medium.com/max/1400/1*AfJV9sz85dkD1S6Vf1JUOg.gif)

![Restauramos el foco a la posición original después de cerrar el modal.
](https://miro.medium.com/max/1400/1*Qtqf8ju8LjfX2cEYd5_IjQ.gif)

![Solucionamos la navegación de los elementos desplegables de la barra de navegación.
](https://miro.medium.com/max/1400/1*8m4gTpqO1D16ZJxB30i3YA.gif)

Una vez listados los problemas, comenzamos a entender la mejor forma de solucionarlos y aprendimos que [hay diferencias entre los lectores de pantalla](https://a11ysupport.io/) ya que puede existir inestabilidad para algunas de las soluciones que se apliquen.

![Tabla donde se indica el soporte del role “alert” de ARIA en los diferentes navegadores.
](https://miro.medium.com/max/1400/0*jPdl0mHC_46vKfF1)

## Construir Accessibility Capability

A medida que fuimos avanzando y entendiendo los problemas, nos dimos cuenta de que gran parte podrían ser solucionados con nuestro [Design System: Andes UI](https://www.behance.net/gallery/72037475/Andes-UI) que ofrece las definiciones y componentes de UI para construir ágilmente experiencias digitales consistentes y de calidad.

Uno de los problemas que encontramos es que la mayoría de las interfaces que construimos utilizan Andes y los componentes no eran accesibles. Realizamos una auditoría para cada uno de ellos y creamos un backlog en el que estamos trabajando para remediar los problemas. De esta forma, vamos a ofrecer componentes como Dropdown, Modal, Tootip, Carrusel, entre otros que permitan construir experiencias más accesibles desde el comienzo.

![Listado con la colección de los componentes en los que estamos trabajando su accesibilidad.
](https://miro.medium.com/max/1400/0*YST7ZA9yrgbKmQOh)

Es importante dar visibilidad de cómo estamos y que cada equipo pueda responder esta pregunta. Es por eso que empezamos a construir un servicio de monitoreo que realiza análisis automatizados para complementar los tests manuales y poder asegurar la accesibilidad de forma constante.

![Resultado de los reportes automatizados con los problemas de accesibilidad.
](https://miro.medium.com/max/1400/0*QxiiISFcMvTRxvI7)

## Conclusión

Sabemos que aún tenemos un largo recorrido y mucho trabajo por delante, pero estamos conscientes de que vamos por buen camino y bien acompañados.

Tenemos el desafío de generar nuestros sitios y aplicaciones más accesibles. [Si te interesa acompañarnos, podes sumarte](https://careers-meli.mercadolibre.com/).

¿Estás trabajando en accesibilidad? ¿Qué aprendizajes tuviste?

Chao. 🚀

---
