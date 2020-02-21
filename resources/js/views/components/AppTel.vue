<template>
  <vue-tel-input id="phone" class="form-control" name="phone" v-model="phone" v-bind="bindProps"></vue-tel-input>
</template>
<script>
  import VueTelInput from 'vue-tel-input';
  import Vuelidate from 'vuelidate';
  import { required, minLength, between } from 'vuelidate/lib/validators';

  export default {
    name: 'AppTel',

    data() {
      return {
        phone: null,

        bindProps: {
          defaultCountry: 'UA',
          validCharactersOnly: true,
          enabledCountryCode: true,
          autocomplete: "on",
          inputOptions: {
            showDialCode: true
          }
        }
      }
    }
  }
</script>
