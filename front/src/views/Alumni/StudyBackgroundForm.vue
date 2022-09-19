<template>   
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white " @click="stopInput">
        <template v-slot:header >
            <span v-if="type=='create'">Add Your Study Background</span>
            <span v-if="type=='edit'">Edit Your Study Background</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="school" @input="filterSchool">
                <div v-if="schoolFilter.length==0 && isInputSchool" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">Don't have this position yet !</div>
                <ul class="shadow-md" v-if="isInputSchool">
                    <option v-for="(experience,index) of schoolFilter" :key="index" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" @click="selectSchoolValue" :value="experience.school">{{experience.school}}</option>
                </ul>
                <BaseLabel for="floating_address"><fa icon="hotel" class="text-sky-500" /> School Name</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="major" @input="filterMajor">
                <div v-if="majorFilter.length==0 && isInputMajor" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">Don't have this position yet !</div>
                <ul class="shadow-md" v-if="isInputMajor">
                    <option v-for="(experience,index) of majorFilter" :key="index" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" @click="selectMajorValue" :value="experience.major">{{experience.major}}</option>
                </ul>
                <BaseLabel for="floating_major_name"><fa icon="user-graduate" class="text-sky-500" /> Major</BaseLabel>
            </div>    
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" min="1900" max="2099" step="1" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="start_year" />
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-[#0062ff]" /> Start_year</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" min="1900" max="2099" step="1" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="end_year" />
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-[#0062ff]" /> End_year</BaseLabel>
                </div>
            </div>        
            <div class="p-3 text-center">
                <BaseButton v-if="type=='create'" type="submit" class="bg-[#1da1f2] sm:w-auto " @click="sendData">Add</BaseButton>
                <BaseButton v-if="type=='edit'" type="submit" class="bg-[#0062ff] sm:w-auto " @click="editStudyBackground(studybackground.id)">Edit</BaseButton>
                <BaseButton @click="hide" type="cancel" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
            </div>
            
        </template>
    </BaseForm>
</template>
<script>
import axios from 'axios';
import BaseForm from '../../components/widget/BaseForm.vue'
import BaseButton from '../../components/widget/BaseButton.vue'
import BaseLabel from '../../components/widget/BaseSpanLabel.vue'

export default {
    components: {
        BaseForm,
        BaseButton,
        BaseLabel,
    },
    props:{alumni_key:String,type:String,studybackground:Object},
    data(){
        return{
            url: process.env.VUE_APP_API_URL,
            school:'',
            major:'',
            start_year:'',
            end_year:'',
            alumni_id:this.alumni_key,
            allStudyBackground:[],
            schoolFilter:[],
            majorFilter:[],
            isInputSchool:false,
            isInputMajor:false
        }
    },
    methods: {
        stopInput(){
            this.isInputSchool=false;
        },
        selectSchoolValue(e){
            this.school=e.target.value;
            this.isInputSchool=false;
        },  
        selectMajorValue(e){
            this.major=e.target.value;
            this.isInputMajor=false;
        },  
        //============== GET ALL STUDY BACKGROUND =========================
        getAllStudybackground(){
            axios.get(this.url+'studyBackground').then((res)=>{
               this.allStudyBackground=res.data;
               console.log(this.allStudyBackground)
            })  
        },
        // ============== FILTER SCHOOL =============
        filterSchool(e){
            this.isInputSchool=true;
            this.schoolFilter=this.allStudyBackground.filter(studyBackground=>studyBackground.school.toLowerCase().includes(e.target.value));
            console.log(this.schoolFilter)
        },
        filterMajor(e){
            this.isInputMajor=true;
            this.majorFilter=this.allStudyBackground.filter(studyBackground=>studyBackground.major.toLowerCase().includes(e.target.value));
            console.log(this.schoolFilter)
        },
        hide(){
            this.$emit('showForm',false)
        },
        showDataInForm() {
            this.school = this.studybackground.school;
            this.major = this.studybackground.major;
            this.start_year = this.studybackground.start_year;
            this.end_year = this.studybackground.end_year;
            this.alumni_id= this.studybackground.alumni_id;
            console.log('hideForm');
            console.log(this.company);
        },
        //=============================== add study background =================================
        sendData(){
            let study = {school:this.school,major:this.major,start_year:this.start_year,end_year:this.end_year,alumni_id:this.alumni_id}
            this.$emit('createStudy',study)
        },
        //=============================== update study background =================================
        editStudyBackground(id){
           let studyBackground = {school:this.school,major:this.major,start_year:this.start_year,end_year:this.end_year,alumni_id:this.alumni_id}
           this.$emit('updateStudyBackground',studyBackground,id)
        }
    },
    mounted(){
        this.getAllStudybackground()
    },
    created(){
        if (this.type   == 'edit'){
            this.showDataInForm();
        }
    },
  
}
</script>