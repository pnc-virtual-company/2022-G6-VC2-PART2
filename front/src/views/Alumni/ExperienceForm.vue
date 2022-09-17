<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">
        <template v-slot:header >
            <span v-if="type=='create'">Create Work Experoience</span>
            <span v-else-if="type=='edit'">Edit Work Experoience</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="position">
                <BaseLabel for="floating_address"><fa icon="chalkboard-teacher" class="text-[#0062ff]" /> Position</BaseLabel>
                <small class="text-red-600" v-if="isNoPostion"> You missed position*</small>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="company">
                <BaseLabel for="floating_address"><fa icon="hotel" class="text-[#0062ff]" /> Work Place</BaseLabel>
                <small class="text-red-600" v-if="isNoCompany"> You missed company*</small>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="company_link">
                <BaseLabel for="floating_address"><fa icon="link" class="text-[#0062ff]" />companylink</BaseLabel>
                <small class="text-red-600" v-if="isNoLinkCompany"> You missed link company*</small>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="month" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="start_year">
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-[#0062ff]" /> Start_work</BaseLabel>
                    <small class="text-red-600" v-if="isNoStartYear"> You missed start years*</small>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="month" :disabled="!hideEndYear" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="end_year" min="2020-08" >
                    <BaseLabel for="" class=""><fa icon="user" class="text-[#0062ff]" /> End_work</BaseLabel>
                    <small class="text-red-600" v-if="isNoEndYear"> You missed end years*</small>
                </div>
            </div>
            <div class=" mb-6 w-full group">
                <input id="default-checkbox" type="checkbox" v-model='hideEndYear' class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                <label for="default-checkbox" class="disabled ml-2 text-sm cursor-pointer">Already left from this company?</label>
            </div>
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
        experience:Object
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
        }
    },
    emits: ['hideForm', 'edit', 'addAlumniExperience'],
    methods: {
        hideForm() {
            this.$emit('hideForm', false);
        },
        showDataInForm() {
            this.position = this.experience.position;
            this.company = this.experience.company;
            this.start_year = this.experience.start_year;
            this.end_year = this.experience.end_year;
            this.company_link= this.experience.company_link;
            console.log('hideForm');
            console.log(this.company);
        },
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
            if (this.position != '' && this.company != '' && this.start_year != '' && this.company_link != '') {              
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
            if (this.position != '' && this.company != '' && this.start_year != '' && this.end_year != '' && this.company_link != '') {
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
    created(){
        if (this.type   == 'edit'){
            this.showDataInForm();
        }
    }
}
</script>