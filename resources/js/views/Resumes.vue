<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 error">
                {{errormessages.error}}
            </div>
        </div>
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
                                    <td><button type="button" class="btn btn-success" @click="resumeShow(item.slag)"><i class="far fa-eye"></i></button></td>
                                    <td><button type="button" class="btn btn-primary"><i class="fas fa-pen-nib"></i></button></td>
                                    <td><button type="button" class="btn btn-danger" @click="resumeDelete(item.id)"><i class="far fa-trash-alt"></i></button></td>
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

                resumes: [{
                    id: null,
                    slag: null,
                    job_title: null,
                    description: null
                }],
            }
        },

        methods: {
            resumeDelete(value) {
                // console.log('/resumes/' + value)
                axios.delete('/resumes/' + value)
                    .then(response =>{
                        // console.log(response.data)
                        this.$router.push('/master/resumeses')
                        // refreshTable
                    })
                    .catch(error => {
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                        this.errormessages = error.response.data
                    })
            },

            resumeShow(slug) {
                console.log(slug)
                // this.$ruoter.push('/master/showresume/:' + slug)
            },

            // refreshTable() {
            //     axios.get('/master/resumeses')
            //     .then(response =>{
            //         this.resumes = response.data
            //     })
            //     .catch(error => {
            //         console.log(error.response.data.message ? error.response.data.message : error.response.data)
            //         this.errormessages = error.response.data
            //     })
            // }
        },

        mounted() {
            axios.get('/resumes')
                .then(response =>{
                    // console.log(response.data)
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
