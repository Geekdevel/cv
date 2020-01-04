<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile create</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input class="form-control" type="text" id="name" name="name" v-model="form.name">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input class="form-control" type="text" id="phone" name="phone" value="" v-model="form.phone">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input class="form-control" type="email" id="email" name="email" value="" v-model="form.email">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="web_site">Sites</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input class="form-control" type="text" id="web_site" name="web_site" value="" v-model="form.site">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Address -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Fill in the data at your address</div>
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="country">Country</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <select @change="changeCountry(addressform.country)" name="country" id="country" v-model="addressform.country">
                                                        <option v-for="country in countries" :value="country.id">{{country.name}}</option>
                                                    </select>
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="region">Region</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <select name="region" id="region" v-model="addressform.region">
                                                        <option v-for="region in regions" :value="region.id">{{region.name}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="index">Index</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" type="index" id="index" name="index" value="" v-model="form.userindex">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="street">Street</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input class="form-control" type="text" id="street" name="street" value="" v-model="form.userstreet">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="house">House</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input class="form-control" type="text" id="house" name="house" value="" v-model="form.userhouse">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="apartment">Apartment</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input class="form-control" type="text" id="apartment" name="apartment" value="" v-model="form.userapartment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Accaunts -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Your accaunts</div>
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="dribbble">Dribbble</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="dribbble" name="dribbble" value="" v-model="form.userdribbble">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="behance">Behance</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="behance" name="behance" value="" v-model="form.userbehance">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="git">Git</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="git" name="git" value="" v-model="form.usergit">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="linkedin">Linkedin</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="linkedin" name="linkedin" value="" v-model="form.userlinkedin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Languages -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">What languages do you speak?</div>
                                        <div class="card-body language-body">
                                            <div class="form-group row justify-content-center language-add">
                                                <div class="col-2 text-center">
                                                    <label for="language">Language</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="language" name="language" value="" v-model="lenguageform.lenguage">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelLanguage">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelLanguage" id="levelLanguage" v-model="lenguageform.level_id">
                                                        <option v-for="level in levels" :value="level.id">{{level.level}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="language_add" @click="addLenguage">
                                                    +ADD
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Skills -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Skills</div>
                                        <div class="card-body skill-body">
                                            <div class="form-group row justify-content-center skill-add">
                                                <div class="col-2 text-center">
                                                    <label for="skill">Skill</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="skill" name="skill" value="" v-model="skillform.skill">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelSkill">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelSkill" id="levelSkill" v-model="skillform.level_id">
                                                        <option v-for="level in levels" :value="level.id">{{level.level}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="skill_add" @click="addSkill">
                                                    +ADD
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Education -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Education</div>
                                        <div class="card-body education-body">
                                            <div class="education-add" style="border: 1px solid #ADC8D8; padding-top: 10px; margin-top: 10px;">
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-1 text-center">
                                                        <label for="university">University:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="university" value="" v-model="educationform.university">
                                                    </div>

                                                    <div class="col-1 text-center">
                                                        <label for="professi">Professi:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="professi" value="" v-model="educationform.professi">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="diplom_level">Diplom level:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="diplom_level" value="" v-model="educationform.level">
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-2 text-center">
                                                        <label for="start">Start:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="start" value="" v-model="educationform.start">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="finish">Finish:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="finish" value="" v-model="educationform.finish">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" @click="addEducation">
                                                    +ADD
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Works -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Experience works</div>
                                        <div class="card-body experience-body">
                                            <div class="experience-add" style="border: 1px solid #ADC8D8; padding-top: 10px; margin-top: 10px;">
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-1 text-center">
                                                        <label for="work">Work:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="work" value="" v-model="experienceform.work">
                                                    </div>

                                                    <div class="col-1 text-center">
                                                        <label for="position">Position:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="position" value="" v-model="experienceform.level">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="professi">Professi:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="professi" value="" v-model="experienceform.professi">
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-2 text-center">
                                                        <label for="start_work">Start:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="start_work" value="" v-model="experienceform.start">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="finish_work">Finish:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="finish_work" value="" v-model="experienceform.finish">
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-4 text-center">
                                                        <label for="funktion">Function:</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-10 text-center">
                                                        <vue-editor v-model="experienceform.funktion"></vue-editor>
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-4 text-center">
                                                        <label for="projects">Project:</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-10 text-center">
                                                        <vue-editor v-model="experienceform.projects"></vue-editor>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="work_add" @click="addExperience">
                                                    +ADD
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <!-- Hobbis -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Hobbis:</div>
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-12">
                                                <p>{{ hobbiform.hobbi }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-12 text-center">
                                                    <input type="text" name="hobbis" width="100%" v-model="hobbiform.hobbi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <button type="submit" :disabled="disabledForm">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
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
            user: {},
            levels: {},
            countries: {}
        },

        data() {
            return {
                form: {
                    name: '',
                    phone: '',
                    email: ''
                },

                lenguageform: {
                    user_id: this.user.id,
                    lenguage: [],
                    level_id: []
                },

                skillform: {
                    user_id: this.user.id,
                    skill: [],
                    level_id: []
                },

                educationform: {
                    user_id: this.user.id,
                    university: [],
                    professi: [],
                    start: [],
                    finish: [],
                    level: []
                },

                experienceform: {
                    user_id: this.user.id,
                    work: [],
                    level: [],
                    proffesi: [],
                    start: [],
                    finish: [],
                    function: [],
                    projects: []
                },

                hobbiform: {
                    user_id: this.user.id,
                    hobbi: ''
                },

                addressform: {
                    user_id: this.user.id,
                    country: '',
                    region: '',
                    city: '',
                    index: '',
                    street: '',
                    house: '',
                    apartment: ''
                },

                regions: {}
            };
        },

        computed: {
            disabledForm() {
                //return !this.form.name || !this.form.email ? true : false
                return false
            },
        },

        methods: {
            changeCountry: function (country) {
                axios.get('api/geo/children/' + country)
                    .then(response => {
                        //regions = response.data
                        //this.$set(addressform.region)
                        //console.log(country)
                        //regions.$set(this, response.data)
                        var regions = response.data
                        console.log(regions)

                        //return regions
                    })
                    .catch(error =>{
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    })
            },

            addLenguage: function (e) {
                e.preventDefault()

                var blockLanguage = document.querySelector('.language-add')
                var languageBody = document.querySelector('.language-body')
                var newBlockLanguage = blockLanguage.cloneNode(true)
                languageBody.insertAdjacentElement('beforeend', newBlockLanguage)
            },

            addSkill: function (e) {
                e.preventDefault()

                var blockSkill = document.querySelector('.skill-add')
                var skillBody = document.querySelector('.skill-body')
                var newBlockSkill = blockSkill.cloneNode(true)
                skillBody.insertAdjacentElement('beforeend', newBlockSkill)
            },

            addEducation: function (e) {
                e.preventDefault()

                var blockEducation = document.querySelector('.education-add')
                var educationBody = document.querySelector('.education-body')
                var newBlockEducation = blockEducation.cloneNode(true)
                educationBody.insertAdjacentElement('beforeend', newBlockEducation)
            },

            addExperience: function (e) {
                e.preventDefault()

                var blockExperience = document.querySelector('.experience-add')
                var experienceBody = document.querySelector('.experience-body')
                var newBlockExperience = blockExperience.cloneNode(true)
                experienceBody.insertAdjacentElement('beforeend', newBlockExperience)
            },

            checkForm: function (e) {
                console.log(this.form)

                axios.post('/register', this.form)
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                })
                // console.log(data);
                e.preventDefault()
            }
        },

        /*mounted() {
            this.countries.$set(
                axios.get('/api/geo/countries')
                    .then(response => {
                        response.data
                    })
                    .catch(error =>{
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    })
                )
        },*/

        created() {
            this.$set(this, 'form', this.user)

            this.$set(this, 'levels', this.levels)
        }
    };
</script>
