<template>
    <div class="container-fluid profile-create">
        <div class="row justify-content-center">
            <div class="col-md-12 error">
                {{errormessages.error}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="form-group row justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="form-group row justify-content-center">
                                <div class="col-4 text-center">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-8 text-center">
                                    <input class="form-control" type="text" id="name" name="name" v-model="form.name" @click="removeErrorName">
                                    <p class="errors" v-if="errors.name.length">This field must be filled</p>
                                </div>

                                <div class="col-4 text-center">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-8 text-center">
                                    <input class="form-control" type="text" id="phone" name="phone" value="" v-model="form.phone" @click="removeErrorPhone">
                                    <p class="errors" v-if="errors.phone.length">This field must be filled</p>
                                </div>

                                <div class="col-4 text-center">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-8 text-center">
                                    <input class="form-control" type="email" id="email" name="email" value="" v-model="form.email" @click="removeErrorEmail">
                                    <p class="errors" v-if="errors.email.length">This field must be filled</p>
                                </div>

                                <div class="col-4 text-center">
                                    <label for="web_site">Sites</label>
                                </div>
                                <div class="col-8 text-center">
                                    <input class="form-control" type="text" id="web_site" name="web_site" v-model="profileform.web_site">
                                </div>
                            </div>
                        </div>

                         <!-- Vue-avatar-cropper -->
                        <div class="col-12 col-md-6">
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <img v-if="profileform.photo" :src="profileform.photo" alt="Select an image">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-info text-light" id="pick-avatar" @click="removeErrorPhoto">Select an image</button>
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
                            <div class="form-group row justify-content-center">
                                <div class="col-12">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="country">Country</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <v-select
                                                :options="countries"
                                                :reduce="name => name.id"
                                                label="name"
                                                v-model="addressform.country"
                                                @input="changeCountry(addressform.country, true)"
                                            >
                                            </v-select>
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="region">Region</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <v-select
                                                :options="regions"
                                                :reduce="name => name.id"
                                                label="name"
                                                v-model="addressform.region"
                                                @input="removeErrorRegion"
                                            />
                                        </div>
                                    </div>
                                    <p class="errors text-center" v-if="errors.country.length || errors.regions.length">This field must be filled</p>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <input class="form-control" type="text" id="city" name="city" v-model="addressform.city" @click="removeErrorCity">
                                            <p class="errors" v-if="errors.city.length">This field must be filled</p>
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="index">Zip code</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                             <input class="form-control" type="text" id="index" name="index" v-model="addressform.index" @click="removeErrorIndex">
                                             <p class="errors" v-if="errors.index.length">This field must be filled</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="street">Street</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <input class="form-control" type="text" id="street" name="street" v-model="addressform.street" @click="removeErrorStreet">
                                            <p class="errors" v-if="errors.street.length">This field must be filled</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Accaunts -->
                        <div class="col-md-12">
                            <div class="form-group row justify-content-center">
                                <div class="col-12">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="dribbble">Dribbble</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <input class="form-control" type="text" id="dribbble" name="dribbble" v-model="profileform.dribbble">
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="behance">Behance</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <input class="form-control" type="text" id="behance" name="behance" v-model="profileform.behance">
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="git">Git</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <input class="form-control" type="text" id="git" name="git" v-model="profileform.git">
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="linkedin">Linkedin</label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center">
                                            <input class="form-control" type="text" id="linkedin" name="linkedin" v-model="profileform.linkedin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Languages -->
                        <div class="col-md-12">
                            <div class="form-group row justify-content-center language-add" v-for="(item, index) in lenguageform" :key="index">
                                <div class="col-12 col-md-2 text-center">
                                    <label for="language">Language</label>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <input class="form-control" type="text" name="language" v-model="item.lenguage" @click="removeErrorLanguage">
                                </div>

                                <div class="col-12 col-md-2 text-center">
                                    <label for="levelLanguage">Level</label>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <v-select
                                        :options="levels"
                                        :reduce="level => level.id"
                                        label="level"
                                        v-model="item.level_id"
                                        @input="removeErrorLanguage"
                                    />
                                </div>
                                <div class="col-12 col-md-2 text-center">
                                    <button type="button" class="btn btn-danger" @click="removeLenguage(index)" v-if="lenguageform.length > 1">Remove</button>
                                </div>
                                <p class="errors" v-if="item.error">This field must be filled</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary" id="language_add" @click="addLenguage">
                                    +ADD Language
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Skills -->
                        <div class="col-md-12">
                            <div class="form-group row justify-content-center skill-add" v-for="(item, index) in skillform" :key="index">
                                <div class="col-12 col-md-2 text-center">
                                    <label for="skill">Skill</label>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <input class="form-control" type="text" name="skill" v-model="item.skill" @click="removeErrorSkill">
                                </div>

                                <div class="col-12 col-md-2 text-center">
                                    <label for="levelSkill">Level</label>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <v-select
                                        :options="levels"
                                        :reduce="level => level.id"
                                        label="level"
                                        v-model="item.level_id"
                                        @input="removeErrorSkill"
                                    />
                                </div>
                                <div class="col-12 col-md-2 text-center">
                                    <button type="button" class="btn btn-danger" @click="removeSkill(index)" v-if="skillform.length > 1">Remove</button>
                                </div>
                                <p class="errors" v-if="item.error">This field must be filled</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary" id="skill_add" @click="addSkill">
                                    +ADD Skill
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Education -->
                        <div class="col-12">
                            <div class="education-add form-group row justify-content-center" v-for="(item, index) in educationform">
                                <div class="col-12 col-md-6 text-center">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 text-center">
                                            <label for="university">University:</label>
                                        </div>
                                        <div class="col-8 text-center">
                                            <input class="form-control" type="text" name="university" v-model="item.university" @click="removeErrorEducation">
                                        </div>

                                        <div class="col-4 text-center">
                                            <label for="professi">Professi:</label>
                                        </div>
                                        <div class="col-8 text-center">
                                            <input class="form-control" type="text" name="professi" v-model="item.professi" @click="removeErrorEducation">
                                        </div>

                                        <div class="col-4 text-center">
                                            <label for="diplom_level">Diplom level:</label>
                                        </div>
                                        <div class="col-8 text-center">
                                            <input class="form-control" type="text" name="diplom_level" v-model="item.level" @click="removeErrorEducation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 text-center">
                                            <label for="start">Start:</label>
                                        </div>
                                        <div class="col-8 text-center">
                                            <input class="form-control date" type="date" name="start" v-model="item.start" @click="removeErrorEducation">
                                        </div>

                                        <div class="col-4 text-center">
                                            <label for="finish">Finish:</label>
                                        </div>
                                        <div class="col-8 text-center">
                                            <input class="form-control date" type="date" name="finish" v-model="item.finish" @click="removeErrorEducation">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-2 text-center">
                                        <button type="button" class="btn btn-danger" @click="removeEducation(index)" v-if="educationform.length > 1">Remove</button>
                                    </div>
                                </div>
                                <p class="errors" v-if="item.error">This field must be filled</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary" @click="addEducation">
                                    +ADD Education
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Works -->
                        <div class="col-12">
                            <div class="experience-add" v-for="(item, index) in experienceform">
                                <div class="form-group row justify-content-center">
                                    <div class="col-12 col-md-6 text-center">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-4 text-center">
                                                <label for="work">Work:</label>
                                            </div>
                                            <div class="col-8 text-center">
                                                <input class="form-control" type="text" name="experience" v-model="item.experience" @click="removeErrorExperience">
                                            </div>

                                            <div class="col-4 text-center">
                                                <label for="position">Position:</label>
                                            </div>
                                            <div class="col-8 text-center">
                                                <input class="form-control" type="text" name="position" v-model="item.position" @click="removeErrorExperience">
                                            </div>

                                            <div class="col-4 text-center">
                                                <label for="professi">Profession:</label>
                                            </div>
                                            <div class="col-8 text-center">
                                                <input class="form-control" type="text" name="profession" v-model="item.profession" @click="removeErrorExperience">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-4 text-center">
                                                <label for="start_work">Start:</label>
                                            </div>
                                            <div class="col-8 text-center">
                                                <input class="form-control date" type="date" name="start_work" v-model="item.start" @click="removeErrorExperience">
                                            </div>

                                            <div class="col-4 text-center">
                                                <label for="finish_work">Finish:</label>
                                            </div>
                                            <div class="col-8 text-center">
                                                <input class="form-control date" type="date" name="finish_work" v-model="item.finish" @click="removeErrorExperience">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-12 text-center">
                                        <vue-editor v-model="item.functions" placeholder="Functions" @click="removeErrorExperience"></vue-editor>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-2 text-center">
                                        <button type="button" class="btn btn-danger" @click="removeExperience(index)" v-if="experienceform.length > 1">Remove</button>
                                    </div>
                                </div>
                                <p class="errors" v-if="item.error">This field must be filled</p>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary" id="work_add" @click="addExperience">
                                    +ADD Experience
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Projects -->
                        <div class="col-md-12">
                            <vue-editor v-model="projectsform.description" placeholder="Projects in which you participated"></vue-editor>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Hobbis -->
                        <div class="col-md-12">
                            <div class="hobbi-body" v-for="(item, indexHobbi) in hobbiform" :key="indexHobbi">
                                <div class="form-group row justify-content-center hobbi-add">
                                    <div class="col-12 col-md-2 text-center">
                                        <label for="hobbi">Hobbi</label>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <input class="form-control" type="text" name="hobbi" v-model="item.hobbi" @click="removeErrorHobbi">
                                    </div>

                                    <div class="col-12 col-md-2 text-center">
                                        <button type="button" class="btn btn-danger" @click="removeHobbi(indexHobbi)" v-if="hobbiform.length > 1">Remove</button>
                                    </div>
                                </div>
                                <p class="errors" v-if="item.error">This field must be filled</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary" id="hobbi_add" @click="addHobbi">
                                        +ADD Hobbi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12 error">
                            {{errormessages.error}}
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-success" :disabled="disabledForm" @click="checkForm">
                                Register
                            </button>
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
                errors: {
                    name: [],
                    phone: [],
                    email: [],
                    country: [],
                    regions: [],
                    index: [],
                    city: [],
                    street: []
                },

                form: {
                    id: this.user.id,
                    name: null,
                    phone: null,
                    email: null
                },

                lenguageform: [{
                    lenguage: null,
                    level_id: null,
                    error: null
                }],

                skillform: [{
                    skill: null,
                    level_id: null,
                    error: null
                }],

                educationform: [{
                    university: null,
                    professi: null,
                    start: null,
                    finish: null,
                    level: null,
                    error: null
                }],

                experienceform: [{
                    experience: null,
                    position: null,
                    profession: null,
                    start: null,
                    finish: null,
                    functions: null,
                    error: null
                }],

                hobbiform: [{
                    hobbi: null,
                    error: null
                }],

                addressform: {
                    country: null,
                    region: null,
                    city: null,
                    index: null,
                    street: null
                },

                profileform: {
                    web_site: null,
                    photo: null,
                    dribbble: null,
                    behance: null,
                    git: null,
                    linkedin: null
                },

                projectsform: {
                    description: null
                },

                errormessages: {
                    error: null
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
            removeErrorPhoto() {
                this.errormessages.error = null
            },

            removeErrorName() {
                this.errors.name = []
                this.errormessages.error = null
            },

            removeErrorPhone() {
                this.errors.phone = []
                this.errormessages.error = null
            },

            removeErrorEmail() {
                this.errors.email = []
                this.errormessages.error = null
            },

            removeErrorRegion() {
                this.errors.country = []
                this.errors.regions = []
                this.errormessages.error = null
            },

            removeErrorStreet() {
                this.errors.street = []
                this.errormessages.error = null
            },

            removeErrorCity() {
                this.errors.city = []
                this.errormessages.error = null
            },

            removeErrorIndex() {
                this.errors.index = []
                this.errormessages.error = null
            },

            removeErrorLanguage() {
                this.lenguageform.forEach((element) => {
                    element.error = null
                })
                this.errormessages.error = null
            },

            removeErrorSkill() {
                this.skillform.forEach((element) => {
                    element.error = null
                })
                this.errormessages.error = null
            },

            removeErrorEducation() {
                this.educationform.forEach((element) => {
                    element.error = null
                })
                this.errormessages.error = null
            },

            removeErrorExperience() {
                this.experienceform.forEach((element) => {
                    element.error = null
                })
                this.errormessages.error = null
            },

            removeErrorHobbi() {
                this.hobbiform.forEach((element) => {
                    element.error = null
                })
                this.errormessages.error = null
            },

            handleUploaded(resp) {
                this.profileform.photo = resp;
              },

            changeCountry(country, changed) {
                if(changed) {
                    this.addressform.region = null
                }

                axios.get('/api/geo/children/' + country + '?fields=id,name')
                    .then(response => {
                        this.regions = response.data.sort((a,b) => a.name > b.name ? 1 : -1)
                    })
                    .catch(error =>{
                        console.log(error.response.data.message ? error.response.data.message : error.response.data)
                        this.errormessages = error.response.data
                    })
            },

            removeHobbi(index) {
                this.hobbiform.splice(index, 1)
            },

            addHobbi() {
                this.hobbiform.push({
                    hobbi: null,
                    error: null
                })
            },

            removeLenguage(index) {
                this.lenguageform.splice(index, 1)
            },

            addLenguage() {
                this.lenguageform.push({
                    lenguage: null,
                    level_id: null,
                    error: null
                })
            },

            removeSkill(index) {
                this.skillform.splice(index, 1)
            },

            addSkill() {
                this.skillform.push({
                    skill: null,
                    level_id: null,
                    error: null
                })
            },

            addEducation() {
                this.educationform.push({
                    university: null,
                    professi: null,
                    start: null,
                    finish: null,
                    level: null,
                    error: null
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
                    error: null
                })
            },

            removeExperience(index) {
                this.experienceform.splice(index, 1)
            },

            checkForm() {
                if (!this.form.name || this.form.name == "") {
                    this.errors.name.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.form.phone || this.form.phone == "") {
                    this.errors.phone.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.form.email || this.form.email == "") {
                    this.errors.email.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.addressform.country || this.addressform.country == "") {
                    this.errors.country.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.addressform.region || this.addressform.region == "") {
                    this.errors.regions.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.addressform.city || this.addressform.city == "") {
                    this.errors.city.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.addressform.index || this.addressform.index == "") {
                    this.errors.index.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (!this.addressform.street || this.addressform.street == "") {
                    this.errors.street.push(1)
                    this.errormessages.error = 'The form contains errors! Fix them first.'
                }
                else if (this.lenguageform.length > 0) {
                    this.lenguageform.forEach((element) => {
                        if (!element.lenguage || element.lenguage == null || !element.level_id || element.level_id == null) {
                            element.error += 1
                            this.errormessages.error = 'The form contains errors! Fix them first.'
                        }
                    })

                    if (this.skillform.length > 0) {
                        this.skillform.forEach((element) => {
                            if (!element.skill || element.skill == null || !element.level_id || element.level_id == null) {
                                element.error += 1
                                this.errormessages.error = 'The form contains errors! Fix them first.'
                            }
                        })

                        if (this.educationform.length > 0) {
                            this.educationform.forEach((element) => {
                                if (!element.university || element.university == null || !element.professi || element.professi == null || !element.start || element.start == null || !element.finish || element.finish == null || !element.level || element.level == null) {
                                    element.error += 1
                                    this.errormessages.error = 'The form contains errors! Fix them first.'
                                }
                            })

                            if (this.experienceform.length > 0) {
                                this.experienceform.forEach((element) => {
                                if (!element.experience || element.experience == null || !element.position || element.position == null || !element.profession || element.profession == null || !element.functions || element.functions == null || !element.start || element.start == null || !element.finish || element.finish == null) {
                                        element.error += 1
                                        this.errormessages.error = 'The form contains errors! Fix them first.'
                                    }
                                })

                                if (this.hobbiform.length > 0) {
                                    this.hobbiform.forEach((element) => {
                                        if (!element.hobbi || element.hobbi == null) {
                                            element.error += 1
                                            this.errormessages.error = 'The form contains errors! Fix them first.'
                                        }
                                    })

                                    if (!this.errormessages.error) {
                                        let data = {
                                            user: this.form,
                                            profileform: this.profileform,
                                            lenguageform: this.lenguageform,
                                            skillform: this.skillform,
                                            educationform: this.educationform,
                                            experienceform: this.experienceform,
                                            hobbiform: this.hobbiform,
                                            addressform: this.addressform,
                                            projectsform: this.projectsform
                                        }
                                        axios.post('/profiles', data)
                                            .then(() => {
                                                this.$router.push('/master/resumeses')
                                            })
                                            .catch(error => {
                                                console.log(error.response.data.message ? error.response.data.message : error.response.data)
                                                this.errormessages = error.response.data
                                            })
                                    }
                                    else {
                                        this.errormessages.error = 'UUUUPS! ERRORS!'
                                    }


                                }
                                else {
                                    this.errormessages.error = 'The form contains errors! Indicate at least one of your hobbies.'
                                }
                            }
                            else {
                                this.errormessages.error = 'The form contains errors! If you do not have experience directly indicate this by filling out the appropriate form fields.'
                            }
                        }
                        else {
                            this.errormessages.error = 'The form contains errors! Have you studied somewhere?'
                        }
                    }
                    else {
                        this.errormessages.error = 'The form contains errors! Do not you have any skills at all?'
                    }
                }
                else {
                        this.errormessages.error = 'The form contains errors! Are you talking?'
                }
            }
        },

        mounted() {
            axios.get('/api/geo/countries?fields=id,name')
                .then(response => {
                    this.countries = response.data.sort((a,b) => a.name > b.name ? 1 : -1)
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
            axios.get('/levels/all')
                .then(response => {
                    this.levels = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
        },

        created() {
            this.$set(this, 'form', this.user)
        }
    };
</script>
