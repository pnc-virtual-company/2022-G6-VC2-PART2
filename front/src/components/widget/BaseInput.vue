<template>
  <input  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" equired  :type="type" :placeholder="placeholder" v-model="myInput">
 
</template>

<script>

export default {
    props:{
        type:String,
        placeholder:String,
    },
    data(){
      return {
        myInput:''
      }
    },
    watch:{
      myInput(value){
        this.$emit('inputData',value)
      }
    }
}
</script>