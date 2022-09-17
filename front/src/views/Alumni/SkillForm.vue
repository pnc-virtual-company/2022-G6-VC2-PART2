<template>   
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">
        <template v-slot:header >
            <span>Add your skill</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="skill_title">
                <BaseLabel for="floating_address"><fa icon="user-cog" class="text-2xl capitalize mr-3 text-[#0062ff]" /> Skill</BaseLabel>
            </div>
            <div class="p-2 text-center">
                <BaseButton type="submit" class="bg-[#0062ff] sm:w-auto ">
                    <span @click="addSkill">Add</span>
                </BaseButton>
                <BaseButton @click="hidSkillform" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
            </div>
        </template>
    </BaseForm>
</template>
<script>
import BaseForm from '../../components/widget/BaseForm.vue'
import BaseButton from '../../components/widget/BaseButton.vue'
import BaseLabel from '../../components/widget/BaseSpanLabel.vue'
export default {
    components: {
        BaseForm,
        BaseButton,
        BaseLabel,
    },
    data(){
        return{
            skill_title:'',
        }
    },
    methods: {
        hidSkillform(){
            this.$emit('hidFormSkill',false)
        },
        addSkill(){
            this.$emit('addSkill', this.skill_title);
        }
    },
}
</script>