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
    },

    {
        path: '/profileedit',
        name: 'profileedit',
        component: require('./views/ProfileEdit.vue').default
    },

    {
        path: '/summaries',
        name: 'summaries',
        component: require('./views/Summaries.vue').default
    },

    {
        path: '/summariescreate',
        name: 'summariescreate',
        component: require('./views/SummariesCreate.vue').default
    },

    {
        path: '/showsummare',
        name: 'showsummare',
        component: require('./views/ShowSummare.vue').default
    }
];

export default new VueRouter({
    routes
});
