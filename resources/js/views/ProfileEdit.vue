<template>
    <div class="container-fluid" v-if="loading">
        <div class="row justify-content-center align-items-center">
            <pulse-loader v-if="loading" :color="color" :size="size"></pulse-loader>
        </div>
    </div>

    <div class="container-fluid profile-create" v-else-if="!loading">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="form-group row justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="form-group row justify-content-center">
                                <div class="col-4 text-center">
                                    <label for="name">Name <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-8 text-center" :class="{ 'form-group--error': $v.form.name.$error }">
                                    <input class="form-control" type="text" id="name" name="name" v-model.trim="$v.form.name.$model">
                                    <div class="error" v-if="$v.form.name.$error && !$v.form.name.required">Field is required.</div>
                                    <div class="error" v-if="!$v.form.name.minLength">Field must have at least {{ $v.form.name.$params.minLength.min }} characters.</div>
                                </div>

                                <div class="col-4 text-center">
                                    <label for="phone">Phone <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-8 text-center" :class="{ 'form-group--error': $v.form.phone.$error }">
                                    <vue-tel-input id="phone" class="form-control" name="phone" v-model.trim="$v.form.phone.$model" v-bind="bindProps"></vue-tel-input>
                                    <div class="error" v-if="$v.form.phone.$error && !$v.form.phone.required">Field is required.</div>
                                    <div class="error" v-if="!$v.form.phone.minLength">Field must have at least {{ $v.form.phone.$params.minLength.min }} characters.</div>
                                </div>

                                <div class="col-4 text-center">
                                    <label for="email">Email <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-8 text-center" :class="{ 'form-group--error': $v.form.email.$error }">
                                    <input class="form-control" type="email" id="email" name="email" v-model.trim="$v.form.email.$model">
                                    <div class="error" v-if="$v.form.email.$error && !$v.form.email.required">Field is required.</div>
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
                                            <span class="be-sure-to-fill-out">*</span>
                                            <button type="button" class="btn btn-info text-light" id="pick-avatar">Select an image</button>
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
                                <div class="col-12 text-center">
                                    <h4>Your address</h4>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-12">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="country">Country <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center" :class="{ 'form-group--error': $v.addressform.country.$error }">
                                            <v-select
                                                :options="countries"
                                                :reduce="name => name.id"
                                                label="name"
                                                v-model.trim="$v.addressform.country.$model"
                                                @input="changeCountry(addressform.country, true)"
                                            >
                                            </v-select>
                                            <div class="error" v-if="$v.addressform.country.$error && !$v.addressform.country.required">Field is required.</div>
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="region">Region <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center" :class="{ 'form-group--error': $v.addressform.region.$error }">
                                            <v-select
                                                :options="regions"
                                                :reduce="name => name.id"
                                                label="name"
                                                v-model.trim="$v.addressform.region.$model"
                                            />
                                            <div class="error" v-if="$v.addressform.region.$error && !$v.addressform.region.required">Field is required.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="city">City <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center" :class="{ 'form-group--error': $v.addressform.city.$error }">
                                            <input class="form-control" type="text" id="city" name="city" v-model.trim="$v.addressform.city.$model">
                                            <div class="error" v-if="$v.addressform.city.$error && !$v.addressform.city.required">Field is required.</div>
                                            <div class="error" v-if="!$v.addressform.city.minLength">Field must have at least {{ $v.addressform.city.$params.minLength.min }} characters.</div>
                                        </div>

                                        <div class="col-4 col-md-2 text-center">
                                            <label for="index">Zip code <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center" :class="{ 'form-group--error': $v.addressform.index.$error }">
                                             <input class="form-control" type="text" id="index" name="index" v-model.trim="$v.addressform.index.$model">
                                             <div class="error" v-if="$v.addressform.index.$error && !$v.addressform.index.required">Field is required.</div>
                                            <div class="error" v-if="!$v.addressform.index.minLength">Field must have at least {{ $v.addressform.index.$params.minLength.min }} characters.</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-4 col-md-2 text-center">
                                            <label for="street">Street <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 col-md-4 text-center" :class="{ 'form-group--error': $v.addressform.street.$error }">
                                            <input class="form-control" type="text" id="street" name="street" v-model.trim="$v.addressform.street.$model">
                                            <div class="error" v-if="$v.addressform.street.$error && !$v.addressform.street.required">Field is required.</div>
                                            <div class="error" v-if="!$v.addressform.street.minLength">Field must have at least {{ $v.addressform.street.$params.minLength.min }} characters.</div>
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
                                <div class="col-12 text-center">
                                    <h4>Examples of your work (portfolio)</h4>
                                </div>
                            </div>
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
                            <div class="form-group row justify-content-center">
                                <div class="col-12 text-center">
                                    <h4>Languages spoken</h4>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center language-add" v-for="(item, index) in $v.lenguageform.$each.$iter" :key="index">
                                <div class="col-12 col-md-2 text-center">
                                    <label for="language">Language <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-12 col-md-3 text-center" :class="{ 'form-group--error': item.$error }">
                                    <input class="form-control" type="text" name="language" v-model.trim="item.lenguage.$model">
                                    <div class="error" v-if="item.$error && !item.lenguage.required">Language is required.</div>
                                </div>

                                <div class="col-12 col-md-2 text-center">
                                    <label for="levelLanguage">Level <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-12 col-md-3 text-center" :class="{ 'form-group--error': item.$error }">
                                    <v-select
                                        :options="levels"
                                        :reduce="level => level.id"
                                        label="level"
                                        v-model.trim="item.level_id.$model"
                                    />
                                    <div class="error" v-if="item.$error && !item.level_id.required">Level language is required.</div>
                                </div>
                                <div class="col-12 col-md-2 text-center">
                                    <button type="button" class="btn btn-danger" @click="removeItem('lenguageform', index)" v-if="lenguageform.length > 1">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary add-btn-p" id="language_add" @click="addLenguage">
                                    +ADD Language
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Skills -->
                        <div class="col-md-12">
                            <div class="form-group row justify-content-center">
                                <div class="col-12 text-center">
                                    <h4>Professional skills and level of knowledge</h4>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center skill-add" v-for="(item, index) in $v.skillform.$each.$iter" :key="index">
                                <div class="col-12 col-md-2 text-center">
                                    <label for="skill">Skill <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-12 col-md-3 text-center" :class="{ 'form-group--error': item.$error }">
                                    <input class="form-control" type="text" name="skill" v-model.trim="item.skill.$model">
                                    <div class="error" v-if="item.$error && !item.skill.required">Skill is required.</div>
                                    <div class="error" v-if="!item.skill.minLength">Field must have at least {{ item.skill.$params.minLength.min }} characters.</div>
                                </div>

                                <div class="col-12 col-md-2 text-center">
                                    <label for="levelSkill">Level <span class="be-sure-to-fill-out">*</span></label>
                                </div>
                                <div class="col-12 col-md-3 text-center" :class="{ 'form-group--error': item.$error }">
                                    <v-select
                                        :options="skillLevels"
                                        :reduce="level => level.id"
                                        label="level"
                                        v-model.trim="item.level_id.$model"
                                    />
                                    <div class="error" v-if="item.$error && !item.level_id.required">Level skill is required.</div>
                                </div>
                                <div class="col-12 col-md-2 text-center">
                                    <button type="button" class="btn btn-danger" @click="removeItem('skillform', index)" v-if="skillform.length > 1">Remove</button>
                                </div>
                                <p class="errors" v-if="item.error">This field must be filled</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary add-btn-p" id="skill_add" @click="addSkill">
                                    +ADD Skill
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Education -->
                        <div class="col-12">
                            <div class="form-group row justify-content-center">
                                <div class="col-12 text-center">
                                    <h4>Education</h4>
                                </div>
                            </div>
                            <div class="education-add form-group row justify-content-center" v-for="(item, index) in educationform">
                                <div class="col-12 col-md-6 text-center">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 text-center">
                                            <label for="university">University: <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 text-center" :class="{ 'form-group--error': $v.educationform.$each[index].university.$error }">
                                            <input class="form-control" type="text" name="university" v-model.trim="item.university">
                                            <div class="error" v-if="$v.educationform.$each[index].university.$error && !$v.educationform.$each[index].university.required">Field is required.</div>
                                            <div class="error" v-if="!$v.educationform.$each[index].university.minLength">Field must have at least {{ $v.educationform.$each[index].university.$params.minLength.min }} characters.</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <label for="professi">Professi: <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 text-center" :class="{ 'form-group--error': $v.educationform.$each[index].professi.$error }">
                                            <input class="form-control" type="text" name="professi" v-model.trim="item.professi">
                                            <div class="error" v-if="$v.educationform.$each[index].professi.$error && !$v.educationform.$each[index].professi.required">Field is required.</div>
                                            <div class="error" v-if="!$v.educationform.$each[index].professi.minLength">Field must have at least {{ $v.educationform.$each[index].professi.$params.minLength.min }} characters.</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <label for="diplom_level">Diplom level: <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 text-center" :class="{ 'form-group--error': $v.educationform.$each[index].level.$error }">
                                            <input class="form-control" type="text" name="diplom_level" v-model.trim="item.level">
                                            <div class="error" v-if="$v.educationform.$each[index].level.$error && !$v.educationform.$each[index].level.required">Field is required.</div>
                                            <div class="error" v-if="!$v.educationform.$each[index].level.minLength">Field must have at least {{ $v.educationform.$each[index].level.$params.minLength.min }} characters.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-4 text-center">
                                            <label for="start">Start: <span class="be-sure-to-fill-out">*</span></label>
                                        </div>
                                        <div class="col-8 text-center" :class="{ 'form-group--error': $v.educationform.$each[index].start.$error }">
                                            <date-picker v-model.trim="item.start" valueType="format" format="YYYY-MM-DD"></date-picker>
                                            <div class="error" v-if="$v.educationform.$each[index].start.$error && !$v.educationform.$each[index].start.required">Field is required.</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <label for="finish">Finish:</label>
                                        </div>
                                        <div class="col-8 text-center" :class="{ 'form-group--error': $v.educationform.$each[index].finish.$error }" v-if="!item.finishLook">
                                            <date-picker v-model.trim="item.finish" valueType="format" format="YYYY-MM-DD"></date-picker>
                                        </div>
                                        <div class="col-8 text-center" v-if="item.finishLook == 1">
                                            <h5>To the present day...</h5>
                                        </div>

                                        <div class="col-12 text-center" v-if="item.finishLook == 1">
                                             <button type="button" class="btn btn-primary" style="color: #fff;" @click="finishItem('educationform', index)">Click if you want to specify the end date</button>
                                        </div>
                                        <div class="col-12 text-center" v-if="!item.finishLook">
                                             <button type="button" class="btn btn-secondary" style="color: #fff;" @click="finishItem('educationform', index)">Click if you continue</button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="error col-12 text-center" v-if="validDateEducation">Start date {{item.start}} cannot be less than end date {{item.finish}}</div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-2 text-center">
                                        <button type="button" class="btn btn-danger" @click="removeItem('educationform', index)" v-if="educationform.length > 1">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary add-btn-pe" @click="addEducation">
                                    +ADD Education
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Experience -->
                        <div class="col-12">
                            <div class="form-group row justify-content-center">
                                <div class="col-12 text-center">
                                    <h4>Experience</h4>
                                </div>
                            </div>
                            <div class="experience-add" v-for="(item, index) in experienceform">
                                <div class="form-group row justify-content-center">
                                    <div class="col-12 col-md-6 text-center">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-4 text-center">
                                                <label for="work">Company name: <span class="be-sure-to-fill-out">*</span></label>
                                            </div>
                                            <div class="col-8 text-center" :class="{ 'form-group--error': $v.experienceform.$each[index].experience.$error }">
                                                <input class="form-control" type="text" name="experience" v-model.trim="item.experience">
                                                <div class="error" v-if="$v.experienceform.$each[index].experience.$error && !$v.experienceform.$each[index].experience.required">Field is required.</div>
                                                <div class="error" v-if="!$v.experienceform.$each[index].experience.minLength">Field must have at least {{ $v.experienceform.$each[index].experience.$params.minLength.min }} characters.</div>
                                            </div>

                                            <div class="col-4 text-center">
                                                <label for="position">Position: <span class="be-sure-to-fill-out">*</span></label>
                                            </div>
                                            <div class="col-8 text-center" :class="{ 'form-group--error': $v.experienceform.$each[index].position.$error }">
                                                <input class="form-control" type="text" name="position" v-model.trim="item.position">
                                                <div class="error" v-if="$v.experienceform.$each[index].position.$error && !$v.experienceform.$each[index].position.required">Field is required.</div>
                                                <div class="error" v-if="!$v.experienceform.$each[index].position.minLength">Field must have at least {{ $v.experienceform.$each[index].position.$params.minLength.min }} characters.</div>
                                            </div>

                                            <div class="col-4 text-center">
                                                <label for="start_work">Start: <span class="be-sure-to-fill-out">*</span></label>
                                            </div>
                                            <div class="col-8 text-center" :class="{ 'form-group--error': $v.experienceform.$each[index].start.$error }">
                                                <date-picker v-model.trim="item.start" valueType="format"></date-picker>
                                                <div class="error" v-if="$v.experienceform.$each[index].start.$error && !$v.experienceform.$each[index].start.required">Field is required.</div>
                                                <div class="error" v-if="!$v.experienceform.$each[index].start.minLength">Field must have at least {{ $v.experienceform.$each[index].start.$params.minLength.min }} characters.</div>
                                            </div>

                                            <div class="col-4 text-center">
                                                <label for="finish_work">Finish:</label>
                                            </div>
                                            <div class="col-8 text-center" :class="{ 'form-group--error': $v.experienceform.$each[index].finish.$error }" v-if="!item.finishLook">
                                                <date-picker v-model.trim="item.finish" valueType="format"></date-picker>
                                            </div>

                                            <div class="col-8 text-center" v-if="item.finishLook == 1">
                                                <h5>To the present day...</h5>
                                            </div>
                                            <div class="col-12 text-center" v-if="item.finishLook == 1">
                                                 <button type="button" class="btn btn-primary" style="color: #fff;" @click="finishItem('experienceform', index)">Click if you want to specify the end date</button>
                                            </div>
                                            <div class="col-12 text-center" v-if="!item.finishLook">
                                                 <button type="button" class="btn btn-secondary" style="color: #fff;" @click="finishItem('experienceform', index)">Click if you continue</button>
                                            </div>



                                            <div class="error col-12 text-center" v-if="validDateExperience">Start date {{item.start}} cannot be less than end date {{item.finish}}</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-4 text-center">
                                                <label for="functions">Functions: <span class="be-sure-to-fill-out">*</span></label>
                                            </div>
                                            <div class="col-8 text-center" :class="{ 'form-group--error': $v.experienceform.$each[index].functions.$error }">
                                                <vue-editor :editor-toolbar="customToolbar" v-model.trim="item.functions" placeholder="Functions"></vue-editor>
                                                <div class="error" v-if="$v.experienceform.$each[index].functions.$error && !$v.experienceform.$each[index].functions.required">Field is required.</div>
                                                <div class="error" v-if="!$v.experienceform.$each[index].functions.minLength">Field must have at least {{ $v.experienceform.$each[index].functions.$params.minLength.min }} characters.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-2 text-center">
                                        <button type="button" class="btn btn-danger" @click="removeItem('experienceform', index)" v-if="experienceform.length > 1">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary add-btn-pex" id="work_add" @click="addExperience">
                                    +ADD Experience
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <!-- Projects -->
                        <div class="col-md-12 text-center">
                            <label for="projects"><h4>Projects in which you participated</h4></label>
                        </div>
                        <div class="col-md-12">
                            <vue-editor :editor-toolbar="customToolbar" v-model="projectsform.description" placeholder="Projects in which you participated"></vue-editor>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center hobbi-form">
                        <!-- Hobbis -->
                        <div class="col-md-12">
                            <div class="form-group row justify-content-center">
                                <div class="col-12 text-center">
                                    <h4>Your interests</h4>
                                </div>
                            </div>
                            <div class="hobbi-body" v-for="(item, indexHobbi) in hobbiform" :key="indexHobbi">
                                <div class="form-group row justify-content-center hobbi-add">
                                    <div class="col-12 col-md-2 text-center">
                                        <label for="hobbi">Interest</label>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <input class="form-control" type="text" name="hobbi" v-model="item.hobbi">
                                    </div>

                                    <div class="col-12 col-md-2 text-center">
                                        <button type="button" class="btn btn-danger" @click="removeItem('hobbiform', indexHobbi)" v-if="hobbiform.length > 1">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary" id="hobbi_add" @click="addHobbi">
                                        +ADD Interest
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
                            <button type="button" class="btn btn-success" @click="checkForm">
                                SAVE
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
    import { required, minLength, between } from 'vuelidate/lib/validators';
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import VueTelInput from 'vue-tel-input';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

    export default {
        components: {
            VueEditor,
            AvatarCropper,
            vSelect,
            DatePicker,
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

                bindProps: {
                  mode: "international",
                  defaultCountry: "FR",
                  disabledFetchingCountry: false,
                  disabled: false,
                  disabledFormatting: false,
                  placeholder: "Enter a phone number",
                  required: false,
                  enabledCountryCode: true,
                  enabledFlags: true,
                  preferredCountries: ["AU", "BR"],
                  onlyCountries: [],
                  ignoredCountries: [],
                  autocomplete: "off",
                  name: "telephone",
                  maxLen: 25,
                  wrapperClasses: "",
                  inputClasses: "",
                  dropdownOptions: {
                    disabledDialCode: false
                  },
                  inputOptions: {
                    showDialCode: false
                  }
                },

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
                    level: null,
                    finishLook: null
                }],

                experienceform: [{
                    experience: null,
                    position: null,
                    start: null,
                    finish: null,
                    functions: null,
                    finishLook: null
                }],

                hobbiform: [{
                    hobbi: null
                }],

                addressform: {
                    country: null,
                    region: null,
                    city: null,
                    index: null,
                    street: null
                },

                projectsform: {
                    description: null
                },

                profileform: {
                    web_site: null,
                    photo: null,
                    dribbble: null,
                    behance: null,
                    git: null,
                    linkedin: null
                },

                errormessages: {
                    error: null
                },

                dateEducationError: null,
                dateExperienceError: null,

                regions: [],
                levels: [],
                skillLevels: [],
                countries: []

            };
        },

        validations: {
            form: {
                name: {
                    required,
                    minLength: minLength(3)
                },

                phone: {
                    required,
                    minLength: minLength(10)
                },

                email: {
                    required
                }
            },

            lenguageform: {
                $each: {
                    lenguage: {
                    required
                    },

                    level_id: {
                        required
                    }
                }
            },

            addressform: {
                country: {
                    required
                },

                region: {
                    required
                },

                city: {
                    required,
                    minLength: minLength(2)
                },

                index: {
                    required,
                    minLength: minLength(3)
                },

                street: {
                    required,
                    minLength: minLength(3)
                }
            },

            profileform: {
                photo: {
                    required
                }
            },

            skillform: {
                $each: {
                    skill: {
                        required,
                        minLength: minLength(2)
                    },
                    level_id: {
                        required
                    }
                }
            },

            educationform: {
                $each: {
                    university: {
                        required,
                        minLength: minLength(2)
                    },
                    professi: {
                        required,
                        minLength: minLength(3)
                    },
                    start: {
                        required,
                        minLength: minLength(4)
                    },
                    finish: {
                        // required,
                        // minLength: minLength(4)
                    },
                    level: {
                        required,
                        minLength: minLength(4)
                    },
                    finishLook: {}
                }
            },

            experienceform: {
                $each: {
                    experience: {
                        required,
                        minLength: minLength(3)
                    },
                    position: {
                        required,
                        minLength: minLength(3)
                    },
                    start: {
                        required,
                        minLength: minLength(4)
                    },
                    finish: {
                        // required,
                        // minLength: minLength(4)
                    },
                    functions: {
                        required,
                        minLength: minLength(3)
                    },
                    finishLook: {}
                }
            },
        },

        methods: {
            finishItem(name, index) {
                // console.log(this[name][index].finishLook)
                if (this[name][index].finishLook == 1) {
                    this[name][index].finish = null
                    this[name][index].finishLook = null
                } else {
                    this[name][index].finish = null
                    this[name][index].finishLook = 1
                }
                return this[name][index].finishLook
            },

            // checkAddresse (url) {
            //     let arrUrlChecked = url.split('/')
            //     let arrUrlChec = []
            //     arrUrlChecked.forEach(elem => {
            //         if ( elem != 'http:' && elem != 'https:') {
            //             arrUrlChec.push(elem)
            //         }
            //     })
            //     let urlNextChecked = arrUrlChec.join('/')
            //     let arrUrlNextChecked = urlNextChecked.split('.')
            //     let arrWwwDelete = []
            //     arrUrlNextChecked.forEach(elem => {
            //         if ( elem != 'www' ) {
            //             arrWwwDelete.push(elem)
            //         }
            //     })
            //     let validDate = arrWwwDelete.join('.')
            //     return validDate
            // },

            removeItem(name, index) {
                this[name].splice(index, 1)
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

            addHobbi() {
                this.hobbiform.push({
                    hobbi: null,
                    error: null
                })
            },

            addLenguage() {
                this.lenguageform.push({
                    lenguage: null,
                    level_id: null,
                    error: null
                })
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
                    error: null,
                    finishLook: null
                })
            },

            addExperience() {
                this.experienceform.push({
                    experience: null,
                    position: null,
                    start: null,
                    finish: null,
                    functions: null,
                    error: null,
                    finishLook: null
                })
            },

            checkForm() {
                this.$v.$touch()
                if (this.$v.$invalid || this.dateEducationError==1 || this.dateExperienceError==1) {
                    this.errormessages = 'UUUPS!!!'
                }
                else {
                    if (this.profileform.linkedin) {
                        console.log(this.profileform.linkedin)
                        let urlLinkedinIn = this.profileform.linkedin
                        let arrLinkedinIn = urlLinkedinIn.split('/')
                        let arrLinkedinInObr = []

                        arrLinkedinIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrLinkedinInObr.push(elem)
                            }
                        })
                        console.log(arrLinkedinInObr)
                        let urlLinkedinNextChecked = arrLinkedinInObr.join('/')
                        let arrLinkedinNextWww = urlLinkedinNextChecked.split('.')

                        console.log(arrLinkedinNextWww)
                        let arrLinkedinOut = []
                        arrLinkedinNextWww.forEach(elem => {
                            if (elem != '/www') {
                                arrLinkedinOut.push(elem)
                            }
                        })
                        let urlLinkedinOut = arrLinkedinOut.join('.')
                        console.log(urlLinkedinOut)
                        if(urlLinkedinOut[urlLinkedinOut.length - 1] != '/') {
                            this.profileform.linkedin = urlLinkedinOut
                        }
                        else {
                            this.profileform.linkedin = urlLinkedinOut.slice(0, -1)
                        }
                        console.log(this.profileform.linkedin)
                    }
                    if (this.profileform.behance) {
                        console.log(this.profileform.behance)
                        let urlBehanceIn = this.profileform.behance
                        console.log(urlBehanceIn)
                        let arrBehanceIn = urlBehanceIn.split('/')
                        let arrBehanceInObr = []

                        arrBehanceIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrBehanceInObr.push(elem)
                            }
                        })
                        console.log(arrBehanceInObr)
                        let urlBehanceNextChecked = arrBehanceInObr.join('/')
                        let arrBehanceNextWww = urlBehanceNextChecked.split('.')

                        console.log(arrBehanceNextWww)
                        let arrBehanceOut = []
                        arrBehanceNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrBehanceOut.push(elem)
                            }
                        })
                        let urlBehanceOut = arrBehanceOut.join('.')
                        console.log(urlBehanceOut)
                        if(urlBehanceOut[urlBehanceOut.length - 1] != '/') {
                            this.profileform.behance = urlBehanceOut
                        }
                        else {
                            this.profileform.behance = urlBehanceOut.slice(0, -1)
                        }
                        console.log(this.profileform.behance)
                    }
                    if (this.profileform.git) {
                        console.log(this.profileform.git)
                        let urlGitIn = this.profileform.git
                        console.log(urlGitIn)
                        let arrGitIn = urlGitIn.split('/')
                        let arrGitInObr = []

                        arrGitIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrGitInObr.push(elem)
                            }
                        })
                        console.log(arrGitInObr)
                        let urlGitNextChecked = arrGitInObr.join('/')
                        let arrGitNextWww = urlGitNextChecked.split('.')

                        console.log(arrGitNextWww)
                        let arrGitOut = []
                        arrGitNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrGitOut.push(elem)
                            }
                        })
                        let urlGitOut = arrGitOut.join('.')
                        console.log(urlGitOut)
                        if(urlGitOut[urlGitOut.length - 1] != '/') {
                            this.profileform.git = urlGitOut
                        }
                        else {
                            this.profileform.git = urlGitOut.slice(0, -1)
                        }
                        console.log(this.profileform.git)
                    }
                    if (this.profileform.dribbble) {
                        console.log(this.profileform.dribbble)
                        let urlDribbbleIn = this.profileform.dribbble
                        console.log(urlDribbbleIn)
                        let arrDribbbleIn = urlDribbbleIn.split('/')
                        let arrDribbleInObr = []

                        arrDribbbleIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrDribbleInObr.push(elem)
                            }
                        })
                        console.log(arrDribbleInObr)
                        let urlDribbleNextChecked = arrDribbleInObr.join('/')
                        let arrDribbleNextWww = urlDribbleNextChecked.split('.')

                        console.log(arrDribbleNextWww)
                        let arrDribbleOut = []
                        arrDribbleNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrDribbleOut.push(elem)
                            }
                        })
                        let urlDribbbleOut = arrDribbleOut.join('.')
                        console.log(urlDribbbleOut)
                        if(urlDribbbleOut[urlDribbbleOut.length - 1] != '/') {
                            this.profileform.dribbble = urlDribbbleOut
                        }
                        else {
                            this.profileform.dribbble = urlDribbbleOut.slice(0, -1)
                        }
                        console.log(this.profileform.dribbble)
                    }
                    if (this.profileform.web_site) {
                        console.log(this.profileform.web_site)
                        let urlWebIn = this.profileform.web_site
                        console.log(urlWebIn)
                        let arrWebIn = urlWebIn.split('/')
                        let arrWebInObr = []

                        arrWebIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrWebInObr.push(elem)
                            }
                        })
                        console.log(arrWebInObr)
                        let urlWebNextChecked = arrWebInObr.join('/')
                        let arrWebNextWww = urlWebNextChecked.split('.')

                        console.log(arrWebNextWww)
                        let arrWebOut = []
                        arrWebNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrWebOut.push(elem)
                            }
                        })
                        let urlWebOut = arrWebOut.join('.')
                        console.log(urlWebOut)
                        if(urlWebOut[urlWebOut.length - 1] != '/') {
                            this.profileform.web_site = urlWebOut
                        }
                        else {
                            this.profileform.web_site = urlWebOut.slice(0, -1)
                        }
                        console.log(this.profileform.web_site)
                    }

                    let data = {
                        user: this.form,
                        profileform: this.profileform,
                        lenguageform: this.lenguageform,
                        skillform: this.skillform,
                        educationform: this.educationform,
                        experienceform: this.experienceform,
                        hobbiform: this.hobbiform,
                        addressform: this.addressform,
                        projectsform: this.projectsform && this.projectsform.description ? this.projectsform : { description: null }
                    }
                    axios.put('/profiles/' + this.profileform.id, data)
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

        mounted() {
            axios.get('/api/geo/countries?fields=id,name')
                .then(response => {
                    this.countries = response.data.sort((a,b) => a.name > b.name ? 1 : -1)
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
            axios.post('/api/levels/all')
                .then(response => {
                    this.levels = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
            axios.post('/api/skillLevels/all')
                .then(response => {
                    this.skillLevels = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
            axios.post('/profiles/user')
                .then(response =>{
                    this.profileform = response.data.profile && response.data.profile.web_site ? response.data.profile : { web_site: null }

                    //we clean url from the base (to bring the record recorded in compliance)
                    if (this.profileform.git) {
                        let urlInGithab = this.profileform.git
                        // console.log(urlInGithab)
                        let arrUrlGithabIn = urlInGithab.split('/')
                        let arrUrlGithabObr = []
                        arrUrlGithabIn.forEach(elem => {
                            if(elem != 'http:' && elem != 'https:') {
                                arrUrlGithabObr.push(elem)
                            }
                        })
                        // console.log(arrUrlGithabObr)
                        let strGithabUrlObr = arrUrlGithabObr.join('/')
                        let arrGithabUrlObr = strGithabUrlObr.split('.')
                        let arrGithabUrlObrDot = []
                        arrGithabUrlObr.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrGithabUrlObrDot.push(elem)
                            }
                        })
                        let strGithabUrlObrDot = arrGithabUrlObrDot.join('.')
                        console.log(strGithabUrlObrDot)
                        if (strGithabUrlObrDot[strGithabUrlObrDot.length - 1] != '/' && strGithabUrlObrDot[0] != '/') {
                            this.profileform.git = strGithabUrlObrDot
                        }
                        else if (strGithabUrlObrDot[strGithabUrlObrDot.length - 1] == '/') {
                            let strGithabUrlFinSlesh = strGithabUrlObrDot.slice(0, -1)
                            console.log(strGithabUrlFinSlesh)
                            if (strGithabUrlFinSlesh[0] != '/') {
                                this.profileform.git = strGithabUrlFinSlesh
                            }
                            else {
                                this.profileform.git = strGithabUrlFinSlesh.slice(1)
                                console.log(this.profileform.git)
                            }
                        }
                        else {
                            this.profileform.git = strGithabUrlObrDot.slice(1)
                        }
                    }

                    if (this.profileform.linkedin) {
                        let urlLinkedinIn = this.profileform.linkedin
                        let arrLinkedinIn = urlLinkedinIn.split('/')
                        let arrLinkedinInObr = []

                        arrLinkedinIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrLinkedinInObr.push(elem)
                            }
                        })
                        let urlLinkedinNextChecked = arrLinkedinInObr.join('/')
                        let arrLinkedinNextWww = urlLinkedinNextChecked.split('.')
                        let arrLinkedinOut = []
                        arrLinkedinNextWww.forEach(elem => {
                            if (elem != '/www') {
                                arrLinkedinOut.push(elem)
                            }
                        })
                        let urlLinkedinOut = arrLinkedinOut.join('.')
                        if(urlLinkedinOut[urlLinkedinOut.length - 1] != '/' && urlLinkedinOut[0] != '/') {
                            this.profileform.linkedin = urlLinkedinOut
                        }
                        else if (urlLinkedinOut[urlLinkedinOut.length - 1] == '/'){
                            let urlTestLinkedinOut = urlLinkedinOut.slice(0, -1)
                            if (urlTestLinkedinOut[0] != '/') {
                                this.profileform.linkedin = urlTestLinkedinOut
                            }
                            else {
                                this.profileform.linkedin = urlTestLinkedinOut.slice(1)
                            }
                        }
                        else {
                            this.profileform.linkedin = urlLinkedinOut.slice(1)
                        }
                        console.log(this.profileform.linkedin + 'posledniy')
                    }

                    if (this.profileform.behance) {
                        let urlBehanceIn = this.profileform.behance
                        let arrBehanceIn = urlBehanceIn.split('/')
                        let arrBehanceInObr = []
                        arrBehanceIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrBehanceInObr.push(elem)
                            }
                        })
                        let urlBehanceNextChecked = arrBehanceInObr.join('/')
                        let arrBehanceNextWww = urlBehanceNextChecked.split('.')
                        let arrBehanceOut = []
                        arrBehanceNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrBehanceOut.push(elem)
                            }
                        })
                        let urlBehanceOut = arrBehanceOut.join('.')
                        if (urlBehanceOut[urlBehanceOut.length - 1] != '/' && urlBehanceOut[0] != '/') {
                            this.profileform.behance = urlBehanceOut
                        }
                        else if (urlBehanceOut[urlBehanceOut.length - 1] == '/'){
                            let urlTestBehanceOut = urlBehanceOut.slice(0, -1)
                            if (urlTestBehanceOut[0] != '/') {
                                this.profileform.behance = urlTestBehanceOut
                            }
                            else {
                                this.profileform.behance = urlTestBehanceOut.slice(1)
                            }
                        }
                        else {
                            this.profileform.behance = urlBehanceOut.slice(1)
                        }
                        console.log(this.profileform.behance)
                    }

                    if (this.profileform.dribbble) {
                        let urlDribbbleIn = this.profileform.dribbble
                        let arrDribbbleIn = urlDribbbleIn.split('/')
                        let arrDribbbleInObr = []
                        arrDribbbleIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrDribbbleInObr.push(elem)
                            }
                        })
                        let urlDribbbleNextChecked = arrDribbbleInObr.join('/')
                        let arrDribbbleNextWww = urlDribbbleNextChecked.split('.')
                        let arrDribbbleOut = []
                        arrDribbbleNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrDribbbleOut.push(elem)
                            }
                        })
                        let urlDrebbbleOut = arrDribbbleOut.join('.')
                        if (urlDrebbbleOut[urlDrebbbleOut.length - 1] != '/' && urlDrebbbleOut[0] != '/') {
                            this.profileform.dribbble = urlDrebbbleOut
                        }
                        else if (urlDrebbbleOut[urlDrebbbleOut.length - 1] == '/'){
                            let urlTestDribbbleOut = urlDrebbbleOut.slice(0, -1)
                            if (urlTestDribbbleOut[0] != '/') {
                                this.profileform.dribbble = urlTestDribbbleOut
                            }
                            else {
                                this.profileform.dribbble = urlTestDribbbleOut.slice(1)
                            }
                        }
                        else {
                            this.profileform.dribbble = urlDrebbbleOut.slice(1)
                        }
                        console.log(this.profileform.dribbble)
                    }

                    if (this.profileform.web_site) {
                        console.log(this.profileform.web_site)
                        let urlWebIn = this.profileform.web_site
                        console.log(urlWebIn)
                        let arrWebIn = urlWebIn.split('/')
                        let arrWebInObr = []

                        arrWebIn.forEach(elem => {
                            if (elem != 'http:' && elem != 'https:') {
                                arrWebInObr.push(elem)
                            }
                        })
                        console.log(arrWebInObr)
                        let urlWebNextChecked = arrWebInObr.join('/')
                        let arrWebNextWww = urlWebNextChecked.split('.')

                        console.log(arrWebNextWww)
                        let arrWebOut = []
                        arrWebNextWww.forEach(elem => {
                            if (elem != '/www' && elem != 'www') {
                                arrWebOut.push(elem)
                            }
                        })
                        let urlWebOut = arrWebOut.join('.')
                        console.log(urlWebOut)
                        if(urlWebOut[urlWebOut.length - 1] != '/' && urlWebOut[0] != '/') {
                            this.profileform.web_site = urlWebOut
                        }
                        else if (urlWebOut[urlWebOut.length - 1] == '/'){
                            let urlTestWebOut = urlWebOut.slice(0, -1)
                            if (urlTestWebOut[0] != '/') {
                                this.profileform.web_site = urlTestWebOut
                            }
                            else {
                                this.profileform.web_site = urlTestWebOut.slice(1)
                            }
                        }
                        else {
                            this.profileform.web_site = urlWebOut.slice(1)
                        }
                        console.log(this.profileform.web_site)
                    }
                    //end clean url

                    this.addressform = response.data.address && response.data.address.country ? response.data.address : { country: null }
                    this.hobbiform = response.data.hobbi
                    this.experienceform = response.data.works
                    for (var i = 0; i < this.experienceform.length; i++) {
                        this.$set(this.experienceform[i], 'finishLook', null)
                    }
                    this.educationform = response.data.educations
                    for (var i = 0; i < this.educationform.length; i++) {
                        this.$set(this.educationform[i], 'finishLook', null)
                    }
                    this.lenguageform = response.data.lenguages
                    this.skillform = response.data.skills
                    this.projectsform = response.data.projects && response.data.projects.description ? response.data.projects : { description: null }
                    this.form = response.data.user

                    if (this.addressform.country != null) {
                        this.changeCountry(this.addressform.country)
                        this.addressform.country = Number(this.addressform.country)
                        this.addressform.region = Number(this.addressform.region)
                    }

                    this.loading = false

                })
                .catch(error => {
                    console.log(error.response.data.message ? error.response.data.message : error.response.data)
                    this.errormessages = error.response.data
                })
        },

        // created() {
        //     this.$set(this, 'form', this.user)
        // },

        computed: {
            validDateEducation() {
                if (this.educationform.length && this.educationform[0].start != null) {
                     for (let i=0; i<this.educationform.length; i++) {
                        if (this.educationform[i].finish == null && !this.educationform[i].finish) {
                            this.dateEducationError = null
                            return false
                        }
                        else {
                            let str_start = this.educationform[i].start
                            let str_finish = this.educationform[i].finish
                            let arr_start = str_start.split('-')
                            let arr_finish = str_finish.split('-')
                            if (Number(arr_start[0]) > Number(arr_finish[0])) {
                                this.dateEducationError = 1
                                return true
                            }
                            else if (Number(arr_start[0]) == Number(arr_finish[0])) {
                                if (Number(arr_start[1]) > Number(arr_finish[1])) {
                                    this.dateEducationError = 1
                                    return true
                                }
                                else if (Number(arr_start[1]) == Number(arr_finish[1])) {
                                    if (Number(arr_start[2]) > Number(arr_finish[2])) {
                                       this.dateEducationError = 1
                                        return true
                                    }
                                    else {
                                        this.dateEducationError = null
                                        return false
                                    }
                                }
                            }
                            else {
                                this.dateEducationError = null
                                return false
                            }
                        }
                    }
                }
                else {
                    this.dateEducationError = null
                    return false
                }
            },

            validDateExperience() {
                if (this.experienceform.length && this.experienceform[0].start != null) {
                     for (let i=0; i<this.experienceform.length; i++) {
                        if (this.experienceform[i].finish == null && !this.experienceform[i].finish) {
                           this.dateExperienceError = null
                            return false
                        }
                        else {
                            let str_start = this.experienceform[i].start
                            let str_finish = this.experienceform[i].finish
                            let arr_start = str_start.split('-')
                            let arr_finish = str_finish.split('-')
                            if (Number(arr_start[0]) > Number(arr_finish[0])) {
                                this.dateExperienceError = 1
                                return true
                            }
                            else if (Number(arr_start[0]) == Number(arr_finish[0])) {
                                if (Number(arr_start[1]) > Number(arr_finish[1])) {
                                    this.dateExperienceError = 1
                                    return true
                                }
                                else if (Number(arr_start[1]) == Number(arr_finish[1])) {
                                    if (Number(arr_start[2]) > Number(arr_finish[2])) {
                                       this.dateExperienceError = 1
                                        return true
                                    }
                                    else {
                                        this.dateExperienceError = null
                                        return false
                                    }
                                }
                            }
                            else {
                                this.dateExperienceError = null
                                return false
                            }
                        }
                    }
                }
                else {
                    this.dateExperienceError = null
                    return false
                }
            }

        }
    };
</script>
