<template>
  <div>
    <nav class="w-full flex justify-between items-center shadow-md bg-white">
           <div class="w-[13%] ml-[20px]">
             <img src="@/assets/logo.jpg" alt="" srcset="">
           </div>
           <div class="w-[40%] flex justify-around">
              <router-link to="/" class="cursor-pointer hover:bg-sky-500/50 p-[10px] w-[20%] text-[#06b6d4] hover:text-[#f8fafc] text-center">
                <svg class="w-7 h-7 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <label class="text-[0.8rem]">PROFILE</label>        
              </router-link>
              <router-link  to="/emploment" class="cursor-pointer hover:bg-sky-500/50 p-[10px] w-[20%] text-[#06b6d4] hover:text-[#f8fafc] text-center">
                <svg class="w-7 h-7 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <label class="text-[0.8rem]">EMPLOMENT</label>
              </router-link>
              <router-link to="/event" class="cursor-pointer hover:bg-sky-500/50 p-[10px] w-[20%] text-[#06b6d4] hover:text-[#f8fafc] text-center">
                <svg class="w-7 h-7 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <label class="text-[0.8rem]">EVENT</label>
              </router-link>
              <router-link to="/signout" class="cursor-pointer hover:bg-sky-500/50 p-[10px] w-[20%] text-[#06b6d4] hover:text-[#f8fafc] text-center">
                <svg class="w-7 h-7 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <label class="text-[0.8rem]">LOGOUT</label>
              </router-link>
          </div>
    </nav>
   <router-view/>
  </div>
</template>

<style>
nav a.router-link-exact-active {
  background: #34B3F1;
  color: #fff;
}
</style>

