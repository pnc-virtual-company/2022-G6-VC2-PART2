<template>
  <div class="bg-[#fff] mt-3 p-5 rounded-lg shadow-xl">
    <div class="w-[100%] flex m-auto">
        <h1 class="w-[85%] font-bold text-[#0062ff] text-2xl ">Skill</h1>
        <div class="w-[12%] flex justify-between">
          <fa icon="trash-alt" class="fa fa-trash text-[#e04]  text-[1.2rem] bg-[#ddd] ml-[15%] p-2 rounded-full cursor-pointer" @click="showXmark = ! showXmark" />
          <fa icon="plus" class=" text-[1.2rem]  text-black bg-[#ddd] p-2 rounded-full cursor-pointer" @click="sendToShowSkillForm" />
        </div>
    </div>
    <div class="w-[100%] m-auto">
        <div class="w-[90%] flex flex-wrap">
            <h3 class="bg-[#ddd] rounded-full m-[5px] px-5 py-1 capitalize flex justify-end items-center" v-for="(skill,index) of skills" :key="index">{{skill.title}} <fa @click="deleteSkill(skill.id)" v-if="showXmark" icon="xmark" class="text-[#7a7979] bg-[#f8f6f6] px-2 py-1 rounded-full ml-[15px] cursor-pointer"/></h3>
          </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["skills"],
  data(){
      return{
        showXmark:false,
      }
  },
  emits: ['toShowSkillForm'],
  methods:{
    sendToShowSkillForm(){
      this.$emit('toShowSkillForm',true)
    },
    deleteSkill(id){
      this.$emit('deleteAlumniSkill', id);
    }
  },
}
</script>

<style>

</style>