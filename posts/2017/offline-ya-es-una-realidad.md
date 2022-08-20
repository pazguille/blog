---
title: >
  🔌 Offline ya es una realidad.
description: >
  Offline es un estado de nuestra aplicación, por lo que tenemos que contemplarlo y ofrecer alguna solución a nuestros usuarios.
publish_date: 2017-12-03
cover_html: <img alt="" src="/assets/islands-cover.jpg" style="margin:0 auto;" width="592" height="395">
og:image: https://blog.pazguille.me/assets/islands-cover.jpg
---

---

Offline es un estado de nuestra aplicación, por lo que tenemos que contemplarlo y ofrecer alguna solución a nuestros usuarios.
¿Cómo puede ser que una aplicación web pueda utilizarse sin acceso a internet? Parece algo contraproducente. Sí, pero es la posta.

[En Agosto del 2014](https://github.com/pazguille/offline-first/commit/644e1bef0313341dd4451b5ef98ff160baac05c0), creé el repositorio [offline-first](https://github.com/pazguille/offline-first) con el objetivo de recopilar información sobre cómo hacer que nuestras web apps sean accesibles cuando no tenemos internet o la conexión es mala.

En su momento, había muy poca información y [la tecnología con la que contábamos](https://developer.mozilla.org/en-US/docs/Web/HTML/Using_the_application_cache) no estaba tan madura ya que [tenía varios problemas](https://alistapart.com/article/application-cache-is-a-douchebag/).

[A principios del 2013](https://github.com/w3c/ServiceWorker/commit/c49c878cdcbaf7a81e9e8cf3cca9970787017a19), se empezó a trabajar en el draft de lo que hoy conocemos como [Service Workers](https://www.w3.org/TR/service-workers/) y fue un punto de inflexión para el mundo de web offline.

Pueden ver [la charla de Jake Archibald](https://www.youtube.com/watch?v=Oic22dQMRXQ&feature=youtu.be&t=9m11s) donde muestra el primer draft. Si ya usaron Service Workers van a poder ver de dónde viene y sino conocer un poco más de su historia.

Con el tiempo, entendí que **offline es un estado de nuestra aplicación que tenemos que contemplar** (esto aplica para las aplicaciones nativas también!).

En el 2015, [me animé a dar un par de charlas](https://speakerdeck.com/player/a6107a1fa6734ada8fe4786341c61df5) sobre el tema en meetups y conferencias. Fue una experiencia increíble ya que tuve la oportunidad de compartir y presentar un nuevo tema del cual muy pocos venían hablando.

Muchos estábamos interesados pero a la hora de querer implementar offline se complicaba debido al soporte de los browsers.

Por suerte, [hoy puedo decir que es una realidad](https://jakearchibald.github.io/isserviceworkerready/), que ya contamos con el soporte de la mayoría de los navegadores y [las herramientas están a nuestra disposición](https://web.dev/storage-for-the-web/).

![El estado de implementación de Service Worker en los diferentes browsers.
](https://miro.medium.com/max/1400/1*if299BrFimFFxV0GWHAFeg.png)


El estado de implementación de Service Worker en los diferentes browsers.
¿Qué estamos esperando para dar un paso hacia delante y [crear nuevas experiencias](https://web.dev/offline-ux-considerations/)?

Chao. 🚀

---
