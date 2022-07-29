---
title: >
  User Idle Detection: ¿Lobo está?
description: >
  Juguemos en la web mientras el lobo no está. ¿Lobo está?
publish_date: 2020-06-28
---

---

*Juguemos en la web mientras el lobo no está. ¿Lobo está?*

![alt](https://photos.collectednotes.com/photos/147/f80c91ef-9ad2-4147-ad69-68a1810f1f60)

- Photo by [Grégoire Bertaud](https://unsplash.com/@sirtook?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText)

Hace unos días estaba buscando nuevas APIs para web y me encontré con la API de [User Idle Detection](https://github.com/WICG/idle-detection#user-idle-detection). Básicamente nos permite identificar cuando el usuario no está interactuando con nuestra web:

> The Idle Detection API notifies developers when a user is idle, indicating such things as lack of interaction with the keyboard, mouse, screen, activation of a screensaver, locking of the screen, or moving to a different screen. A developer-defined threshold triggers the notification.

Hace unos años junto a [@impronunciable](https://twitter.com/impronunciable) desarrollamos un feature para expirar la sesión del usuario cuando no estaba realizando ninguna actividad dentro del Panel de Mango.

Esta funcionalidad es muy común en el mundo de las fintech ya que manejamos información muy delicada y no queremos que por un descuido quede expuesta en un tab abandonado. Seguramente puedan encontrarla en su Home Banking "amigo".

Recuerdo que [tuvimos que desarrollar los posibles casos para adivinar si el usuario estaba ahí o se había ido](https://getmango.com/blog/mejorando-la-experiencia-del-usuario-cuando-expira-su-sesion/) teniendo en cuenta diferentes eventos del mouse, teclado, scroll, entre otros.

Si en la actualidad tuviéramos que desarrollar este feature, sería muy sencillo!

```javascript
const log = (msg) => document.body.insertAdjacentHTML('beforeend', `<div>${msg}</div>`);

async function boot() {
  if (!window.IdleDetector) {
    log('IdleDetector no está soportado :(');
    return;
  }

  log('IdleDetector disponible! Vamo a jugar al bosque!');

  try {
    // El mínimo son 60 segundos
    let idleDetector = new IdleDetector({ threshold: 60 });
    idleDetector.addEventListener('change', e => {
      const { user, screen } = idleDetector.state;
      log(`${new Date().toLocaleTimeString()} - El usuario está ${user} y la pantalla ${screen}`);
    });
    await idleDetector.start();
  } catch (err) {
    // Puede haber algunos errores por permisos, por lo que leí, aunque no lo pude reproducir.
    log(`🤖 Peligro Peligro 🤖: ${err}.`);
  }
};

boot();
```

[Ver una pequeña demo](https://pazguille.github.io/user-idle-detection-demo/).

**NOTA**: Hay que activar el experimento *#enable-experimental-web-platform-features* en *chrome://flags*. En caso de querer usarlo en producción hay que [pedir un token de origin trial](https://developers.chrome.com/origintrials/#/trials/active).

Chao. 🚀

---
