<template>   
    <BaseForm class="relative mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">  
        <template v-slot:header>
             <span class="text-md">Add new skills</span>
        </template>   
        <template v-slot:form>
            <div class="w-full bg-white font-medium" v-if="!isAddSkill">
                <span class="bg-white">Title:</span>
                <div class="w-full flex items-center border-2 rounded-md max-h-12">
                    <div class="flex justify-end items-center ml-3 bg-[#e2e2e2] h-[75%] rounded-2xl px-3" v-if="selectedSkill != null">
                        <span class="font-normal">{{ selectedSkill.title }}</span>
                        <fa icon="xmark" class="cursor-pointer p-2 text-[#e04]" @click="selectedSkill = null" />
                    </div>
                    <input 
                        @focus="isFocusCompany = true; isShowSkill = true" @blur="isFocusCompany = false;"
                        v-model="title" type="text" :placeholder="[[ placeholder ]]"
                        class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                </div>
                <div v-if="isShowSkill" class="w-full items-center border-2 rounded-md max-h-40	bg-white overflow-auto">
                    <div @click="isShowSkill = false; isAddSkill = true" class="flex items-center py-2 pl-6 hover:bg-[#d9eafd]">
                        <fa icon="plus" class="text-[#0062ff] p-1 w-[15px] mr-3 h-[15px] rounded-full border border-[#0062ff]"/>
                        <p class="text-[blue]">Add new skill</p>
                    </div>
                    <div v-for:="skill of filterSkill"
                        @click="selectedSkill = skill; isShowSkill = false;" class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                        <div class="flex flex-col">
                            <p class="font-medium">{{ skill.title }}</p>
                        </div>
                    </div>
                </div>
                <small class="text-red-600" v-if="selectedSkill == null">Skill is required!*</small>
            </div>
            <div v-else>
                <input type="text" class="border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none" placeholder="Skill title" v-model="skillTitle" required>
                <small v-if="this.skillTitle == ''" class="text-[#e04]">Skill title is require* </small>
            </div>
            <div class="flex justify-end mt-2">
                <button @click="hidSkillform" class="text-red-500 mr-2 cursor-pointer font-medium"> Cancel </button>
                <button type="submit" v-if="isAddSkill" @click="createSkill" class="text-[#0062ff] ml-2 cursor-pointer font-medium">Create</button>
                <button type="submit" v-else @click="addSkill" class="text-[#0062ff] ml-2 cursor-pointer font-medium">Add</button>
            </div>
        </template>
    </BaseForm>
</template>
<script>
import axios from "../../axios-http"
import BaseForm from '../../components/widget/BaseForm.vue'
export default {
    components: {
        BaseForm,
    },
    data(){
        return{
            skillTitle:'',
            title: '',
            selectedPerson:'',
            skills:[],
            selectedSkill: null,
            isShowSkill: false,
            isAddSkill: false,
        }
    },
    mounted(){
        this.getAllSkill()
    },
    methods: {
       
        hidSkillform(){
            this.$emit('hidFormSkill',false)
        },
        addSkill(){
            this.$emit('addSkill', this.selectedSkill.title, this.skills);
        },
        createSkill() {
            if (this.skillTitle != '') {
                axios.post('skill', {title: this.skillTitle});
                this.hidSkillform();
            }
        },  
        getAllSkill(){
            axios.get('skill').then((res)=>{
                this.skills=res.data;
            })
        },
    },
    computed: {
        filterSkill() {
            let data = this.skills;
            if (this.title != '') {
                data = this.skills.filter(skill => (skill.title.includes(this.title)));
            }
            return data;
        }
    }
}
</script>