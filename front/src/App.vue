<template>
  <div>
    <nav class="w-full flex justify-between bg-[#fff] fixed top-0 z-50">
    <div class="w-[8rem] ml-20">
      <img src="@/assets/logo.jpg" alt="" srcset="">
    </div>
    <div class="flex justify-around items-center p-0 text-base mr-10">
      <router-link to="/" class="cursor-pointer hover:bg-[#0062ff] px-6 py-3 text-[#0062ff] hover:text-[#f8fafc] text-center font-medium flex flex-col">
        <fa icon="user" /> 
        <span>Profile</span>
      </router-link>
      <router-link to="/event" class="cursor-pointer hover:bg-[#0062ff] p-[10px] font-medium text-[#0062ff] px-6 py-3 hover:text-[#f8fafc] text-center flex flex-col">
      <fa icon='calendar-alt'/>
        Event
      </router-link>
      <router-link to="/signout" class="font-medium cursor-pointer hover:bg-[#0062ff] p-[10px] text-[#0062ff] px-6 py-3 hover:text-[#f8fafc] text-center flex flex-col">
        <fa icon="sign-out-alt" />
        Logout
      </router-link>
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

