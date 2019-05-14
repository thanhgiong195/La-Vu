require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueAuth from '@websanova/vue-auth';

import App from './App.vue';
import DetailComponent from './components/contacts/DetailComponent.vue';
import CreateComponent from './components/contacts/CreateComponent.vue';
import IndexComponent from './components/contacts/IndexComponent.vue';
import EditComponent from './components/contacts/EditComponent.vue';
import LoginComponent from './components/users/LoginComponent.vue';
import RegisterComponent from './components/users/RegisterComponent.vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/';

const routes = [{
    name: 'home',
    path: '/',
    component: IndexComponent
  },
  {
    name: 'create',
    path: '/create',
    component: CreateComponent
  },
  {
    name: 'contacts',
    path: '/contacts',
    component: IndexComponent
  },
  {
    name: 'edit',
    path: '/edit/:id',
    component: EditComponent
  },
  {
    name: 'detail',
    path: '/contact/:id',
    component: DetailComponent
  },
  {
    name: 'login',
    path: '/login',
    component: LoginComponent
  },
  {
    name: 'register',
    path: '/register',
    component: RegisterComponent
  }
];

const router = new VueRouter({
  mode: 'history',
  routes: routes
});

Vue.router = router

Vue.use(VueAuth, {
  router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
  auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
  http: require('@websanova/vue-auth/drivers/http/axios.1.x.js')
});

const app = new Vue(Vue.util.extend({
  router
}, App)).$mount('#app');