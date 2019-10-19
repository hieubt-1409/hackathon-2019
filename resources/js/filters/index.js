import Vue from 'vue';
import formatNumber from './formatNumber';

function install() {
    Vue.filter('formatNumber', formatNumber);
}

export default { install };
