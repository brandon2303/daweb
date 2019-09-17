
require('./bootstrap');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('form-upload-component', require('./components/FormUpload.vue').default);
Vue.component('registro-component', require('./components/registro.vue').default);
Vue.component('usability-component', require('./components/Usability.vue').default);

const app = new Vue({
    el: '#app',
});
