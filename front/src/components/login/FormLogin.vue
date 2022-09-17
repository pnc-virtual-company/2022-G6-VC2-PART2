<template>
  <section class="h-screen">
    <div class="container px-6 py-12 h-full">
      <div class="flex justify-center items-center flex-wrap h-full g-6 text-white-800">
        <div class="md:w-3/12 lg:w-5/12 mb-12 md:mb-0">
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="w-full"
            alt="Phone image"
          />
        </div>
        <div class="bg-white rounded-lg h-[50vh] lg:w-3/12 lg:ml-5 mb-[5%]">
          <form @submit.prevent="login">
            <!-- Email input -->
            <div class="mb-10 flex justify-center items-center  py-3 bg-blue-600 text-white font-medium text-lg leading-snug uppercase rounded shadow-md focus:shadow-lg focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-full">
              LOGIN
            </div>
            <div class="mb-4">
              <input
                type="text"
                class="form-control block w-45 m-auto px-4 py-2 text-xl border border-solid rounded focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Email address"
                v-model="email"
              />
            </div>
            <!-- Password input -->
            <div class="mb-3">
              <input
                type="password"
                class="form-control block w-45 m-auto px-4 py-2 text-xl border border-solid rounded focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Password"
                v-model="password"
              />
            </div>
            <div class="flex justify-between items-center">
              <a
                href="#!"
                class="px-5 center text-blue-600 hover:text-blue-700 active:text-blue-800"
                >Forgot password?</a
              >
            </div>
            <!-- Submit button -->
            <button
              type="submit"
              class="bg-blue-600 text-white hover:bg-blue-700 form-control block w-[85%] m-auto py-1.5 text-xl border border-solid rounded focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
            >
              Sign in
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import router from '@/router'
export default {
data(){
  return{
    url: "http://127.0.0.1:8000/api/",
    email:'',
    password:'',
    cookie:'',
  }
},
methods:{
  login(){
    let user = {email:this.email,password:this.password}
    axios.post(this.url+'loginUser',user).then((res)=>{
      this.cookie = res.data.token
      router.push('/profile');
      console.log(res);
    })
  }
},
created() {
   this.$cookies.set("userCookies", this.cookie,'7d')
}
}
</script>