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
        }

      }
    }
  }
</script>
