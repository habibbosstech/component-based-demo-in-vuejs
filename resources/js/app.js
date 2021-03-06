require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';
import CreateSupplierComponent from './components/CreateSupplierComponent.vue';
import SuppliersComponent from './components/SuppliersComponent.vue';
import EditSupplierComponent from './components/EditSupplierComponent.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/create',
      component: CreateComponent
  },
  {
      name: 'products',
      path: '/products',
      component: IndexComponent
  },
  {
      name: 'edit',
      path: '/edit/:id',
      component: EditComponent
  },
  {
      name: 'createSupplier',
      path: '/supplier/create',
      component: CreateSupplierComponent
  },
  {
      name: 'suppliers',
      path: '/suppliers',
      component: SuppliersComponent
  },
  {
      name: 'editSupplier',
      path: '/supplier/edit/:id',
      component: EditSupplierComponent
  }
];

// const router = new VueRouter({ mode: 'history', routes: routes});
const router = new VueRouter({ mode: 'hash', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
