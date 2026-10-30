import { createRoot } from 'react-dom/client';
import { createElement } from 'react';
import { HeroScene } from './HeroScene.jsx';

export function mountHero(el, opts) {
  const root = createRoot(el);
  root.render(createElement(HeroScene, opts));
  return root;
}
