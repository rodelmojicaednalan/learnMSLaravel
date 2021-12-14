require('./bootstrap');

// custom select2
$('#kt_datatable_search_status').select2();
$('#kt_datatable_search_type').select2();


window.Vue = require('vue');

import VueApexCharts from 'vue-apexcharts'


Vue.use(VueApexCharts)


//Main pages

Vue.component('apexchart', VueApexCharts)
Vue.component('dropzone-vue', require('./components/dropzone/Dropzone.vue').default)
Vue.component('classes-conducted', require('./components/charts/ClassesCunducted.vue').default);
Vue.component('payment-transacted', require('./components/charts/PaymentTransacted.vue').default);
Vue.component('top-teachers', require('./components/charts/TopTeachers.vue').default);
Vue.component('new-students', require('./components/charts/NewStudents.vue').default);
Vue.component('payment-received', require('./components/charts/PaymentReceived.vue').default);

// console.log("hello world");

const app = new Vue({
    el: '#app'
});