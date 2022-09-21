<template>
<div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 w-[50%]">
    <div class=" w-[100%] mx-auto ">
        <div class="ml-[10px] w-[98%] flex justify-between">
            <div class="w-[13%]">
                <img src="@/assets/boy.jpg" alt="" class="rounded-full">
            </div>
            <fa :icon="['fas', 'xmark']" class="text-[gray] cursor-pointer" @click="hideAlumniDetail"/>
        </div>
        <div class="w-[30%] ml-[20px] mt-[10px]">
            <h1 class="text-[1.1rem] font-bold">Lida Thy</h1>
        </div>
        <div class="ml-[20px] w-[94%] mt-[10px]">
            <div class="flex justify-between">
                <div class="w-[70%]">
                    <BaseLabel for="floating_email"><fa :icon="['fas', 'graduation-cap']" class="text-sky-500" />2022 web B</BaseLabel>
                    <div class="mt-[10px]">
                        <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-sky-500" /> lida.thy@student.passerellesnumeriques.org</BaseLabel>
                    </div>
                </div>
                <div>
                    <div>
                        <BaseLabel for="floating_phone"><fa :icon="['fas', 'phone']" class="text-sky-500" /> 081361808</BaseLabel>
                    </div>
                    <div class="mt-[10px]">
                        <BaseLabel for="floating_address"><fa icon="paper-plane" class="text-sky-500" /> 081361808</BaseLabel>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-[25px] w-[95%] mx-auto ">
        <hr class="border-b-[0px] border-gray-500">
    </div>
    <div class="w-[100%] mx-auto">
        <div class="w-[100%] ml-[20px] mt-[10px]">
            <h1 class="w-[85%] font-bold text-[#0062ff] text-[1.1rem] ">Skill</h1>
            <div class="w-[90%] flex flex-wrap">
                <h1 class="bg-[#ddd] rounded-full m-[5px] px-5 py-1 capitalize flex justify-end items-center mt-[15px]">CSS</h1>
                <h1 class="bg-[#ddd] rounded-full m-[5px] px-5 py-1 capitalize flex justify-end items-center mt-[15px]">HTML</h1>
                <h1 class="bg-[#ddd] rounded-full m-[5px] px-5 py-1 capitalize flex justify-end items-center mt-[15px]">Drinker</h1>
            </div>
        </div>
    </div>
    <div class="mt-[25px] w-[95%] mx-auto ">
        <hr class="border-b-[0px] border-gray-500">
    </div>
    <div class="w-[100%] mx-auto mt-[10px]">
        <div class="w-[100%] ml-[20px]">
            <div class="w-[50%] flex">
                <h1 class="w-[50%] font-bold text-[#0062ff] text-[1.1rem] cursor-pointer" @click="isWorkExperience=true" :class="{'underline':isWorkExperience}">Work Experience</h1>
                <h1 class="w-[50%] font-bold text-[#0062ff] text-[1.1rem] cursor-pointer" @click="isWorkExperience=false" :class="{'underline':!isWorkExperience}">Study Background</h1>
            </div>
        </div>
        <WorkExperience v-if="isWorkExperience"/>
        <StudyBackground v-if="!isWorkExperience"/>
    </div>
</div>
</template>
<script>
import WorkExperience from "./AlumniWorkExperience.vue"
import StudyBackground from "./AlumniStudyBackground.vue"
export default {
    components:{
        WorkExperience,
        StudyBackground,
    },
    props:['AlumniDetail'],
    data(){
        return{
            isWorkExperience:true,
            show: false,
        }
    },
    methods:{
        hideAlumniDetail(){
            this.$emit('hideAlumniDetail',false);
        }
    }
}   
</script>

<style>

</style>