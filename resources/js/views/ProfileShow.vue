<template>
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <div class="profile-container">
                    <img class="profile" v-if="profileform.photo" :src="profileform.photo" alt="form.name"/>
                    <h1 class="name">{{ form.name }}</h1>
                </div><!--//profile-container-->


                <div class="address-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="country"><i class="fas fa-globe"></i> {{ country.name }}</li>
                        <li class="region"><i class="fas fa-flag"></i> {{ region.name }}</li>
                        <li class="city"><i class="fas fa-city"></i> {{ addressform.city }} : {{ addressform.index }}</li>
                        <li class="street"><i class="fas fa-road"></i> {{ addressform.street }} <i class="fas fa-home"></i> {{ addressform.house }} <i class="fas fa-door-open"></i> {{ addressform.apartment }} </li>
                    </ul>
                </div><!--//contact-container-->

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="email"><i class="fa fa-envelope"></i><a :href="`mailto:` + form.email">{{ form.email }}</a></li>
                        <li class="phone"><i class="fa fa-phone"></i><a :href="`tel:` + form.phone">{{ form.phone }}</a></li>
                        <li class="website"><i class="fa fa-globe"></i><a :href="profileform.web_site" target="_blank"> {{ profileform.web_site }}</a></li>
                        <li class="linkedin"><i class="fab fa-linkedin"></i><a :href="profileform.linkedin" target="_blank"> {{ profileform.linkedin }}</a></li>
                        <li class="github"><i class="fab fa-github"></i><a :href="profileform.git" target="_blank"> {{ profileform.git }}</a></li>
                        <li class="dribbble"><i class="fab fa-dribbble"></i><a :href="profileform.dribbble" target="_blank"> {{ profileform.dribbble }}</a></li>
                        <li class="behance"><i class="fab fa-behance"></i><a :href="profileform.behance" target="_blank"> {{ profileform.behance }}</a></li>
                    </ul>
                </div><!--//contact-container-->

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

                <section class="section summary-section">
                    <h2 class="section-title"><i class="fa fa-user"></i>Education</h2>
                    <div class="item" v-for="education in educationform">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title">{{ education.level }}</h3>
                                <h3 class="job-title">{{ education.professi }}</h3>
                                <div class="time">{{ education.start }} - {{ education.finish }}</div>
                            </div><!--//upper-row-->
                            <div class="company">{{ education.university }}</div>
                        </div><!--//meta-->
                        <div class="details">

                        </div><!--//details-->
                    </div><!--//item-->
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

            </div><!--//main-body-->
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

                addressform: {
                    country: null,
                    region: null,
                    index: null,
                    street: null,
                    house: null,
                    apartment: null
                },

                skillform: [],

                projectsform: {
                    description: null
                },

                resumeform: {
                    description: null,
                    job_title: null,
                    slag: null
                },

                region: {},
                country: {}
            }
        },

        mounted() {
            axios.post('/profiles/user')
                .then(response =>{
                    this.addressform = response.data.address
                    this.profileform = response.data.profile
                    this.hobbiform = response.data.hobbi
                    this.experienceform = response.data.works
                    this.educationform = response.data.educations
                    this.lenguageform = response.data.lenguages
                    this.skillform = response.data.skills
                    this.projectsform = response.data.projects

                    axios.get('/api/geo/item/' + response.data.address.country)
                        .then(response => {
                            this.country = response.data
                        })
                        .catch(error => {
                            console.log(error.response.data.message ? error.response.data.message : error.response.data)
                        })

                    axios.get('/api/geo/item/' + response.data.address.region)
                        .then(response => {
                            this.region = response.data
                        })
                        .catch(error => {
                            console.log(error.response.data.message ? error.response.data.message : error.response.data)
                        })
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                })
        },

        methods: {
            thisProjectBar(value) {
                return value * 25
            }
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    }
</script>
