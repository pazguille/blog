/** @jsx h */
import { configureBlog, createBlogHandler, h } from 'blog';
import html from "https://deno.land/x/htm@0.1.3/html.tsx";
import UnoCSS from "https://deno.land/x/htm@0.1.3/plugins/unocss.ts";
import ColorScheme from "https://deno.land/x/htm@0.1.3/plugins/color-scheme.ts";
import Footer from './components/Footer.jsx';

html.use(UnoCSS());
html.use(ColorScheme("auto"));

const blogState = await configureBlog(import.meta.url, false, {
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
    { title: 'X', url: 'https://x.com/pazguille', icon: '𝕏' },
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

const handler = createBlogHandler(blogState);

Deno.serve(handler);
