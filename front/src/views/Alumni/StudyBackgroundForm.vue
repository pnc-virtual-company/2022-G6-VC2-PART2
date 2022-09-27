<template>   
    <BaseForm class="relative mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white " @click="stopInput">
        <template v-slot:header >
            <span v-if="type=='create'">Add Your Study Background</span>
            <span v-if="type=='edit'">Edit Your Study Background</span>
        </template>        
        <template v-slot:form>
            <div v-if="!isAddSchool">
                <div class="w-full bg-white font-medium" >
                    <span class="bg-white">School name:</span>
                    <div class="w-full flex items-center border-2 rounded-md max-h-12">
                        <div class="flex justify-end items-center ml-3 bg-[#e2e2e2] h-[75%] rounded-2xl px-3" v-if="selectedSchool != null">
                            <span class="font-normal">{{ selectedSchool.school }}</span>
                            <fa icon="xmark" class="cursor-pointer p-2 text-[#e04]" @click="selectedSchool = null" />
                        </div>
                        <input 
                            @focus="isShowSchool = true"
                            v-model="school" type="text" :placeholder="[[ placeholder ]]"
                            class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                    </div>
                    <div v-if="isShowSchool" class="w-full items-center border-2 rounded-md max-h-40	bg-white overflow-auto">
                        <div @click="isShowSchool = false; isAddSchool = true" class="flex items-center py-2 pl-6 hover:bg-[#d9eafd]">
                            <fa icon="plus" class="text-[#0062ff] p-1 w-[15px] mr-3 h-[15px] rounded-full border border-[#0062ff]"/>
                            <p class="text-[blue]">Add new school</p>
                        </div>
                        <div v-for:="school of filterSchool" @click="selectedSchool = school; isShowSchool = false; getSelectedPosition()" class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                            <img v-if="school.profile" :src="school.profile" class="w-10 h-10 rounded-full mr-[10px]">
                            <div class="flex flex-col">
                                <p class="font-medium">{{ school.school }}</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-red-600" v-if="selectedSchool == null">school is required!*</small>
                </div>
                <div class="w-full bg-white font-medium mt-2" v-if="selectedSchool">
                    <span class="bg-white">Major:</span>
                    <div class="w-full flex items-center border-2 rounded-md">
                        <div class="flex justify-end items-center ml-3 bg-[#e2e2e2] h-[75%] rounded-2xl px-3" v-if="selectedMajor != null">
                            <span class="font-normal">{{ selectedMajor }}</span>
                            <fa icon="xmark" class="cursor-pointer p-2 text-[#e04]" @click="selectedMajor = null" />
                        </div>
                        <input
                            @focus="isFocusPosition = true; isShowMajor = true" @blur="isFocusPosition = false;"
                            v-model="position" type="text" :placeholder="[[ placeholder ]]"
                            class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                    </div>
                    <div v-if="isShowMajor" class="w-full items-center border-2 rounded-md max-h-40	bg-white overflow-auto">
                        <div v-for:="position of selectedMajorSchool"
                            @click="selectedMajor = position; isShowMajor = false;"
                            class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                            <div class="flex flex-col">
                                <p class="font-medium">{{ position }}</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-red-600" v-if="selectedMajor == null">Position is required!*</small>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6 mt-5">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" min="1900" max="2099" step="1" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="start_year" />
                        <BaseLabel for="floating_first_name"><fa icon="user" class="text-[#0062ff]" /> Start_year</BaseLabel>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" min="1900" max="2099" step="1" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer" v-model="end_year" />
                        <BaseLabel for="floating_last_name"><fa icon="user" class="text-[#0062ff]" /> End_year</BaseLabel>
                    </div>
                </div>  
            </div>
            <div v-else>
                <div class="w-[10rem] h-[10rem] m-auto">
                    <div class="border border-gray-900 w-[10rem] h-[10rem] rounded-full m-auto mb-5" >
                        <img v-show="imageURL != '' " :src="imageURL" alt="" class="w-full rounded-full w-[10rem] h-[10rem]">
                    </div>
                    <input type="file" id="companyProfile" @change="showProfile($event.target.files[0])" hidden>
                    <label for="companyProfile"><fa icon='camera-alt' class="float-right cursor-pointer mt-[-3rem]" /></label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <span class="bg-white">School Name:</span>
                    <input v-model="newSchool" type="text" class="border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none">
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <span class="bg-white">Majors:</span>
                    <select name="" id="" multiple class="mt-3 border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none" v-model="selectedMajors">
                        <option :value="major" v-for:="major in majors">{{major}}</option>
                    </select>
                </div>          
            </div>
            <div class="p-3 flex justify-end">
                <button @click="hide" type="cancel" class="text-red-500 mr-4 font-medium">Cancel</button>
                <button v-if="type=='create' && !isAddSchool" type="submit" class="text-[#0062ff] sm:w-auto font-medium" @click="sendData">Add</button>
                <button v-if="isAddSchool" type="submit" class="text-[#0062ff] sm:w-auto font-medium" @click="addSchool">Create</button>
                <button v-if="type=='edit'" type="submit" class="text-[#0062ff] sm:w-auto font-medium" @click="editStudyBackground(studybackground.id)">Edit</button>
            </div>
            
        </template>
    </BaseForm>
