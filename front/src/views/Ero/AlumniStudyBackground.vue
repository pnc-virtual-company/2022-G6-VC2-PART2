<template>
<div class="mt-[20px] flex" v-for="(background,index) of studyBackground" :key="index">
    <div class="w-[10%] ml-[20px]">
        <img :src="background.profile" alt="" class="rounded-full">
    </div>
    <div class="ml-[20px]">
        <div>
         <BaseLabel for="floating_email" class="font-bold" >{{background.major}}</BaseLabel>
        </div>
        <div>
         <BaseLabel for="floating_email" class="text-[0.9rem]">{{background.school}}</BaseLabel>
        </div>
        <BaseLabel for="floating_email" class="text-[0.9rem]">{{background.start_year}} - {{background.end_year}}</BaseLabel>
    </div>
</div>
</template>

<script>
export default {
  props: {
    studyBackground:Object
  },
  mounted(){
    console.log(this.studyBackground)
  }
}
</script>

<style>

</style>