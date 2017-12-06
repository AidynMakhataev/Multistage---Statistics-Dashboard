
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
Vue.component('actions-overview', require('./components/ActionsOverview.vue'));
Vue.component('people-overview', require('./components/PeopleOverview.vue'));
Vue.component('country-report', require('./components/CountryReport.vue'));
const app = new Vue({
    el: '#app'
});
