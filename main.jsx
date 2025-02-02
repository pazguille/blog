/** @jsx h */
import { h } from 'https://esm.sh/preact';
import blog from 'blog';
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
  middlewares: [
    // async (req, ctx) => {
    //   const { pathname } = new URL(req.url);
    //   console.log('req', pathname);
    //   return await ctx.next();
    // }
    // ga4('G-7PQP926E3C'), // Waiting for https://github.com/denoland/deno_blog/pull/31
  ],
  footer: <Footer />,
  style: `ul { list-style: disc; } ol { list-style: decimal; } iframe { aspect-ratio:16/9; }
  img { width: 100% };`,
});
