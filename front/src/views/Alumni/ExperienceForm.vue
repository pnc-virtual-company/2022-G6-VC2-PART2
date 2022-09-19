<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white " @click = "turnOffInputOption">
        <template v-slot:header >
            <span v-if="type=='create'">Create Work Experoience</span>
            <span v-else-if="type=='edit'">Edit Work Experoience</span>
        </template>        
        <template v-slot:form >
            <!-- POSITION INPUT -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="position" @input="filterEperienceOption">
                <div v-if="filterOption.length==0 && isInputPosition" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">Don't have this position yet !</div>
                <ul class="shadow-md" v-if="isInputPosition">
                    <option v-for="(experience,index) of filterOption" :key="index" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" @click="selectPositionValue" :value="experience.position">{{experience.position}}</option>
                </ul>
                <BaseLabel for="floating_address"><fa icon="chalkboard-teacher" class="text-sky-500" /> Position</BaseLabel>
                <small class="text-red-600" v-if="isNoPostion"> You missed position*</small>
            </div>
            <!-- COMPANY INPUT -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="company" @input="filterEperienceCompany">
                <div v-if="filterCompany.length==0 && isInputCompany" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">Don't have this company yet !</div>
                <ul class="shadow-md" v-if="isInputCompany">
                    <option v-for="(experience,index) of filterCompany" :key="index" class="absolute bg-[#fff] hover:bg-[#1da1f2] hover:text-[#fff] cursor-pointer block py-2.5 px-3 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" @click="selectCompanyValue" :value="experience.company">{{experience.company}}</option>
                </ul>
                <BaseLabel for="floating_address"><fa icon="hotel" class="text-sky-500" /> Work Place</BaseLabel>
                <small class="text-red-600" v-if="isNoCompany"> You missed company*</small>
            </div>
            <!-- LINK COMPANY INPUT -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="url" placeholder=" " required class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="company_link">
                <BaseLabel for="floating_address"><fa icon="link" class="text-[#0062ff]" />companylink</BaseLabel>
            </div>
            <!-- START AND END YEAR INPUT -->
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="month" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="start_year">
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-[#0062ff]" /> Start_work</BaseLabel>
                    <small class="text-red-600" v-if="isNoStartYear"> You missed start years*</small>
                </div>
                <div class="relative z-0 mb-6 w-full group" v-if="!hideEndYear">
                    <input type="month" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="end_year" min="2020-08" >
                    <BaseLabel for="" class=""><fa icon="user" class="text-[#0062ff]" /> End_work</BaseLabel>
                    <small class="text-red-600" v-if="isNoEndYear"> You missed end years*</small>
                </div>
            </div>
            <!-- CHECK IS LEFT COMPANY INPUT -->
            <div class=" mb-6 w-full group">
                <input id="default-checkbox" type="checkbox" v-model='hideEndYear' class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                <label for="default-checkbox" class="disabled ml-2 text-sm cursor-pointer">Already left from this company?</label>
            </div>
            <!-- BUTTON GROUP INPUT -->
            <div class="p-2 text-center">
                <BaseButton type="submit" class="bg-[#0062ff] sm:w-auto ">
                    <span v-if="type=='create'" @click="newAlumniExperience">Add</span>
                    <span v-else-if="type=='edit'" @click="editExperience">Edit</span>
                </BaseButton>
                <BaseButton @click="hideForm" type="cancel" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
            </div>
        </template>
    </BaseForm>
</template>
<script>
import axios from "../../axios-http"
import BaseForm from '../../components/widget/BaseForm.vue';
import BaseButton from '../../components/widget/BaseButton.vue';
import BaseLabel from '../../components/widget/BaseSpanLabel.vue';
export default {
    components: {
        BaseForm,
        BaseButton,
        BaseLabel,
    },
    props: {
        type: String,
        experience:Object,
    },
    data(){
        return {
            hideEndYear: true,
            position:'',
            company:'',
            start_year:'',
            end_year:'',
            company_link:'',
            isNoPostion:false,
            isNoCompany: false,
            isNoStartYear:false,
            isNoLinkCompany:false,
            years:'',
            month:'',
            week:'',
            duration:null,
            AllalumniExperiences:[],
            isInputPosition:false,
            isInputCompany:false,
            filterOption:[],
            filterCompany:[]
        }
    },
    emits: ['hideForm', 'edit', 'addAlumniExperience'],
    methods: {
        turnOffInputOption(){
            this.isInputPosition=false
            this.isInputCompany=false
        },
        // ================= SELECT VELUE OPTION =================
        selectPositionValue(e){
            this.position=e.target.value
            this.isInputPosition=false
        },
        selectCompanyValue(e){
            this.isInputCompany=false
            this.company=e.target.value
        },
        // ================== HIDE EXPERIENCE FORM =================
        hideForm() {
            this.$emit('hideForm', false);
        },
        //=================== SET DATA TO FORM INPUT =================
        showDataInForm() {
            this.position = this.experience.position;
            this.company = this.experience.company;
            this.start_year = this.experience.start_year;
            this.end_year = this.experience.end_year;
            this.company_link= this.experience.company_link;
            console.log('hideForm');
            console.log(this.company);
        },
        //=================== FILTER EXPERIAN OPTIONS =================
        filterEperienceOption(e){
            this.isInputPosition=true;
            this.filterOption=this.AllalumniExperiences.filter(experience=>experience.position.toLowerCase().includes(e.target.value.toLowerCase()))
        },
        //=================== FILTER EXPERIAN COMPANY =================
        filterEperienceCompany(e){
            this.isInputCompany=true;
            console.log(this.AllalumniExperiences)
            this.filterCompany=this.AllalumniExperiences.filter(experience=>experience.company.toLowerCase().includes(e.target.value.toLowerCase()))
        },
        //=================== CALCULATE DURATION =================
        calculateDuration() {
            let duration=parseInt(new Date(this.end_year) - new Date(this.start_year))/(1000*60*60*24);
            if (duration>=365){
                this.years=parseInt(duration/365)+'years'
                this.duration=this.years
            }
            else if (duration>=30){
                this.month=parseInt(duration/30)+'month'
                this.duration=this.month
            }
            else{
                this.week=parseInt(duration/7)+'week'
                this.duration=this.week
            }
        },
        //=================== add new experience emit  and validate create alumni experience=================
        newAlumniExperience(){
            if (this.position != '' && this.company != '' && this.start_year != '') {
                this.hideForm();
                this.calculateDuration();
                this.$emit('addAlumniExperience',this.position,this.company,this.start_year,this.end_year, this.company_link,this.duration);
            } 
            else {
                if(this.position == ''){
                    this.isNoPostion = !this.isNoPostion;
                }
                if(this.company == ''){
                    this.isNoCompany = !this.isNoCompany;
                }
                if(this.start_year == ''){
                    this.isNoStartYear = !this.isNoStartYear;
                }
                if(this.company_link == ''){
                    this.isNoLinkCompany = !this.isNoLinkCompany;
                }
            }

        },
         //=================== get alumni experience ===================
         getAllData() {
          axios.get('alumniWork').then((res) => {
            this.AllalumniExperiences = res.data;
          });
        },
        //=================== edit experience emit =================
        editExperience(){
            this.calculateDuration();
            let experience =
            {
                id: this.experience.id, 
                alumni_id: this.experience.alumni_id,
                position: this.position,
                company: this.company,
                start_year: this.start_year,
                end_year: this.end_year,
                company_link: this.company_link,
                duration: this.duration,
            }
            //////validate edit alumni experience/////
            if (this.position != '' && this.company != '' && this.start_year != '' && this.end_year != '') {
                this.hideForm();
                this.$emit('edit',experience);
            } 
            else {
                if(this.position == ''){
                    this.isNoPostion = !this.isNoPostion;
                }
                if(this.company == ''){
                    this.isNoCompany = !this.isNoCompany;
                }
                if(this.start_year == ''){
                    this.isNoStartYear = !this.isNoStartYear;
                }
                if(this.end_year == ''){
                    this.isNoEndYear = !this.isNoEndYear;
                }
                if(this.company_link == ''){
                    this.isNoLinkCompany = !this.isNoLinkCompany;
                }
            }
        },
    },
    mounted(){
        this.getAllData()
    },
    created(){
        if (this.type   == 'edit'){
            this.showDataInForm();
        }
    }
}
</script>