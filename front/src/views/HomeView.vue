<template>
  <div class="home flex justify-center">
    <img alt="Vue logo" src="../assets/logo.png" width="100">
    <HelloWorld msg="WELCOME TO VIRTUAL COMPANY II 2022"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld
  }
}
</script>
