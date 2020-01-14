<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8" style="border: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <h2>
                            <i class="fa fa-user"></i>
                            Career Profile
                        </h2>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row">

                </div>
                <div class="row">

                </div>
            </div>
            <div class="col-4" style="border: 1px solid black">
                <div class="row justify-content-center">
                    <div class="col-11 text-center">
                        <img v-if="profileform.photo" :src="profileform.photo">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        <h1>{{ form.name }}</h1>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h3>{{ formJobTitle.jobTitle }}</h3>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-4 text-center">
                        <label for="jobTitle">Job Title:</label>
                    </div>
                    <div class="col-8 text-center">
                        <input type="text" id="jobTitle" name="jobTitle" width="100%" v-model="formJobTitle.jobTitle">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item email"><i class="fa fa-envelope"></i> {{ form.email }}</li>
                            <li class="list-group-item phone"><i class="fa fa-phone"></i> {{ form.phone }}</li>
                            <li class="list-group-item website"><i class="fa fa-globe"></i><a href="profileform.web_site" target="_blank"> {{ profileform.web_site }}</a></li>
                            <li class="list-group-item linkedin"><i class="fab fa-linkedin"></i><a href="profileform.linkedin" target="_blank"> {{ profileform.linkedin }}</a></li>
                            <li class="list-group-item github"><i class="fab fa-github"></i><a href="profileform.git" target="_blank"> {{ profileform.git }}</a></li>
                            <li class="list-group-item dribbble"><i class="fab fa-dribbble"></i><a href="profileform.dribbble" target="_blank"> {{ profileform.dribbble }}</a></li>
                            <li class="list-group-item behance"><i class="fab fa-behance"></i><a href="profileform.behance" target="_blank"> {{ profileform.behance }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3>EDUCATION</h3>
                    </div>
                </div>

                <div class="row" v-for="education in educationform">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12"><strong>{{ education.university }}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-12">{{ education.proffesi }}</div>
                        </div>
                        <div class="row">
                            <div class="col-12">{{ education.start }} - {{ education.finish }}</div>
                        </div>
                        <div class="row">
                            <div class="col-12">{{ education.level }}</div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3>LANGUAGES</h3>
                    </div>
                </div>

                <div class="row" v-for="(lenguage, index) in lenguageform" :key="index">
                    <div class="col-12">
                        <div class="col-12">{{ lenguage.lenguage }} ( {{ lenguage.level.level }} )</div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3>INTERESTS</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";

    export default {
        components: {
            VueEditor
          },

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

                formJobTitle: {
                    jobTitle: null
                },

                profileform: {
                    webSite: null,
                    linkedin: null,
                    git: null,
                    dribbble: null,
                    behance: null
                },

                educationform: [{
                    university: null,
                    professi: null,
                    start: null,
                    finish: null,
                    level: null
                }],

                lenguageform: [{
                    lenguage: null,
                    level_id: null,
                    level: {}
                }],
            }
        },

        mounted() {
            axios.post('/resume/profile')
                .then(response =>{
                    this.profileform = response.data.profile
                    this.addressform = response.data.address
                    this.hobbiform = response.data.hobbi
                    this.experienceform = response.data.works
                    this.educationform = response.data.educations
                    this.lenguageform = response.data.lenguages
                    this.skillform = response.data.skills
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                })
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    }
</script>
