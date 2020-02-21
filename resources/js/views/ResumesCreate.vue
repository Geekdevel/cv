<template>
     <div class="container-fluid h-100" v-if="loading">
        <div class="row justify-content-center align-items-center h-100">
            <pulse-loader v-if="loading" :color="color" :size="size" class="align-middle"></pulse-loader>
        </div>
    </div>

        <div class="wrapper" v-else>
            <div class="main-wrapper">
                <!-- left section -->
                    <div class="error">
                        <div v-if="errormessages.error">
                            <div v-if="errormessages.error.message">
                                {{errormessages.error.message}}
                            </div>
                            <div v-else>
                                {{errormessages.error}}
                            </div>
                            <div v-if="errormessages.error.errors">
                                <div v-for="(itemError, errors) in errormessages.error.errors" :key="errors">
                                    <div v-for="(item, error) in itemError" :key="error">
                                        {{item}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <section class="section slug-section">
                    <div class="summary" :class="{ 'form-group--error': $v.resumeform.slug.$error }">
                        <label for="slug"><h5>Slug for your resume:</h5></label>
                        <input type="text" id="slug" name="slug" v-model.trim="$v.resumeform.slug.$model" @click="chekErrorMessages">
                        <div class="error" v-if="$v.resumeform.slug.$error && !$v.resumeform.slug.required">Must be completed and unique!</div>
                        <div class="error" v-if="!$v.resumeform.slug.minLength">Field must have at least {{ $v.resumeform.slug.$params.minLength.min }} characters.</div>
                        <div class="error" v-if="!$v.resumeform.slug.alpha">The field can contain only large and small characters of the Latin alphabet, and numbers</div>
                    </div>
                </section>

                <section class="section summary-section">
                    <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                    <div class="summary" :class="{ 'form-group--error': $v.resumeform.description.$error }">
                        <h5>Summarise your career here:</h5>
                        <vue-editor :editor-toolbar="customToolbar" v-model.trim="$v.resumeform.description.$model" @click="chekErrorMessages"></vue-editor>
                        <div class="error" v-if="$v.resumeform.description.$error && !$v.resumeform.description.required">Must be completed!</div>
                        <div class="error" v-if="!$v.resumeform.description.minLength">Field must have at least {{ $v.resumeform.description.$params.minLength.min }} characters.</div>
                    </div>
                </section>

                <section class="section experiences-section">
                    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

                    <div class="item" v-for="(itemExperience, indexExperience) in experienceform" :key="indexExperience">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="company">{{ itemExperience.company }}</h3>
                                <div class="job-title">{{ itemExperience.position }}</div>
                            </div>
                            <div class="time">{{ itemExperience.start }} - <span v-if="itemExperience.finish">{{ itemExperience.finish }}</span><span v-if="!itemExperience.finish">By current time</span></div>
                        </div>
                        <div class="details" v-html="itemExperience.functions">

                        </div>
                    </div>
                </section>

                <section class="section projects-section" v-if="projectsform.description">
                    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                    <div class="intro" v-html="projectsform.description">
                    </div>
                </section>

                <section class="skills-section section" v-if="skillform.length > 0">
                    <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                    <div class="skillset">
                        <div class="item" v-for="(itemSkill, indexSkill) in skillform" :key="indexSkill">
                            <h3 class="level-title">{{ itemSkill.skill }}</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" :style="`width: `+itemSkill.level_id * 20+`%;`">
                                    <span>{{itemSkill.level_id * 20}}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="error">
                    <div v-if="errormessages.error">
                        <div v-if="errormessages.error.message">
                            {{errormessages.error.message}}
                        </div>
                        <div v-else>
                            {{errormessages.error}}
                        </div>
                        <div v-if="errormessages.error.errors">
                            <div v-for="(itemError, errors) in errormessages.error.errors" :key="errors">
                                <div v-for="(item, error) in itemError" :key="error">
                                    {{item}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="button-save" type="button" @click="checkForm">
                    Save
                </button>

            <!-- end left section -->
            </div>

            <div class="sidebar-wrapper">
                <!-- right section -->
                <div class="profile-container">
                    <img class="profile" v-if="profileform.photo" :src="profileform.photo" alt="form.name"/>
                    <h1 class="name">{{ form.name }}</h1>
                    <h3 class="tagline">{{ resumeform.job_title }}</h3>
                    <input type="text" id="jobTitle" name="jobTitle" width="100%" v-model.trim="$v.resumeform.job_title.$model" placeholder="Job Title" @click="chekErrorMessages">
                    <div class="error" v-if="$v.resumeform.job_title.$error && !$v.resumeform.job_title.required">Must be completed!</div>
                    <div class="error" v-if="!$v.resumeform.job_title.minLength">Field must have at least {{ $v.resumeform.job_title.$params.minLength.min }} characters.</div>
                </div>

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a :href="`mailto:` + form.email">{{ form.email }}</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <a :href="`tel:` + form.phone">{{ form.phone }}</a>
                        </li>
                        <li v-for="(item, index) in accounts" :key="index" v-if="profileform[item.key]">
                            <i :class="item.icon"></i>
                            <a :href="`http://` + profileform[item.key]" target="_blank">
                                {{ profileform[item.key] }}
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    <div class="item" v-for="(education, index) in educationform" :key="index">
                        <h5 class="meta">{{ education.university }}</h5>
                        <h5 class="meta-level-education">{{ education.degree }}</h5>
                        <h4 class="degree">{{ education.specialty }}</h4>
                        <div class="time">{{ education.start }} - <span v-if="education.finish">{{ education.finish }}</span><span v-if="!education.finish">By current time</span></div>
                    </div>
                </div>

                <div class="languages-container container-block">
                    <h2 class="container-block-title">Languages</h2>
                    <ul class="list-unstyled interests-list">
                        <li v-for="(lenguage, index) in lenguageform" :key="index">
                            {{ lenguage.lenguage }} <span class="lang-desc">( {{ lenguage.level.level }} )</span>
                        </li>
                    </ul>
                </div>

                <div class="interests-container container-block" v-if="hobbyform.length > 0">
                    <h2 class="container-block-title">Interests</h2>
                    <ul class="list-unstyled interests-list">
                        <li v-for="(item, index) in hobbyform" :key="index">
                            {{ item.hobby }}
                        </li>
                    </ul>
                </div>
            <!-- end right section -->
            </div>

        </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    import { required, minLength, between, helpers } from 'vuelidate/lib/validators';
    const alpha = helpers.regex('alpha', /^[0-9a-zA-Z]*$/);
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

                accounts: [
                    {
                        key: 'behance',
                        icon: 'fab fa-behance'
                    },
                    {
                        key: 'web_site',
                        icon: 'fa fa-globe'
                    },
                    {
                        key: 'dribbble',
                        icon: 'fab fa-dribbble'
                    },
                    {
                        key: 'git',
                        icon: 'fab fa-github'
                    },
                    {
                        key: 'linkedin',
                        icon: 'fab fa-linkedin'
                    },
                ],

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
                    slug: null
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
                    minLength: minLength(6),
                    alpha
                }
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
                            this.$router.push({name: 'resumes'})
                        })
                        .catch(error => {
                            this.errormessages = {error: error.response.data}
                        })
                }
            }
        },

        created() {
            axios.post('/profiles/user')
                .then(response =>{
                    if (response.data.user.profile == null) {
                        this.$router.push({name: 'profilecreate'})
                        return
                    }
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
                    // this.errormessages = error.response.data
                    this.errormessages = {error: error.response.data}
                })
        }
    }
</script>
