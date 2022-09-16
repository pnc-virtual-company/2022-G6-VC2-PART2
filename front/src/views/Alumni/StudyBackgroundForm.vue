<template>   
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">
        <template v-slot:header >
            <span>Add Your Study Background</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="school">
                <BaseLabel for="floating_address"><fa icon="hotel" class="text-sky-500" /> School Name</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="major">
                <BaseLabel for="floating_major_name"><fa icon="user-graduate" class="text-sky-500" /> Major</BaseLabel>
            </div>    
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" min="1900" max="2099" step="1" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="start_year" />
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-sky-500" /> Start_year</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" min="1900" max="2099" step="1" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="end_year" />
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-sky-500" /> End_year</BaseLabel>
                </div>
            </div>        
            <div class="p-3 text-center">
                <BaseButton type="submit" class="bg-[#1da1f2] sm:w-auto " @click="sendData">Add</BaseButton>
                <BaseButton @click="hide" type="cancel" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
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
    props:{alumni_key:String},
    data(){
        return{
            school:'',
            major:'',
            start_year:'',
            end_year:'',
            alumni_id:this.alumni_key,
        }
    },
    methods: {
        hide(){
            this.$emit('showForm',false)
        },
        sendData(){
            let study = {school:this.school,major:this.major,start_year:this.start_year,end_year:this.end_year,alumni_id:this.alumni_id}
            this.$emit('createStudy',study)
        }
    },

}
</script>