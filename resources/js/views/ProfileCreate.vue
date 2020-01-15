<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile create</div>

                    <div class="card-body">
                        <div>
                            <div class="form-group row justify-content-center">
                                <div class="col-6">
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
                                            <input class="form-control" type="text" id="web_site" name="web_site" v-model="profileform.web_site">
                                        </div>
                                    </div>
                                </div>

                                <!-- Vue-avatar-cropper -->
                                <div class="col-6">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <div class="row justify-content-center">
                                                <div class="col-12 text-center">
                                                    <img v-if="profileform.photo" :src="profileform.photo">
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-12 text-center">
                                                    <button id="pick-avatar" style="margin-top: 10px; border-radius: 5px;">Select an image</button>
                                                </div>
                                            </div>
                                            <avatar-cropper
                                              @uploaded="handleUploaded"
                                              trigger="#pick-avatar"
                                              :upload-url="'/api/custom/upload'"
                                              :labels="{ submit: 'OK', cancel: 'Cancel'}"
                                              :output-options="{width: 300, height: 300}"
                                            />
                                        </div>
                                    </div>
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
                                                    <v-select
                                                        :options="countries"
                                                        :reduce="name => name.id"
                                                        label="name"
                                                        v-model="addressform.country"
                                                        @input="changeCountry(addressform.country, true)"
                                                    >
                                                    </v-select>
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="region">Region</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <v-select
                                                        :options="regions"
                                                        :reduce="name => name.id"
                                                        label="name"
                                                        v-model="addressform.region"
                                                    />
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="city">City</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" type="text" id="city" name="city" v-model="addressform.city">
                                                </div>
                                           </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="index">Zip code</label>
                                                </div>
                                                <div class="col-3">
                                                    <input class="form-control" type="text" id="index" name="index" v-model="addressform.index">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="street">Street</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input class="form-control" type="text" id="street" name="street" v-model="addressform.street">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="house">House</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input class="form-control" type="text" id="house" name="house" v-model="addressform.house">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="apartment">Apartment</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input class="form-control" type="text" id="apartment" name="apartment" v-model="addressform.apartment">
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
                                                    <input type="text" id="dribbble" name="dribbble" v-model="profileform.dribbble">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="behance">Behance</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="behance" name="behance" v-model="profileform.behance">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="git">Git</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="git" name="git" v-model="profileform.git">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="linkedin">Linkedin</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="linkedin" name="linkedin" v-model="profileform.linkedin">
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
                                        <div class="card-body language-body py-2" v-for="(item, index) in lenguageform" :key="index">
                                            <div class="form-group row justify-content-center language-add">
                                                <div class="col-2 text-center">
                                                    <label for="language">Language</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" name="language" v-model="item.lenguage">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelLanguage">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelLanguage" v-model="item.level_id">
                                                        <option v-for="(level, indexLevel) in levels" :key="indexLevel" :value="level.id">{{ level.level }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <button type="button" class="btn btn-danger" @click="removeLenguage(index)" v-if="lenguageform.length > 1">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-primary" id="language_add" @click="addLenguage">
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
                                        <div class="card-body skill-body" v-for="(item, index) in skillform" :key="index">
                                            <div class="form-group row justify-content-center skill-add">
                                                <div class="col-2 text-center">
                                                    <label for="skill">Skill</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" name="skill" v-model="item.skill">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelSkill">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelSkill" v-model="item.level_id">
                                                        <option v-for="(level, indexLevel) in levels" :key="indexLevel" :value="level.id">{{ level.level }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <button type="button" class="btn btn-danger" @click="removeSkill(index)" v-if="skillform.length > 1">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-primary" id="skill_add" @click="addSkill">
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
                                        <div class="card-body education-body" v-for="(item, index) in educationform">
                                            <div class="education-add" style="border: 1px solid #ADC8D8; padding-top: 10px; margin-top: 10px;">
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-1 text-center">
                                                        <label for="university">University:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="university" v-model="item.university">
                                                    </div>

                                                    <div class="col-1 text-center">
                                                        <label for="professi">Professi:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="professi" v-model="item.professi">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="diplom_level">Diplom level:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="diplom_level" v-model="item.level">
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-2 text-center">
                                                        <label for="start">Start:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="start" v-model="item.start">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="finish">Finish:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="finish" v-model="item.finish">
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-2 text-center">
                                                        <button type="button" class="btn btn-danger" @click="removeEducation(index)" v-if="educationform.length > 1">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-primary" @click="addEducation">
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
                                        <div class="card-body experience-body" v-for="(item, index) in experienceform">
                                            <div class="experience-add" style="border: 1px solid #ADC8D8; padding-top: 10px; margin-top: 10px;">
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-1 text-center">
                                                        <label for="work">Work:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="experience" v-model="item.experience">
                                                    </div>

                                                    <div class="col-1 text-center">
                                                        <label for="position">Position:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="position" v-model="item.position">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="professi">Profession:</label>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <input type="text" name="profession" v-model="item.profession">
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-2 text-center">
                                                        <label for="start_work">Start:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="start_work" v-model="item.start">
                                                    </div>

                                                    <div class="col-2 text-center">
                                                        <label for="finish_work">Finish:</label>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <input type="date" name="finish_work" v-model="item.finish">
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-4 text-center">
                                                        <label for="functions">Functions & projects:</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-10 text-center">
                                                        <vue-editor v-model="item.functions"></vue-editor>
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-2 text-center">
                                                        <button type="button" class="btn btn-danger" @click="removeExperience(index)" v-if="experienceform.length > 1">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-primary" id="work_add" @click="addExperience">
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
                                        <div class="card-body hobbi-body" v-for="(item, indexHobbi) in hobbiform" :key="indexHobbi">
                                            <div class="form-group row justify-content-center hobbi-add">
                                                <div class="col-2 text-center">
                                                    <label for="hobbi">Hobbi</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" name="hobbi" v-model="item.hobbi">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <button type="button" class="btn btn-danger" @click="removeHobbi(indexHobbi)" v-if="hobbiform.length > 1">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-primary" id="hobbi_add" @click="addHobbi">
                                                    +ADD
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <button type="button" :disabled="disabledForm" @click="checkForm">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    import AvatarCropper from "vue-avatar-cropper";
    import vSelect from "vue-select";

    export default {
        components: {
            VueEditor,
            AvatarCropper,
            vSelect
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

                lenguageform: [{
                    lenguage: null,
                    level_id: null
                }],

                skillform: [{
                    skill: null,
                    level_id: null
                }],

                educationform: [{
                    university: null,
                    professi: null,
                    start: null,
                    finish: null,
                    level: null
                }],

                experienceform: [{
                    experience: null,
                    position: null,
                    profession: null,
                    start: null,
                    finish: null,
                    functions: null,
                }],

                hobbiform: [{
                    hobbi: null
                }],

                addressform: {
                    country: null,
                    region: null,
                    city: null,
                    index: null,
                    street: null,
                    house: null,
                    apartment: null
                },

                profileform: {
                    web_site: null,
                    photo: null,
                    dribbble: null,
                    behance: null,
                    git: null,
                    linkedin: null
                },

                regions: [],
                levels: [],
                countries: []

            };
        },

        computed: {
            disabledForm() {
                //return !this.form.name || !this.form.email ? true : false
                return false
            },
        },

        methods: {
            handleUploaded(resp) {
                this.profileform.photo = resp;
              },

            changeCountry(country, changed) {
                if(changed) {
                    this.addressform.region = null
                }

                axios.get('/api/geo/children/' + country)
                    .then(response => {
                        this.regions = response.data.sort((a,b) => a.name > b.name ? 1 : -1)
                    })
                    .catch(error =>{
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    })
            },

            removeHobbi(index) {
                this.hobbiform.splice(index, 1)
            },

            addHobbi() {
                this.hobbiform.push({
                    hobbi: null
                })
            },

            removeLenguage(index) {
                this.lenguageform.splice(index, 1)
            },

            addLenguage() {
                this.lenguageform.push({
                    lenguage: null,
                    level_id: null
                })
            },

            removeSkill(index) {
                this.skillform.splice(index, 1)
            },

            addSkill() {
                this.skillform.push({
                    skill: null,
                    level_id: null
                })
            },

            addEducation() {
                this.educationform.push({
                    university: null,
                    professi: null,
                    start: null,
                    finish: null,
                    level: null
                })
            },

            removeEducation(index) {
                this.educationform.splice(index, 1)
            },

            addExperience() {
                this.experienceform.push({
                    experience: null,
                    position: null,
                    profession: null,
                    start: null,
                    finish: null,
                    functions: null,
                })
            },

            removeExperience(index) {
                this.experienceform.splice(index, 1)
            },

            checkForm() {
                let data = {
                    user: this.form,
                    profileform: this.profileform,
                    lenguageform: this.lenguageform,
                    skillform: this.skillform,
                    educationform: this.educationform,
                    experienceform: this.experienceform,
                    hobbiform: this.hobbiform,
                    addressform: this.addressform
                }
                //axios.post('/createprofile', data)
                    // .then(response => {
                    //     console.log(response.data)
                    // })
                axios.post('/profiles', data)
                    .then(() => {
                        this.$router.push('/master')
                    })
                    .catch(error => {
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    })
            }
        },

        mounted() {
            axios.get('/api/geo/countries')
                .then(response => {
                    this.countries = response.data.sort((a,b) => a.name > b.name ? 1 : -1)
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                })
            axios.get('/levels/all')
                .then(response => {
                    this.levels = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                })
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    };
</script>
