/** @jsx h */
import { h } from 'https://esm.sh/preact';
import blog, { ga } from 'https://deno.land/x/blog@0.5.0/blog.tsx';
// import blog from 'https://raw.githubusercontent.com/pazguille/deno_blog/main/blog.tsx';
import Footer from './components/Footer.jsx';

blog({
  lang: 'es-AR',
  theme: 'dark',
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
  ],
  dateFormat: (date) => date.toLocaleDateString('es-AR', { dateStyle: 'medium' }),
  // middlewares: [
  //   ga4('G-7PQP926E3C'), // Waiting for https://github.com/denoland/deno_blog/pull/31
  // ],
  footer: <Footer />,
  style: `ul { list-style: disc; } ol { list-style: decimal; } iframe { aspect-ratio:16/9; }`,
});
