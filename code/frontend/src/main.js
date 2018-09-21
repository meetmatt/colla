import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.config.productionTip = false;

Vue.use(VueRouter);

import App from './App.vue';
import Home from './components/Home.vue';
import StatusPing from './components/StatusPing.vue';
import StatusHealth from './components/StatusHealth.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Home},
        {path: '/status/ping', component: StatusPing},
        {path: '/status/health', component: StatusHealth},
    ]
});
new Vue({
    el: '#app',
    router: router,
    render: app => app(App)
});