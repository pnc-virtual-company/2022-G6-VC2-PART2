<template>
  <div class="bg-[#fff] w-[60%] m-auto p-5 rounded-lg shadow-xl">
    <div class="w-[100%] flex m-auto">
        <h1 class="w-[85%] font-bold text-[#0062ff] text-2xl">Skill</h1>
        <div class="w-[15%] flex justify-between">
            <fa icon="plus" class="ml-[15%] w-[1.5rem] h-[1.5rem] text-black bg-[#ddd] p-2 rounded-full " @click="sendToShowSkillForm" />
            <fa icon="pencil" class="w-[1.5rem] h-[1.5rem] text-[#0062ff] bg-[#ddd] p-2 rounded-full cursor-pointer" />
        </div>
    </div>
    <div class="w-[100%] m-auto">
        <div class="w-[90%] flex flex-wrap">
            <h3 class="bg-[#ddd] p-[5px] rounded-full m-[5px] px-5 py-1 capitalize" v-for="(skill,index) of skills" :key="index">{{skill.title}}</h3>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["skills"],
  emits: ['toShowSkillForm'],
  methods:{
    sendToShowSkillForm(){
      this.$emit('toShowSkillForm',true)
    }
  }
}
</script>

<style>

</style>