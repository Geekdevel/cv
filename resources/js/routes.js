import VueRouter from 'vue-router';

let routes = [
    {
        path: '/master',
        name: 'master',
        component: require('./views/ExampleComponent.vue').default
    },

    {
        path: '/profilecreate',
        name: 'profilecreate',
        component: require('./views/ProfileCreate.vue').default
    }
];

export default new VueRouter({
    routes
});
