
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('add-remove', require('./components/addremove.vue'));
Vue.component('add-inventory', require('./components/addInventory.vue'));
Vue.component('disp-sales', require('./components/displaySales.vue'));
Vue.component('disp-inventory', require('./components/displayInventory.vue'));

const app = new Vue({
    el: '#app'
});
