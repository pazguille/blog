---
title: >
  Migré el blog a Deno en 5 minutos
description: >
  La forma que elegí para empezar a probar Deno fue migrando mi blog y quedé sorprendido de lo fácil y rápido que resultó.
publish_date: 2022-07-31
cover_html: <img alt="" src="/assets/deno-blog.png" style="margin:0 auto;" width="592" height="296">
og:image: https://blog.pazguille.me/assets/deno-blog.png
---

---

La forma que elegí para empezar a probar [Deno](https://deno.land) fue migrando [mi blog](https://blog.pazguille.me/) y quedé sorprendido de lo fácil y rápido que resultó.

Me sirvió para familiarizarme con su entorno, manejo de dependencias, permisos y leer el código de los módulos que usé.

*Nota: Si quieren saber más sobre Deno, les recomiendo leer el post [¿Por qué me copa Deno?](https://blog.pazguille.me/2022/por-que-me-copa-deno).*

## Primer paso

En MacOS, se puede usar homebrew para instalar Deno y [hay varias opciones disponibles según OS](https://deno.land/#installation).

En mi caso elegí Brew:

```
$ brew install deno
```

## Creando el blog
Una vez instalado, usé [Deno Blog](https://github.com/denoland/deno_blog) porque brinda todo lo necesario a nivel boilerplate para levantar un blog en 2 líneas de código.

```js
import blog from "https://deno.land/x/blog@0.4.2/blog.tsx";

blog({ ... });
```

*Nota: Muuucha magia pero lo interesante es [leer lo que hace el módulo para ir profundizando](https://github.com/denoland/deno_blog/blob/main/blog.tsx#L96).*

Creé la carpeta `./blog` y ejecuté el siguiente script desde la terminal:

```
$ deno run -r --allow-read --allow-write https://deno.land/x/blog/init.ts ./blog/
```

Una vez que finalizó ya tenía el setup inicial con un primer post "Hello world" a modo de demo.

Levanté el server local (clave viene con hot reload) ejecutando:

```
$ deno task dev
```

Personalicé la home, configurando algunos aspectos del blog en el archivo `./blog/main.ts`. Lo malo es que no hay mucha documentación, por lo que [les recomiendo leer directamente los types](https://github.com/denoland/deno_blog/blob/main/types.d.ts#L17).

```js
import blog from 'https://deno.land/x/blog@0.4.2/blog.tsx';

blog({
  lang: 'es-AR',
  theme: 'dark',
  dateStyle: 'long',
  author: 'Guille Paz',
  title: 'Guille Paz',
  description: 'Algunas cosas que tengo en la cabeza y trato de bajar a pantalla.',
  favicon: '/assets/favicon.ico',
  avatar: '/assets/avatar.jpg',
  ogImage: 'https://blog.pazguille.me/assets/avatar.jpg',
  avatarClass: 'rounded-full',
  links: [
    { title: 'Email', url: 'mailto:guille87paz@gmail.com' },
    { title: 'GitHub', url: 'https://github.com/pazguille' },
    { title: 'Twitter', url: 'https://twitter.com/pazguille' },
  ]
});
```

## Escribiendo un post

Una vez configurado migré y escribí los posts dentro de la carpeta `./blog/posts` creando archivos markdown para cada entrada. Por ejemplo `primeros-pasos-en-web.md`:

```
---
title: Primeros pasos en web
description: Si estás arrancado en web sugiero priorizar ...
publish_date: 2020-05-24
---

Si estás arrancado en web sugiero priorizar conocimientos básicos y conocer las herramientas estándar con las que vas a poder probar todo sin instalarte nada.
```

Cada post contiene meta data (front-matter) para configurar y pisar algunas configuraciones globales, como el autor.

## Vamo'a deployá
Todo muy lindo pero... ¿a dónde lo subo? Bueno, acá es donde juega [Deno Deploy](https://deno.com/deploy); <s>un sistema distribuido que permite correr JavaScript en el Edge.</s> el Vercel para correr proyectos de Deno sin tener que configurar nada adicional.

[Creé una cuenta](https://dash.deno.com/signin) en Deno Deploy (tiene plan gratuito 💸), luego un proyecto (pazguille-blog) y lo asocié al repo de al repo de Github y al archivo `main.tsx`.

Deploy.

Listo! El blog ya estaba disponible en `pazguille-blog.deno.dev` y luego puede configurar mi propio dominio: [https://blog.pazguille.me](https://blog.pazguille.me).

Super fácil me permitió aprender y empezar a meterme con Deno. Comparto [el código del blog](https://github.com/pazguille/blog) por si les interesa revisar.

Ahora quiero mover los markdown a una base de datos para seguir aprendiendo. Además, pensar en una web app para ABM donde voy a usar [Fresh](https://fresh.deno.dev/).

Chao. 🚀
---
