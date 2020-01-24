<template>
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <div class="profile-container">
                    <img class="profile" v-if="profileform.photo" :src="profileform.photo" alt="form.name"/>
                    <h1 class="name">{{ form.name }}</h1>
                    <h3 class="tagline">{{ resumeform.job_title }}</h3>
                    <input type="text" id="jobTitle" name="jobTitle" width="100%" v-model.trim="$v.resumeform.job_title.$model" placeholder="Job Title" @click="chekErrorMessages">
                    <div class="error" v-if="$v.resumeform.job_title.$error && !$v.resumeform.job_title.required">Must be completed!</div>
                    <div class="error" v-if="!$v.resumeform.job_title.minLength">Field must have at least {{ $v.resumeform.job_title.$params.minLength.min }} characters.</div>
                </div><!--//profile-container-->

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="email"><i class="fa fa-envelope"></i><a :href="`mailto:` + form.email">{{ form.email }}</a></li>
                        <li class="phone"><i class="fa fa-phone"></i><a :href="`tel:` + form.phone">{{ form.phone }}</a></li>
                        <li class="website" v-if="profileform.web_site"><i class="fa fa-globe"></i><a :href="profileform.web_site" target="_blank"> {{ profileform.web_site }}</a></li>
                        <li class="linkedin" v-if="profileform.linkedin"><i class="fab fa-linkedin"></i><a :href="profileform.linkedin" target="_blank"> {{ profileform.linkedin }}</a></li>
                        <li class="github" v-if="profileform.git"><i class="fab fa-github"></i><a :href="profileform.git" target="_blank"> {{ profileform.git }}</a></li>
                        <li class="dribbble" v-if="profileform.dribbble"><i class="fab fa-dribbble"></i><a :href="profileform.dribbble" target="_blank"> {{ profileform.dribbble }}</a></li>
                        <li class="behance" v-if="profileform.behance"><i class="fab fa-behance"></i><a :href="profileform.behance" target="_blank"> {{ profileform.behance }}</a></li>
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    <div class="item" v-for="education in educationform">
                        <h4 class="degree">{{ education.level }}</h4>
                        <h5 class="meta">{{ education.university }}</h5>
                        <div class="time">{{ education.start }} - {{ education.finish }}</div>
                    </div><!--//item-->
                </div><!--//education-container-->

                <div class="languages-container container-block">
                    <h2 class="container-block-title">Languages</h2>
                    <ul class="list-unstyled interests-list">
                        <li v-for="(lenguage, index) in lenguageform" :key="index">
                            {{ lenguage.lenguage }} <span class="lang-desc">( {{ lenguage.level.level }} )</span>
                        </li>
                    </ul>
                </div><!--//interests-->

                <div class="interests-container container-block">
                    <h2 class="container-block-title">Interests</h2>
                    <ul class="list-unstyled interests-list">
                        <li v-for="item in hobbiform">
                            {{ item.hobbi }}
                        </li>
                    </ul>
                </div><!--//interests-->

            </div><!--//sidebar-wrapper-->

            <div class="main-wrapper">
                    <div class="error">
                        {{errormessages.error}}
                    </div>

                <section class="section slag-section">
                    <div class="summary">
                        <label for="slag"><h5>Slug for your resume:</h5></label>
                        <h3>{{resumeform.slag}}</h3>
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section summary-section">
                    <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                    <div class="summary" :class="{ 'form-group--error': $v.resumeform.description.$error }">
                        <h5>Summarise your career here:</h5>
                        <vue-editor v-model.trim="$v.resumeform.description.$model" @click="chekErrorMessages"></vue-editor>
                        <div class="error" v-if="$v.resumeform.description.$error && !$v.resumeform.description.required">Must be completed!</div>
                        <div class="error" v-if="!$v.resumeform.description.minLength">Field must have at least {{ $v.resumeform.description.$params.minLength.min }} characters.</div>
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section experiences-section">
                    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

                    <div class="item" v-for="(itemExperience, indexExperience) in experienceform" :key="indexExperience">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title">{{ itemExperience.position }}</h3>
                                <div class="time">{{ itemExperience.start }} - {{ itemExperience.finish }}</div>
                            </div><!--//upper-row-->
                            <div class="company">{{ itemExperience.experience }}</div>
                        </div><!--//meta-->
                        <div class="details" v-html="itemExperience.functions">

                        </div><!--//details-->
                    </div><!--//item-->
                </section><!--//section-->

                <section class="section projects-section">
                    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                    <div class="intro" v-html="projectsform.description">
                    </div><!--//intro-->
                </section><!--//section-->

                <section class="skills-section section" v-if="skillform.length > 0">
                    <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                    <div class="skillset">
                        <div class="item" v-for="(itemSkill, indexSkill) in skillform" :key="indexSkill">
                            <h3 class="level-title">{{ itemSkill.skill }}</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" :data-level="thisProjectBar(itemSkill.level_id)+`%`">
                                </div>
                            </div><!--//level-bar-->
                        </div><!--//item-->
                    </div>
                </section><!--//skills-section-->

                <div class="error">
                    {{errormessages.error}}
                </div>

                <button class="button-save" type="button" @click="checkForm">
                    Save
                </button>

            </div><!--//main-body-->
        </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    import { required, minLength, between } from 'vuelidate/lib/validators';

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

                hobbiform: [{
                    hobbi: null
                }],

                experienceform: [{
                    experience: null,
                    position: null,
                    profession: null,
                    start: null,
                    finish: null,
                    functions: null
                }],

                skillform: [],

                projectsform: {
                    description: null
                },

                resumeform: {
                    id: null,
                    slag: null,
                    description: null,
                    job_title: null
                },

                errormessages: {
                    error: null
                }
            }
        },

        validations: {
            resumeform: {
                description: {
                    required,
                    minLength: minLength(10)
                },

                job_title: {
                    required,
                    minLength: minLength(2)
                },
            }
        },

        mounted() {
            axios.post('/resume/profile')
                .then(response =>{
                    this.profileform = response.data.profile
                    this.hobbiform = response.data.hobbi
                    this.experienceform = response.data.works
                    this.educationform = response.data.educations
                    this.lenguageform = response.data.lenguages
                    this.skillform = response.data.skills
                    this.projectsform = response.data.projects
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
            axios.post('/resume/' + this.$route.params.slag)
                .then(response => {
                    this.resumeform = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
        },

        methods: {
            chekErrorMessages() {
                return this.errormessages.error = null
            },

            thisProjectBar(value) {
                return value * 25
            },

            checkForm() {
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.errormessages.error = 'UUUPS!!!'
                }
                else {
                    let data = {
                        user: this.form,
                        resumeform: this.resumeform
                    }
                    axios.put('/resumes/' + this.$route.params.slag, data)
                        .then(() => {
                            this.$router.push('/master/resumeses')
                        })
                        .catch(error => {
                            console.log(error.response.data.message ? error.response.data.message : error.response.data)
                            this.errormessages = error.response.data
                        })
                }
            }
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    }
</script>
