---
title: >
  Progressive Enhancement en los tiempos que corren
description: >
  Cuando empecé a aprender web tuve la suerte de estar rodeado de personas que me enseñaron diferentes conceptos para desarrollar y construir frontends.
publish_date: 2020-07-09
---

---

![alt](https://photos.collectednotes.com/photos/147/c8c220cf-0245-4190-aaf2-eef939972768)

Cuando empecé a aprender web tuve la suerte de estar rodeado de personas que me enseñaron diferentes conceptos para desarrollar y construir frontends.

Uno de estos conceptos fue *Progressive Enhancement* (Mejora Progresiva).

> Mejora Progresiva

> **Es conocer la plataforma web y pensar en la funcionalidad básica  a la hora de construir nuestro frontend.**

Para que sea sencillo de explicar veamos un ejemplo con los famosos M&M.

Aquellas personas que podemos comer maní y nos gusta, lo disfrutamos cuando viene recubierto de chocolate y aún más si lo cubrimos con confite.

Si al maní le aplicamos *Mejora Progresiva*, obtenemos un resultado mucho más rico y seguimos comiendo maní.

![alt](https://photos.collectednotes.com/photos/147/241d1720-ea4e-452b-9691-74c08def0bc8)

Si lo llevamos al desarrollo frontend podemos decir que **es una filosofía que nos invita a pensar en la funcionalidad básica de nuestro frontend y mejorarla de manera progresiva sumando features.**

En la actualidad hay detractores de esta forma de pensar y el concepto está pasando al olvido.

[twitter https://twitter.com/pazguille/status/1280478459077300226]

[Hace unos años se explicaba](https://alistapart.com/article/understandingprogressiveenhancement/) que las capas de mejora eran HTML como el contenido (maní), CSS como la presentación (chocolate) y JavaScript como la interacción (confite).

![alt](https://photos.collectednotes.com/photos/147/e8e53834-492b-4df4-85f2-245e5764f787)

Al contarlo de esta manera, es entendible por qué está quedando en el olvido y más si respondemos la pregunta: *¿Cuántos navegadores no soportan CSS o JS?*.

Sin embargo, considero que la filosofía plantea unas etapas que son muy importantes y continuan vigentes en los tiempos que corren, sobre todo para tener frontends Accesibles.

Las etapas son:

1. Identificar la funcionalidad básica.
2. Disponibilizar esta funcionalidad de la manera más simple utilizando la tecnología adecuada.
3. Mejorar la experiencia.

Vamos a ponerlo en acción con un ejemplo.

Supongamos que tenemos que hacer un frontend donde la funcionalidad básica es enviar una nueva contraseña.

Podríamos implementarlo de la siguiente manera:

```html
<section>
  <label for="password">Nueva Contraseña</label>
  <input id="password" type="password"/>
  <button>Enviar</button>
</section>
```
Ahora, necesitamos agregar el JavaScript responsable de la interacción del botón, los eventos de teclado para el enter, las validaciones necesarias, obtener el nuevo valor y enviarlo.

🚫 ¡NO!

![alt](https://photos.collectednotes.com/photos/147/df1d8102-c302-4715-99b4-8aafdb65bf6f)

*¿Qué? ¿De qué habla señor mayor?*

Estas 4 cosas ya las hace el navegador de forma nativa ¿por qué vamos a reinventar la rueda?

En este caso podemos usar la tecnología adecuada evitando retrabajo y ser accesibles.

```html
<form action="/new-password" method="POST">
  <label for="new-password">Nueva Contraseña</label>
  <input
    id="new-password"
    name="new-password"
    type="password"
    required
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
  />
  <button type="submit">Enviar</button>
</form>
```

De esta manera, nos apoyamos en la plataforma y solamente deberíamos agregar un handler al evento `submit` del `<form>` para completar la funcionalidad básica o mejorar la experiencia.

Si les interesa conocer más sobre esto o revisar casos reales [chiflen por twitter](https://twitter.com/pazguille)!

Chao. 🚀

---
