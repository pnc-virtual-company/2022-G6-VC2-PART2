<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">
        <template v-slot:header >
            <span v-if="type=='create'">Create Work Experoience</span>
            <span v-else-if="type=='edit'">Edit Work Experoience</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="position">
                <BaseLabel for="floating_address"><fa icon="chalkboard-teacher" class="text-sky-500" /> Position</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="company">
                <BaseLabel for="floating_address"><fa icon="hotel" class="text-sky-500" /> Work Place</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="company_link">
                <BaseLabel for="floating_address"><fa icon="link" class="text-sky-500" />companylink</BaseLabel>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="date" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="start_year">
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-sky-500" /> Start_work</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="date" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="end_year">
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-sky-500" /> End_work</BaseLabel>
                </div>
            </div>
            <div class="p-2 text-center">
                <BaseButton type="submit" class="bg-[#1da1f2] sm:w-auto ">
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
            position:'',
            company:'',
            start_year:'',
            end_year:'',
            company_link:'',
            currentDate:''
        }
    },
    emits: ['hideForm', 'edit', 'addAlumniExperience'],
    methods: {
        // ===============covert date funtion ===========================
        convertDate(date){
            let newDate = new Date(date);
            let day = newDate.getDate();
            if (day<10){
                day = '0'+day;
            }
            let month= newDate.getMonth()+1;
            if (month<10){
                month = '0'+month;
            }
            let year= newDate.getFullYear();
            let currentDate=year+'-'+month+'-'+day
            return currentDate
        },

        hideForm() {
            this.$emit('hideForm', false);
        },
        showDataInForm() {
            this.position = this.experience.position;
            this.company = this.experience.company;
            this.start_year = this.experience.start_year;
            this.end_year = this.experience.end_year;
            console.log('hideForm');
            console.log(this.company);
        },
        //=================== add new experience emit =================
        newAlumniExperience(){
            this.$emit('addAlumniExperience',this.position,this.company,this.start_year,this.end_year,this.company_link);
        },
        //=================== edit experience emit =================
        editExperience(){
            let experience =
            {
                id: this.experience.id, 
                alumni_id: this.experience.alumni_id,
                position: this.position,
                company: this.company,
                start_year: this.start_year,
                end_year: this.end_year,
                company_link: this.company_link

            }
            this.$emit('edit', experience);
            this.hideForm();
        },
    },
    created(){
        if (this.type   == 'edit'){
            this.showDataInForm();
        }
    }
}
</script>