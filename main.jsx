/** @jsx h */

import blog, { ga } from 'https://deno.land/x/blog/blog.tsx';
import { h } from 'https://esm.sh/preact';

import Footer from './components/Footer.jsx';

blog({
  lang: "es-AR",
  dateStyle: "long",
  author: "Guille Paz",
  title: "Guille Paz",
  description: "Algunas cosas que tengo en la cabeza y trato de bajar a pantalla.",
  favicon: "/assets/favicon.ico",
  avatar: "/assets/avatar.jpg",
  ogImage: "https://blog.pazguille.me/assets/avatar.jpg",
  avatarClass: "rounded-full",
  links: [
    { title: "Email", url: "mailto:guille87paz@gmail.com" },
    { title: "GitHub", url: "https://github.com/pazguille" },
    { title: "Twitter", url: "https://twitter.com/pazguille" },
  ],
  middlewares: [
    ga('G-7PQP926E3C'),
  ],
  footer: <Footer />,
  // style: ``,
  // showHeaderOnPostPage: true,
});
