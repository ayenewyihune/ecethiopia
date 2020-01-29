
require('./bootstrap');

window.Vue = require('vue');

// editor
import 'v-markdown-editor/dist/index.css';
// import Editor from 'v-markdown-editor'
import CKEditor from '@ckeditor/ckeditor5-vue';

// global register
// Vue.use(Editor);
Vue.use( CKEditor );

// vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)

import {filter} from './filter'

// vue router
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import {routes} from './routes'

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('navbar', require('./components/Navbar.vue').default);
// Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);

// v-form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

// sweetalert2
import Swal from 'sweetalert2'

window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.Toast = Toast;

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
  })

const app = new Vue({
    el: '#app',
    router,
    store
});
