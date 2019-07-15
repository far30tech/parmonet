import swal from 'sweetalert2';

require('./bootstrap');

window.swal =swal;

// Vue.component('comment', require('./components/Comments.vue').default);


const app = new Vue({
    el: '#app'
});