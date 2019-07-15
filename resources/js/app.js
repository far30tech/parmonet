import swal from 'sweetalert2';


require('./bootstrap');

window.swal =swal;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app'
});