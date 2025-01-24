import { config } from 'https://deno.land/x/dotenv@v1.0.1/mod.ts';

config({ export: true });

let deployctl = '';

const install = ('deno install --allow-read --allow-write --allow-env --allow-net --allow-run --no-check -r -f https://deno.land/x/deploy/deployctl.ts').split(' ');
const pi = Deno.run({
  cmd: install,
  stdout: "piped",
  stderr: "piped",
});
const { code } = await pi.status();
const rawOutputI = await pi.output();
const rawErrorI = await pi.stderrOutput();

if (code === 0) {
  const output = new TextDecoder().decode(rawOutputI);
  deployctl = output.split('\n')[1];
} else {
  const errorString = new TextDecoder().decode(rawErrorI);
  console.log(errorString);
}

import { serve } from "https://deno.land/std@0.140.0/http/server.ts";
serve(async (req) => {
  const { pathname } = new URL(req.url);

  if (pathname !== '/deno-deploy' || req.method !== 'POST') {
    return new Response('{}', {
      headers: { "content-type": "application/json" },
      status: 400,
    });
  }

  const deploy = (`${deployctl} deploy --token=${Deno.env.get('DENO_DEPLOY_TOKEN')} --project=pazguille-blog https://blog.pazguille.me/main.jsx`).split(' ');
  const pd = Deno.run({
    cmd: deploy,
    stdout: "piped",
    stderr: "piped",
  });

  const rawOutputD = await pd.output();
  const res = new TextDecoder().decode(rawOutputD);
  return new Response(res, {
    headers: { "content-type": "text/plain" },
  });

}, { port: 3030 });
