---
title: >
  Regalos, Regalar, Regalame
description: >
  Un poco sobre lo aprendido y la historia de 🎁 https://regalame.app.
publish_date: 2021-05-18
---

---

Un poco sobre lo aprendido y la historia de [regalame.app] 🎁(https://regalame.app)

> Recibir un pequeño o gran regalo es el nexo que nos hace sentir cerca de las personas que queremos. — https://regalame.app/

![alt](https://photos.collectednotes.com/photos/147/e3368492-3ce7-400c-a21b-b3c2b2dd9805)

Regalame te permite crear listas de regalos para compartir con otras personas, usando tus favoritos de Mercado Libre.

La idea surgió de [@co_constanza](https://twitter.com/co_constanza) cuando comentó su deseo de compartir con otras personas su lista de favoritos de Mercado Libre, para que le manden y poder mandar *regalitos*.

La idea tomó vuelo y consultando con otras personas fue evidente que compartían el mismo deseo. Además, en Twitter había muchas personas que también lo estaban pidiendo.

Bien, entonces ¿por qué no crear algo y aprender en el intento?

###  🧰 El Stack

Si hay algo que me gusta es ~~em~~-aprender sobre un proyecto que “cobre vida” y esta iba a ser una linda oportunidad.

Lo primero que me pregunté fue: ¿Qué cosas quiero aprender / probar? (spoiler sobre que sí y que no llegué).

- Serverless en general ✓
- Rust ❌
- Una base de datos NoSQL ✓
- Usar Next.js en un proyecto real con: ✓
  - Server Side Rendering ✓
  - SWR ❌
  - ISR ✓
- Cloudflare Workers ❌
- React Hooks ✓
- CSS Grids y Flexbox ✓
- Usar el VoiceOver para accesibilidad ✓

El stack que usé es gratuito por defecto y si bien tiene sus limitaciones (puede que explote todo) es excelente para empezar:

- [MongoDB Atlas](https://www.mongodb.com/cloud/atlas2) - Gratis
- [Vercel](https://vercel.com/) - Gratis
  - Backend: [Serverless API](https://vercel.com/docs/serverless-functions/introduction)
  - Frontend: [Next.js](https://nextjs.org/)
- [Cloudflare](https://www.cloudflare.com/) - Gratis

Algunos puntos que me gustaría destacar  de lo aprendido...

### ⚡️ Performance y caches

Siendo un gran amante de la web performance, tenía muchas ganas de jugar con [Incremental Static Regeneration (ISR)](https://www.smashingmagazine.com/2021/04/incremental-static-regeneration-nextjs/).

Considero que es un feature que marca un antes-y-después para el frontend y para servir el contenido lo más rápido posible.

> When a request is made to a page that hasn’t been generated, Next.js will server-render the page on the first request. Future requests will serve the static file from the cache.

[Los perfiles de regalame](https://regalame.app/pazguille) pueden cambiar sumando o eliminando listas o regalos. Por eso, la mejor forma para manejar su dinamismo es usando la opción `fallback: blocking`.

De esta manera, los perfiles y listas se generan a demanda la primera vez que se piden y luego quedan cacheadas en el edge y en el navegador, revalidándose cada 1 segundo.

*Primer request al perfil, generado a demanda*

![alt](https://photos.collectednotes.com/photos/147/d7f3806f-614a-401b-ab27-b590069d7619)

*Subsiguientes requests al perfil, cacheado en el edge*

![alt](https://photos.collectednotes.com/photos/147/67428a23-f7e3-46b9-b72b-6456f1c0532e)

*Subsiguientes requests al perfil, cacheado en el navegador*

![alt](https://photos.collectednotes.com/photos/147/275e141e-038e-4c62-912c-7f17292498a6)


### ✨ Accesibilidad y lectores de pantalla

Mientras iba construyendo las vistas me cuestionaba cuál era la información relevante para quién estaba navegando.

Es así como fui pensando y probando con el VoiceOver cómo iba quedando la experiencia al navegar con un lector de pantalla.

Luego de varias iteraciones, llegué a la conclusión que lo importante es poder leer el título y preció de lo que se quiere regalar. Es por eso que le indico al lector que no lea las imágenes de los productos en general y queda una experiencia mucho más limpia (quedo antento al feedback sobre este punto, ya que no estoy seguro).

[twitter https://twitter.com/pazguille/status/1381031963180556290]

### 🙌  Gracias

Esta iniciativa se empezó a desarrollar junto a otras personas a mediados del 2020 pero el contexto de pandemia sumado a cuestiones personales hizo que se frenara y continuara de forma independiente.

Recién en Marzo de 2021, retomé el desarrollo y quiero darle las gracias a Maria Lía Sediari quién me motivó y acompañó con ideas y contenidos.

[@impronunciable](https://twitter.com/impronunciable) y [@joniko](https://twitter.com/joniko) quienes me acompañan siempre desde lo profesional y personal, tirando magia, diseño y aguantando los trapos.

[@lucianov](https://twitter.com/lucianov) quien se copó y me reportó muchos bugs desde sus listas de regalos ¡carísimos!

Chao. 🚀

---
