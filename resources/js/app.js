import './bootstrap';
import './sb-admin/sb-admin.js';
// import './sb-admin/sb-admin.min.js';
//import './sb-admin/demo/datatables-demo.js';
// import './sb-admin/demo/chart-area-demo.js';
// import './sb-admin/demo/chart-bar-demo.js';
// import './sb-admin/demo/chart-pie-demo.js';
import router from './routes';

new Vue({
    el: '#app',

    router: router
});
