<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List your resumes</div>

                    <div class="card-body">
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
                                    <td>{{ item.slag }}</td>
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
    export default {
        props: {
            user: {}
        },

        data() {
            return {
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
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    }
</script>
