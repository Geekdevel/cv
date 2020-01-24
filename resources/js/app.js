import './bootstrap';
import './sb-admin/sb-admin.js';
import './orbit/main.js';
import AppNav from './views/components/AppNav';
import AppSidebar from './views/components/AppSidebar';
// import './sb-admin/sb-admin.min.js';
//import './sb-admin/demo/datatables-demo.js';
// import './sb-admin/demo/chart-area-demo.js';
// import './sb-admin/demo/chart-bar-demo.js';
// import './sb-admin/demo/chart-pie-demo.js';
import router from './routes';

Vue.component('app-nav', AppNav)
Vue.component('app-sidebar', AppSidebar)

new Vue({
    el: '#app',

    router: router
    // components: {
    //     appNav
    // }
});
