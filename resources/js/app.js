/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import router from "./routes";
import store from "./store";



// import store from "./store";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('home', require('./components/Home.vue').default);
Vue.component('bulma-nav-bar', require('./components/nav/NavBar.vue').default);
Vue.component('film-card', require('./components/cards/Film.vue').default);
Vue.component('film-page', require('./components/FilmPage.vue').default);
Vue.component('bulma-section', require('./components/BulmaSection.vue').default);
Vue.component('film-section', require('./components/cards/FilmPageSection.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Event = new Vue();

const app = new Vue({
    el: '#app',
    router,
    store,
    mounted() {
        this.$store.dispatch('fetchFilms');
    }
});
