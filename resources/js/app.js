import './bootstrap';
import './sb-admin/sb-admin.js';
import './orbit/main.js';

import AppNav from './views/components/AppNav';
import AppSidebar from './views/components/AppSidebar';
import AppTel from './views/components/AppTel';
import router from './routes';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

Vue.component('app-nav', AppNav)
Vue.component('app-sidebar', AppSidebar)
Vue.component('app-tel', AppTel)
Vue.component('pulse-loader', PulseLoader)

new Vue({
    el: '#app',

    router: router,

});
