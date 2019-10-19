import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

import filters from './filters';

window.Vue = Vue;
Vue.use(ElementUI);
Vue.use(filters);

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

new Vue({
    el: '#app',
});
