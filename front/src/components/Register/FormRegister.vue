<template>
  <section class="mr-[4%]">
      <div class="flex justify-center items-center">
        <div class="md:w-8/12 lg:w-6/12 md:mb-0 p-[4%]">
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="w-full"
            alt="Phone image"
          />
        </div>
        <div class="lg:mr-[1%] mr-[5%] p-1 w-[35%] bg-white border rounded">
          <form @submit.prevent="register" >
            <div
              class="w-full mb-10 flex justify-center text-black font-medium"
            >
              Create New Account
            </div>
            <div class="grid grid-cols-2 gap-2 w-[95%] m-auto">
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="First name"
                  v-model="firstName"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Last name"
                  v-model="lastName"
                />
              </div>
             
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Phone"
                  v-model="phone"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Telegram"
                  v-model="telegram"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Batch"
                  v-model="batch"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Major"
                  v-model="major"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Date Of Birth"
                  v-model="dateOfBirth"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Place Of Birth"
                  v-model="placeOfBirth"
                />
              </div>
              <div class="mb-4">
                  <select class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none" name="" id="" v-model="gender">
                      <option value="male" selected>Male</option>
                      <option value="female">Female</option>
                    </select>
              </div>
              <div class="mb-4">
                <input
                  type="password"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Password"
                  v-model="password"
                />
              </div>
            </div>
            <div class="mb-6 m-auto w-[95%]">
              <input
                type="email"
                class="w-full px-3 py-1.5 border rounded focus:border-blue-600 focus:outline-none"
                placeholder="Email address"
                v-model="email"
              />
            </div>
            <div class="mb-6 m-auto w-[95%]">
              <input
                type="text"
                class="w-full px-3 py-1.5 border rounded focus:border-blue-600 focus:outline-none"
                placeholder="Address"
                v-model="address"
              />
            </div>
            <div class="mb-3 flex justify-between m-auto w-[90%]">
              <button
              type="submit"
              class="flex justify-center m-auto bg-red-500 w-[30%] text-white py-1 border rounded ml-[10%]"
              @click="hideRegister"
            >
              Back
            </button>
              <button
              type="submit"
              class="flex justify-center m-auto bg-blue-500 text-white w-[30%] py-1 border rounded ml-[10%]"
            >
              CREATE
            </button>
            </div>
            
          </form>
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
      firstName:'',
      lastName:'',
      email:'',
      password:'',
      gender: '',
      phone: '',
      major: '',
      batch: '',
      telegram: '',
      dateOfBirth: '',
      placeOfBirth: '',
      address: '',
    }
  },
  methods:{
    register(){
      let newUser = {firstName:this.firstName,lastName:this.lastName,email:this.email,password:this.password,role:'alumni'}
      axios.post('user',newUser).then((response) =>{
        console.log(response.data);
      })
        axios.post('alumni',newUser).then((res)=>{
        router.push('/profile');
        console.log(res);
      })
      this.$emit("create-user", newUser);
        this.firstName="";
        this.lastName="";
        this.password="";
        this.gender="";
        this.phone="";
        this.major="";
        this.batch="";
        this.telegram="";
        this.deteOfBirth="";
        this.placeOfBirth="";
        this.email="";
        this.address=""
      
    },
    checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        this.nameState = valid
        return valid
      },
      hideRegister(){
        this.$emit('hideRegister',false)
      },
  },
  }
  </script>
