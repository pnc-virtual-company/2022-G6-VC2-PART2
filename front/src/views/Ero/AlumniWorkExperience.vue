<template>
<div class="mt-[20px] flex" v-for="(work,index) of workExperience" :key="index">
    <div class="w-[10%] ml-[20px]">
        <img :src="work.profile" alt="" class="rounded-full">
    </div>
    <div class="ml-[20px]" >
        <div>
            <BaseLabel for="floating_email" class="font-bold">{{work.position}}</BaseLabel>
        </div>
        <div>
            <BaseLabel for="floating_email" class="text-[0.9rem]">{{work.company}}</BaseLabel>
        </div>
         <BaseLabel for="floating_email" class="text-[0.9rem]">{{work.start_year}} - {{work.end_year}}</BaseLabel>
    </div>
</div>
</template>

<script>
export default {
    props:{
    workExperience: Object
 }
}
</script>

<style>

</style>