import './bootstrap';
import './sb-admin/sb-admin.js';
import './orbit/main.js';

// import './daterangepicker-master/moment.js';
// import './daterangepicker-master/daterangepicker.js';
// import './daterangepicker-master/example/browserify/main.js';
// import './daterangepicker-master/example/browserify/bundle.js';
// import './daterangepicker-master/example/amd/main.js';
// import './daterangepicker-master/example/amd/require.js';

import AppNav from './views/components/AppNav';
import AppSidebar from './views/components/AppSidebar';
// import VueTelInput from 'vue-tel-input';
import AppTel from './views/components/AppTel';
// import './sb-admin/sb-admin.min.js';
//import './sb-admin/demo/datatables-demo.js';
// import './sb-admin/demo/chart-area-demo.js';
// import './sb-admin/demo/chart-bar-demo.js';
// import './sb-admin/demo/chart-pie-demo.js';
import router from './routes';

Vue.component('app-nav', AppNav)
Vue.component('app-sidebar', AppSidebar)
// Vue.use(VueTelInput)
Vue.component('app-tel', AppTel)
// Vue.use(VueTelInput, [globalOptions = {
//     enabledCountryCode: true
//   }])

new Vue({
    el: '#app',

    router: router
    // components: {
    //     appNav
    // }
});
