<template>
  <div>
    <nav class="w-full flex justify-between bg-[#fff] fixed top-0 z-10 shadow-md" v-if="!$route.meta.hide">
    <div class="w-[8rem] ml-20">
      <img src="@/assets/logo.jpg" alt="" srcset="">
    </div>
    <div class="flex justify-around items-center p-0 text-base mr-10">
      <div v-for:="item in menuItems">
        <router-link :to="item.to" class="cursor-pointer hover:bg-[#0062ff] px-6 py-3 text-[#0062ff] hover:text-[#f8fafc] text-center font-medium flex flex-col">
          <fa  :icon="item.icon"/>  
          <span v-if="item.icon=='bell'" class="mt-[-0.5rem] ml-[2rem] absolute text-[10px] flex items-center justify-center w-4 h-4 rounded-full bg-[#e04] text-white">{{count}}</span>
          <span>{{item.title}}</span>
        </router-link>
      </div>
  </div>
    </nav>
    <div>
      <router-link to="/" class="cursor-pointer hover:bg-[#0062ff] p-[10px] w-[20%] text-[#0062ff] hover:text-[#f8fafc] text-center">
      </router-link>
    </div>
    <router-view/>
  </div>
</template>
<style>
nav a.router-link-exact-active {
  color: #fff;
  background-color: #0062ff;
}
</style>

<script>
  import axios from './axios-http'
  import VueCookies  from 'vue-cookies';
  export default {
    data() {
      return {
        alumniMenu: [
          {title: 'Profile', icon: 'user', to: '/profile'},
          {title: 'Event', icon: 'calendar-alt', to: '/event'},
          {title: 'Logout', icon: 'sign-out-alt', to: '/logout'},
        ],
        eroMenu: [
          {title: 'Alumni', icon: 'users', to: '/listAlumni'},
          {title: 'New request', icon: 'bell', to: '/newRequest'},
          {title: 'Logout', icon: 'sign-out-alt', to: '/logout'},
        ],
        adminMenu: [
          {title: 'Ero', icon: 'users', to: '/ero'},
          {title: 'Logout', icon: 'sign-out-alt', to: '/logout'},
        ],
        menuItems: [],
        count:0
      }
    },
    methods: {
      menuItem() {
        if (VueCookies.get('role') == 'ero') {
          this.menuItems = this.eroMenu;
          this.countRequest();
        } else if(VueCookies.get('role') == 'alumni') {
          this.menuItems = this.alumniMenu;
        } else if (VueCookies.get('role') == 'admin') {
          this.menuItems = this.adminMenu;
        }
      },
      countRequest(){
        axios.get('alumni').then((res)=>{
          let data =res.data.filter(alumniRequest=>alumniRequest.user.status=='padding')
          this.count = (data).length
        })
      }
    },
    created() {
      this.menuItem();
    }

  }
</script>

