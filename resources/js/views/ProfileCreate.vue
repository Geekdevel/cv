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
                                    <input type="text" id="name" name="name" value="" v-model="form.name">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input type="text" id="phone" name="phone" value="" v-model="form.phone">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input type="email" id="email" name="email" value="" v-model="form.email">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-2 text-center">
                                    <label for="web_site">Sites</label>
                                </div>
                                <div class="col-4 text-center">
                                    <input type="text" id="web_site" name="web_site" value="" v-model="form.sites">
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
                                                    <select name="country" id="country" v-model="form.country">
                                                        <option value="a">A</option>
                                                        <option value="b">B</option>
                                                        <option value="c">C</option>
                                                    </select>
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="region">Region</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="region" id="region" v-model="form.region">
                                                        <option value="">A</option>
                                                        <option value="">B</option>
                                                        <option value="">C</option>
                                                    </select>
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="index">Index</label>
                                                </div>
                                                <div class="col-3">
                                                    <input type="index" id="index" name="index" value="" v-model="form.index">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="street">Street</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" id="street" name="street" value="" v-model="form.street">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="house">House</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" id="house" name="house" value="" v-model="form.house">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="apartment">Apartment</label>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <input type="text" id="apartment" name="apartment" value="" v-model="form.apartment">
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
                                                    <input type="text" id="dribbble" name="dribbble" value="" v-model="form.dribbble">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="behance">Behance</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="behance" name="behance" value="" v-model="form.behance">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="git">Git</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="git" name="git" value="" v-model="form.git">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="linkedin">Linkedin</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="linkedin" name="linkedin" value="" v-model="form.linkedin">
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
                                        <div class="card-body">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="language">Language</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="text" id="language" name="language" value="" v-model="form.language">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelLanguage">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelLanguage" id="levelLanguage" v-model="form.levelLanguage">
                                                        <option value="">A</option>
                                                        <option value="">B</option>
                                                        <option value="">C</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="" class="btn btn-primary" id="language_add">
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
                                                    <input type="text" id="skill" name="skill" value="" v-model="form.skill">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="levelSkill">Level</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <select name="levelSkill" id="levelSkill" v-model="form.levelSkill">
                                                        <option value="">A</option>
                                                        <option value="">B</option>
                                                        <option value="">C</option>
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
                                                    <input type="text" name="university" value="" v-model="form.university">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="professi">Professi:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="professi" value="" v-model="form.professi">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="diplom_level">Diplom level:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="diplom_level" value="" v-model="form.diplom_level">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="start">Start:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="start" value="" v-model="form.start">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="finish">Finish:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="finish" value="" v-model="form.finish">
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
                                                    <input type="text" name="work" value="" v-model="form.work">
                                                </div>

                                                <div class="col-1 text-center">
                                                    <label for="position">Position:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="position" value="" v-model="form.position">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="professi">Professi:</label>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <input type="text" name="professi" value="" v-model="form.professi">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-2 text-center">
                                                    <label for="start_work">Start:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="start_work" value="" v-model="form.start_work">
                                                </div>

                                                <div class="col-2 text-center">
                                                    <label for="finish_work">Finish:</label>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <input type="date" name="finish_work" value="" v-model="form.finish_work">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-4 text-center">
                                                    <label for="funktion">Function:</label>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-10 text-center">
                                                    <vue-editor v-model="form.funktion"></vue-editor>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-4 text-center">
                                                    <label for="projects">Project:</label>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-10 text-center">
                                                    <vue-editor v-model="form.projects"></vue-editor>
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
                                                    <input type="text" name="hobbis" v-model="form.hobbis">
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

        props: {},

        data() {
            return {
                form: {
                    name: '',
                    phone: '',
                    email: '',
                    sites: '',
                    dribbble: '',
                    behance: '',
                    git: '',
                    linkedin: '',
                    language: [],
                    levelLanguage: [],
                    skill: [],
                    levelSkill: [],
                    funktion: '',
                    projects: '',
                    hobbis: []
                }
            };
        },

        computed: {
            disabledForm() {
                return !this.form.name || !this.form.email ? true : false
            }
        },

        methods: {
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
        }
    };
</script>
