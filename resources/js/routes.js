import VueRouter from 'vue-router';

let routes = [
    {
        path: '/master',
        name: 'master',
        component: require('./views/ExampleComponent.vue').default
    },

    {
        path: '/master/profilecreate',
        name: 'profilecreate',
        component: require('./views/ProfileCreate.vue').default
    },

    {
        path: '/master/profileedit',
        name: 'profileedit',
        component: require('./views/ProfileEdit.vue').default
    },

    {
        path: '/master/resumeses',
        name: 'resumes',
        component: require('./views/Resumes.vue').default
    },

    {
        path: '/master/resumescreate',
        name: 'resumescreate',
        component: require('./views/ResumesCreate.vue').default
    },
    {
        path: '/master/showresume/:slug',
        name: 'showresume-slug',
        component: require('./views/ResumeShow.vue').default
    },
    {
        path: '/master/editresume/:slug',
        name: 'editresume-slug',
        component: require('./views/ResumesEdit.vue').default
    }
];

export default new VueRouter({
    mode: 'history',
    routes
});
