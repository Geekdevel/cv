<template>
    <div class="container-fluid" v-if="loading">
        <div class="row justify-content-center align-items-center">
            <pulse-loader v-if="loading" :color="color" :size="size"></pulse-loader>
        </div>
    </div>

    <div class="container" v-else-if="!loading">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>List your resumes</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="text-center">
                            <thead>
                                <tr>
                                    <th>Slug</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in resumes" :key="index">
                                    <td>
                                        <a :href="slugPublic + `/cvs/` + item.slag + `/public`" target="_blank">
                                            {{ item.slag }}
                                        </a>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'showresume-slag', params: { slag: item.slag } }" class="nav-link">
                                            <div class="btn btn-success">
                                                <i class="far fa-eye"></i>
                                            </div>
                                        </router-link>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'editresume-slag', params: { slag: item.slag } }" class="nav-link">
                                            <div class="btn btn-primary">
                                                <i class="fas fa-pen-nib"></i>
                                            </div>
                                        </router-link>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" @click="resumeDelete(item.id)">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

    export default {
        components: {
            PulseLoader
          },

        props: {
            user: {}
        },

        data() {
            return {
                loading: true,
                color: '#14CFE8',
                size: '30px',

                slugPublic: null,

                form: {
                    id: this.user.id,
                    name: null,
                    phone: null,
                    email: null
                },

                errormessages: {
                    error: null
                },

                resumes: [],
            }
        },

        methods: {
            resumeDelete(value) {
                axios.delete('/resumes/' + value)
                    .then(response =>{
                        this.resumes = response.data
                    })
                    .catch(error => {
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                        this.errormessages = error.response.data
                    })
            }
        },

        mounted() {
            axios.get('/resumes')
                .then(response =>{
                    this.resumes = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
            let url = window.location.toString()
            let arrUrl = url.split('/')
            let arrPublickUrl = []
            arrUrl.forEach(elem =>{
                if (elem != 'master' && elem != 'resumeses') {
                    arrPublickUrl.push(elem)
                }
            })
            let urlShow = arrPublickUrl.join('/')
            this.slugPublic = urlShow
            this.loading = false
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    }
</script>
