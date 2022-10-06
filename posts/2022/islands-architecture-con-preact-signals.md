---
title: >
  Islands Architecture con Preact Signals
description: >
  Preact Signals viene a llenar el espacio vacío entre las islas 🏝.
publish_date: 2022-09-07
cover_html: <img alt="" src="/assets/island-signals.jpg" style="margin:0 auto;" width="592" height="322">
og:image: https://blog.pazguille.me/assets/island-signals.jpg
---

---

[🏝 Islands Architecture](https://blog.pazguille.me/2022/por-que-me-copa-islands-architecture) es
la arquitectura que mejor se adapta a como pienso el frontend. Sin embargo, tiene una desventaja cuando necesitamos manejar un estado global y comunicar cambios entre las islas. ¡Hasta hoy!

[Preact Signals](https://preactjs.com/blog/introducing-signals/) ofrece una nueva primitiva para manejar estados (globales o locales) y poder compartirlo entre las islas de una manera super rápida, fácil y natural a nivel DX:


- ✅ es como usar una prop dentro de los componentes / islas
- 🥳 se actualizan los componentes automáticamente cuando cambian los valores
- ⏱ actualiza directamente el DOM (¡super rápido!)


Estoy haciendo el ejercicio de migrar https://xstoregames.com (full client-side) a Islands y voy a tomar como ejemplo el feature de agregar/eliminar juegos de "Tu Wishlist".

Ahora puedo crear un Signal `wishlist` que va a contener el listado de los juegos y servir como estado global, el cual se comparte entre las islas `<AddToWishlist />` y `<MyWishlist />`:

```js
// wishlist.js

import { signal } from "@preact/signals";

export const wishlist = signal([]);
```


```js
// AddToWishlist.jsx

import { wishlist } from "../state/wishlist.js";

export function AddToWishlist(props) {
  return (
    <button
      onClick={() => {
        const index = wishlist.peek().findIndex((game) => game === props.game);
        if (index === -1) {
          wishlist.value = [...wishlist.peek(), props.game];
        } else {
          const newWishlist = [...wishlist.value];
          newWishlist.splice(index, 1);
          wishlist.value = newWishlist;
        }
      }}
    >
      {wishlist.value.findIndex((game) => game === props.game) >= 0 ? 'Remove' : 'Add' } {props.game.title}
    </button>
  );
}
```

```js
// MyWishlist.jsx

import { wishlist } from "../state/wishlist.js";

export function MyWishlist() {
  return (
    <>
      <ul>
        {wishlist.value.map((game, index) => (
          <li>
            {game.title}
          </li>
        ))}
      </ul>
    </>
  );
}
```


```js
// App.jsx

export function App(props) {
  return (
    <>
      <h2>Games</h2>
      {props.games.map((game, index) => <AddToWishlist game={game} />}

      <h2>My Wishlist</h2>
      <MyWishlist />
    </>
  );
}
```

¡Esto es game changer! Es el tipo de cambios que suman y avanzan a nivel DX y UX (performance).

Me permite mantener simplicidad y cubrir ese espacio que parecía vacío.


Chao. 🚀

---


*Foto de cover por <a href="https://es.vecteezy.com/vectores-gratis/naturaleza">Naturaleza Vectores por Vecteezy</a>.*
