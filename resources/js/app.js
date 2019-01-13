
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('login', require('./components/Login.vue').default);

/** Layout Components **/
Vue.component('navbar', require('./components/layout/Navbar.vue').default);

/** Host Components **/
Vue.component('cleaner-list', require('./components/cleaners/CleanerList.vue').default);
Vue.component('house-list', require('./components/houses/HouseList.vue').default);
Vue.component('host-house-details', require('./components/houses/HostHouseDetails.vue').default);
Vue.component('host-cleaner-details', require('./components/cleaners/HostCleanerDetails.vue').default);
Vue.component('new-cleaner-connection', require('./components/cleaners/NewCleanerConnection.vue').default);
Vue.component('cleaning-projects', require('./components/hosts/CleaningProjectsList.vue').default);
Vue.component('new-cleaning-project', require('./components/hosts/NewCleaningProject.vue').default);

/** House Components */
Vue.component('new-house', require('./components/houses/NewHouse.vue').default);
Vue.component('edit-house', require('./components/houses/EditHouse.vue').default);
Vue.component('manage-cleaners', require('./components/houses/ManageCleaners.vue').default);

/** Cleaner Components **/
Vue.component('cleaner-cleaning-list', require('./components/cleaners/CleanerCleaningList.vue').default);
Vue.component('cleaner-host-list', require('./components/hosts/CleanerHostList.vue').default);
Vue.component('cleaner-host-details', require('./components/hosts/CleanerHostDetails.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
