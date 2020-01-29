<template>
   <!--  <input id="phone" type="text" class="form-control" name="phone" value="" required autocomplete="phone" autofocus> -->
   <vue-tel-input id="phone" class="form-control" name="phone" v-model="value"></vue-tel-input>
</template>
<script>
  import VueTelInput from 'vue-tel-input';
  // Vue.use(VueTelInput, [globalOptions = {
  //   enabledCountryCode: true
  // }])

  export default {
    name: 'AppTel',

    props: {
      // enabledCountryCode: true
    },

    data() {
      return {
        value: null
      }
    },

    methods: {

    }
  }
</script>
