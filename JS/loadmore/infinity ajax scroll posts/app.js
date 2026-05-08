import * as flsFunctions from "./modules/functions.js";

import { Fancybox } from "./modules/fancybox.esm.js";

import "./modules/inputmask.min.js";
import './components.js';

flsFunctions.isWebp();

// Import swiper
import Swiper, { Navigation, Pagination, Autoplay, Mousewheel, EffectFade, Thumbs, Scrollbar } from 'swiper';
Swiper.use([Navigation, Pagination, Autoplay, Mousewheel, EffectFade, Thumbs, Scrollbar]);


let ias = new InfiniteAjaxScroll('.posts', {
  item: '.post',
  next: '.next',
  pagination: '.pagination',
  spinner: '.spinner',

  // alternatively we can pass an Element
  spinner: document.getElementById('spinner1'),
})