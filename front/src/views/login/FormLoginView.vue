<template>
  <section class="h-screen">
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-white-800">
      <div class="md:w-3/12 lg:w-5/12 mb-12 md:mb-0">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="w-full"
          alt="Phone image" />
      </div>
      <div class="rounded-lg lg:w-3/12 lg:ml-5 mb-[5%]">
        <form @submit.prevent="login">           
          <!-- Email input -->
          <div class="mb-6">
            <input type="email" v-model="email" class="w-full px-4 py-2 text-lg font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded outline-none" placeholder="Email address" />
          </div>
          <!-- Password input -->
          <div class="mb-6 flex items-center justify-between w-full px-4 py-2 text-lg font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded outline-none">
            <input :type="!showPassword ? 'password' : 'text'" v-model="password" class="outline-none	" placeholder="Password" />
            <fa @click="showPassword = !showPassword" :icon="showPassword ? 'eye' : 'eye-slash'" />
          </div>
          <p v-if="inValid" class="text-[#e04]">Invalid email or password!</p>
          <a href="#!" class="text-[#0062ff] hover:text-[#0062ff] mb-3 focus:text-[#0062ff] transition duration-200 ease-in-out"> Forgot password?</a>
          <button type="submit" class="w-full py-2 mt-3 bg-[#0062ff] rounded-md text-[#fff] text-xl font-normal">Login</button>
        </form>
      </div>
    </div>
  </section>
</template>
  
<script>
import axios from '../../axios-http'
import VueCookies from 'vue-cookies'
export default {
  data() {
    return {
      url: "http://127.0.0.1:8000/api/",
      email: '',
      password: '',
      inValid: false,
      showPassword: false,
    }
  },
  methods: {
    login() {
      let user = { email: this.email, password: this.password }
      axios.post('loginUser', user).then((res) => {
        VueCookies.set('token', res.data.token, "1h");
        VueCookies.set('userId', res.data.user.id, "1h");
        VueCookies.set('role', res.data.user.role, "1h");
        console.log(VueCookies.get('token'));
        console.log(VueCookies.get('userId'));
        console.log(VueCookies.get('role'));
        window.location.reload();
      })
      .catch((error) => {
        console.log(error);
        this.inValid = true;
      })
      console.log('hello world');
    }
  },
  created() {
    console.log(this.$route.meta.logout);
    if (VueCookies.get('token')) {
      if (VueCookies.get('role') == 'alumni') {
        this.$router.push('/profile');
      } else if (VueCookies.get('role') == 'ero') {
        this.$router.push('/ero');
      }
    }
    if (this.$route.meta.logout) {
      VueCookies.remove('token');
      VueCookies.remove('userId');
      VueCookies.remove('role');
      this.$router.push('/');
    }
  }
}
</script>