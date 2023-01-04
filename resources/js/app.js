//import './bootstrap';
//import { createApp } from 'vue';


window.Vue = require('vue').default;
window.axios = require('axios');


//import Vue from 'vue'
//import Buefy from 'buefy'
// import 'buefy/dist/buefy.css'
import Vue from 'vue'
import vuetify from "../js/plugins/vuetify.js" // path to vuetify export


//QR Scanner
import VueQrcodeReader from "vue-qrcode-reader";
//for QR CODE Generation
import VueQrcode from '@chenfengyuan/vue-qrcode';
//npm i @chenfengyuan/vue-qrcode


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

//const app = createApp({});

//import ExampleComponent from './components/ExampleComponent.vue';
//app.component('example-component', ExampleComponent);

Vue.use(VueQrcodeReader); //https://gruhn.github.io/vue-qrcode-reader/demos/CustomTracking.html
Vue.component(VueQrcode.name, VueQrcode);


// Vue.filter('dayRemain', function(value) {
//     console.log(value)
//     let dateNow = new Date();
//     let dateFrom = new Date(value);
//     return dateNow.getDate() - dateFrom.getDate();
// });



const app = new Vue({
    vuetify,
    el: '#app',
});





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

//app.mount('#app');
