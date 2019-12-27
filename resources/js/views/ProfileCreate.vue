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
                                                <div class="col-2 text-center">
                                                    <select name="country" id="country" v-model="form.usercountry">
                                                        <option value="a">A</option>
                                                        <option value="b">B</option>
                                                        <option value="c">C</option>
                                                    </select>
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="region">Region</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="region" id="region" v-model="form.userregion">
                                                        <option value="">A</option>
                                                        <option value="">B</option>
                                                        <option value="">C</option>
                                                    </select>
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="index">Index</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="index" id="index" name="index" value="" v-model="form.userindex">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="street">Street</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" id="street" name="street" value="" v-model="form.userstreet">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="house">House</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" id="house" name="house" value="" v-model="form.userhouse">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="apartment">Apartment</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input type="text" id="apartment" name="apartment" value="" v-model="form.userapartment">
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
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="skill">Skill</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="skill" name="skill" value="" v-model="form.userskill">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelSkill">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelSkill" id="levelSkill" v-model="form.userlevelSkill">
                                                        <option v-for="level in levels" :value="level.id">{{level.level}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="skill_add">
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
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="university">University:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="university" value="" v-model="form.useruniversity">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="professi">Professi:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="professi" value="" v-model="form.userprofessi">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="diplom_level">Diplom level:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="diplom_level" value="" v-model="form.userdiplom_level">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="start">Start:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="start" value="" v-model="form.userstart">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="finish">Finish:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="finish" value="" v-model="form.userfinish">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="education_add">
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
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-1 text-center">
                                                    <label for="work">Work:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="work" value="" v-model="form.userwork">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="position">Position:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="position" value="" v-model="form.userposition">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="professi">Professi:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="professi" value="" v-model="form.userprofessi">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="start_work">Start:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="start_work" value="" v-model="form.userstart_work">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="finish_work">Finish:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="finish_work" value="" v-model="form.userfinish_work">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-4 text-center">
                                                    <label for="funktion">Function:</label>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-10 text-center">
                                                    <vue-editor v-model="form.userfunktion"></vue-editor>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-4 text-center">
                                                    <label for="projects">Project:</label>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-10 text-center">
                                                    <vue-editor v-model="form.userprojects"></vue-editor>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="work_add">
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

                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-12 text-center">
                                                    <input type="text" name="hobbis" v-model="form.userhobbis">
                                                    <button type="" class="btn btn-primary" id="hobbi_add">
                                                        +ADD
                                                    </button>
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
            levels: {}
        },

        data() {
            return {
                form: {
                    name: '',
                    phone: '',
                    email: '',
                    usersites: '',
                    userdribbble: '',
                    userbehance: '',
                    usergit: '',
                    userlinkedin: '',
                    userskill: [],
                    userlevelSkill: [],
                    userfunktion: '',
                    userprojects: '',
                    userhobbis: []
                },

                /*levels: {
                    id: '',
                    level: ''
                }*/

                lenguageform: {
                    user_id: this.user.id,
                    lenguage: [],
                    level_id: []
                }
            };
        },

        computed: {
            disabledForm() {
                //return !this.form.name || !this.form.email ? true : false
                return true
            }
        },

        methods: {
            addLenguage: function (e) {
                e.preventDefault()

                var blockLanguage = document.querySelector('.language-add')
                var languageBody = document.querySelector('.language-body')
                var newBlockLanguage = blockLanguage.cloneNode(true)
                languageBody.insertAdjacentElement('beforeend', newBlockLanguage)
                //'language-add'
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

        created() {
            this.$set(this, 'form', this.user)

            this.$set(this, 'levels', this.levels)
            //this.$set(this, 'form.name', this.user.name)
            //console.log(this.user)
        }
    };
</script>
