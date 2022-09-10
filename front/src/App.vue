<template>
   <nav>
        <div class="left flex justify-between space-y-3 m-[20px]">
          <div class="logo w-[10%]">
            <img src="@/assets/pnc.jpg" alt="" srcset="">
          </div>
          <div class="flexs justify-between space-y-10 space-x-20">
          <router-link class=" hover:bg-white border-teal-500 text-sm border-2 py-1 px-3 rounded" to="/">PROFILE</router-link> 
          <router-link to="/emploment">EMPLOMENT</router-link>
          <router-link to="/event">EVENT</router-link>
          <router-link to="/signout" class="logout">LOGOUT</router-link>
        </div>  
        </div>
      </nav>
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: green;
}
</style>