</template>
<script>
import VueCookies from 'vue-cookies';
import axios from "../../axios-http"
import BaseForm from '../../components/widget/BaseForm.vue'
import BaseLabel from '../../components/widget/BaseSpanLabel.vue'

export default {
    components: {
        BaseForm,
        BaseLabel,
    },
    props:{alumni_key:String,type:String,studybackground:Object},
    data(){
        return{
            majors: ['WEB', 'SNA', 'DMO', 'IT', 'Management', 'Accounting'],
            school:'',
            major:'',
            start_year:'',
            end_year:'',
            alumni_id:this.alumni_key,
            allStudyBackground:[],
            schools:[],
            majorFilter:[],
            isInputSchool:false,
            isInputMajor:false,
            selectedSchool: null,
            isShowSchool: false,
            isAddSchool: false,
            selectedMajors: null,
            imageURL: '',
            selectedMajor: null,
            selectedMajorSchool: null,
            isShowMajor: false,
        }
    },
    methods: {
        getSelectedPosition() {
            this.selectedMajorSchool = (this.selectedSchool.major).split(',');
        },  
        showProfile(profile) {
            const AlumniProfile = new FormData();
            AlumniProfile.append("profile", profile);
            axios.post('profile/', AlumniProfile)
            .then((res)=>{
                this.imageURL = res.data;
            })        
        },
        addSchool(){
            axios.post('school', {
                profile: this.imageURL,
                school: this.newSchool,
                major: this.selectedMajors.toString(),
            })
            .then(()=> {
                this.hide();
            })
        },
        //============== GET ALL STUDY BACKGROUND =========================
        getSchools(){
            axios.get('school').then((res)=>{
               this.schools=res.data;
               console.log('---------------------------------')
               console.log(res.data);
            })  
        },
        hide(){
            this.$emit('showForm',false)
        },
        showDataInForm() {
            this.selectedSchool = this.studybackground;
            this.selectedMajor = this.studybackground.major;
            this.start_year = this.studybackground.start_year;
            this.end_year = this.studybackground.end_year;
        },
        //=============================== add study background =================================
        sendData(){
            let study = {school:this.selectedSchool.school, major:this.selectedMajor, profile: this.selectedSchool.profile ,start_year:this.start_year,end_year:this.end_year,alumni_id: VueCookies.get('alumniId')}
            this.$emit('createStudy',study)
        },
        //=============================== update study background =================================
        editStudyBackground(id){
           let studyBackground = {school:this.selectedSchool.school,major:this.selectedMajor,start_year:this.start_year,end_year:this.end_year,alumni_id: VueCookies.get('alumniId'), profile: this.selectedSchool.profile}
           this.$emit('updateStudyBackground',studyBackground,id)
        }
    },
    computed: {
        filterSchool() {
            let data = this.schools;
            data = this.schools.filter(school => (school.school.includes(this.school)));
            return data;
        }
    },
    mounted(){
        this.getSchools()
    },
    created(){
        if (this.type   == 'edit'){
            this.showDataInForm();
        }
    },
}
</script>