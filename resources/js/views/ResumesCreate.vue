<template>
     <div class="container-fluid h-100" v-if="loading">
        <div class="row justify-content-center align-items-center h-100">
            <pulse-loader v-if="loading" :color="color" :size="size" class="align-middle"></pulse-loader>
        </div>
    </div>

        <div class="wrapper" v-else-if="!loading">
        <!-- <div class="wrapper"> -->


            <div class="main-wrapper">
                    <div class="error">
                        {{errormessages.error}}
                    </div>

                <section class="section slug-section">
                    <div class="summary" :class="{ 'form-group--error': $v.resumeform.slug.$error }">
                        <label for="slug"><h5>Slug for your resume:</h5></label>
                        <input type="text" id="slug" name="slug" v-model.trim="$v.resumeform.slug.$model" @click="chekErrorMessages">
                        <div class="error" v-if="$v.resumeform.slug.$error && !$v.resumeform.slug.required">Must be completed and unique!</div>
                        <div class="error" v-if="!$v.resumeform.slug.minLength">Field must have at least {{ $v.resumeform.slug.$params.minLength.min }} characters.</div>
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section summary-section">
                    <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                    <div class="summary" :class="{ 'form-group--error': $v.resumeform.description.$error }">
                        <h5>Summarise your career here:</h5>
                        <vue-editor :editor-toolbar="customToolbar" v-model.trim="$v.resumeform.description.$model" @click="chekErrorMessages"></vue-editor>
                        <div class="error" v-if="$v.resumeform.description.$error && !$v.resumeform.description.required">Must be completed!</div>
                        <div class="error" v-if="!$v.resumeform.description.minLength">Field must have at least {{ $v.resumeform.description.$params.minLength.min }} characters.</div>
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section experiences-section">
                    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

                    <div class="item" v-for="(itemExperience, indexExperience) in experienceform" :key="indexExperience">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="company">{{ itemExperience.company }}</h3>
                                <div class="job-title">{{ itemExperience.position }}</div>
                            </div>
                            <div class="time">{{ itemExperience.start }} - <span v-if="itemExperience.finish">{{ itemExperience.finish }}</span><span v-if="!itemExperience.finish">By current time</span></div>
                        </div><!--//meta-->
                        <div class="details" v-html="itemExperience.functions">

                        </div><!--//details-->
                    </div><!--//item-->
                </section><!--//section-->

                <section class="section projects-section" v-if="projectsform.description">
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
                                <div class="level-bar-inner" :style="`width: `+itemSkill.level_id * 20+`%;`">
                                    <span>{{itemSkill.level_id * 20}}%</span>
                                </div>
                            </div><!--//level-bar-->
                        </div><!--//item-->
                    </div>
                </section><!--//skills-section-->

                <div class="error">
                    {{errormessages.error}}
                </div>

                <button class="button-save" type="button" :disabled="disabledForm" @click="checkForm">
                    Save
                </button>

            </div><!--//main-body-->

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
                        <li class="website" v-if="profileform.web_site"><i class="fa fa-globe"></i><a :href="`http://` + profileform.web_site" target="_blank"> {{ profileform.web_site }}</a></li>
                        <li class="linkedin" v-if="profileform.linkedin"><i class="fab fa-linkedin"></i><a :href="`http://` + profileform.linkedin" target="_blank"> {{ profileform.linkedin }}</a></li>
                        <li class="github" v-if="profileform.git"><i class="fab fa-github"></i><a :href="`http://` + profileform.git" target="_blank"> {{ profileform.git }}</a></li>
                        <li class="dribbble" v-if="profileform.dribbble"><i class="fab fa-dribbble"></i><a :href="`http://` + profileform.dribbble" target="_blank"> {{ profileform.dribbble }}</a></li>
                        <li class="behance" v-if="profileform.behance"><i class="fab fa-behance"></i><a :href="`http://` + profileform.behance" target="_blank"> {{ profileform.behance }}</a></li>
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    <div class="item" v-for="education in educationform">
                        <h5 class="meta">{{ education.university }}</h5>
                        <h5 class="meta-level-education">{{ education.degree }}</h5>
                        <h4 class="degree">{{ education.specialty }}</h4>
                        <div class="time">{{ education.start }} - <span v-if="education.finish">{{ education.finish }}</span><span v-if="!education.finish">By current time</span></div>
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

                <div class="interests-container container-block" v-if="hobbyform[0].hobby">
                    <h2 class="container-block-title">Interests</h2>
                    <ul class="list-unstyled interests-list">
                        <li v-for="item in hobbyform">
                            {{ item.hobby }}
                        </li>
                    </ul>
                </div><!--//interests-->

            </div><!--//sidebar-wrapper-->

        </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    import { required, minLength, between } from 'vuelidate/lib/validators';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

    export default {
        components: {
            VueEditor,
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

                customToolbar: [
                  ["bold", "italic", "underline"],
                  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                  [{ 'align': ''}, { 'align': 'center'}, { 'align': 'justify'}, { 'align': 'right' }]
                ],

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
                    specialty: null,
                    start: null,
                    finish: null,
                    degree: null
                }],

                lenguageform: [{
                    lenguage: null,
                    level_id: null,
                    level: {}
                }],

                hobbyform: [{
                    hobby: null
                }],

                experienceform: [{
                    company: null,
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
                    description: null,
                    job_title: null,
                    slag: null
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

                slug: {
                    required,
                    minLength: minLength(6)
                }
            }
        },

        mounted() {
            axios.post('/profiles/user')
                .then(response =>{
                    this.profileform = response.data.profile
                    this.hobbyform = response.data.hobby
                    this.experienceform = response.data.experience
                    this.educationform = response.data.education
                    this.lenguageform = response.data.lenguages
                    this.skillform = response.data.skills
                    this.projectsform = response.data.projects
                    this.form = response.data.user

                    this.loading = false
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
        },

        computed: {
            disabledForm() {
                return false
            }

        },

        methods: {
            chekErrorMessages() {
                return this.errormessages.error = null
            },

            checkForm() {
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.errormessages.error = 'UUUPS!!!'
                }
                else {
                    let data = this.resumeform
                    axios.post('/resumes', data)
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
            // this.$set(this, 'form', this.user)
            // if (this.user.profile == null) {
            //     this.$router.push('/master/profilecreate')
            // }
            axios.post('/profiles/user')
                .then(response =>{
                    if (response.data.user.profile == null) {
                        this.$router.push('/master/profilecreate')
                    }
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
        }
    }
</script>
