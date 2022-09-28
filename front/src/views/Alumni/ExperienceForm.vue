<template>
    <BaseForm class="w-full bg-white ">
        <template v-slot:header>
            <span v-if="showCompanyForm">Create New Company</span>
            <span v-else-if="type == 'edit'">Edit Experience</span>
            <span v-else>Add New Work Experience</span>
        </template>
        <template v-slot:form>
            <!-- select company -->
            <div class="font-medium" v-if="!showCompanyForm">
                <div class="w-full bg-white font-medium">
                    <span class="bg-white">Company:</span>
                    <div class="w-full flex items-center border-2 rounded-md">
                        <div class="flex justify-end items-center ml-3 bg-[#e2e2e2] h-[75%] rounded-2xl px-3" v-if="selectedCompany != null">
                            <span class="font-normal">{{ selectedCompany.company }}</span>
                            <fa icon="xmark" class="cursor-pointer p-2 text-[#e04]" @click="company = null; selectedCompany = null" />
                        </div>
                        <input 
                            @focus="isFocusCompany = true; isShowCompanies = true" @blur="isFocusCompany = false;"
                            v-model="company" type="text" :placeholder="[[ placeholder ]]"
                            class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                    </div>
                    <div v-if="isShowCompanies" class="w-full items-center border-2 rounded-md max-h-40	bg-white overflow-auto">
                        <div @click="isShowCompanies = false; showCompanyForm = true" class="flex items-center py-2 pl-6 hover:bg-[#d9eafd]">
                            <fa icon="plus" class="text-[#0062ff] p-1 w-[15px] mr-3 h-[15px] rounded-full border border-[#0062ff]"/>
                            <p class="text-[blue]">Add new company</p>
                        </div>
                        <div v-for:="eachCompany of filterCompany" @click="selectedCompany = eachCompany; company = null; companyId = eachCompany.id; isShowCompanies = false; getSelectedPosition();" class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                            <img v-if="eachCompany.profile" :src="eachCompany.profile" class="w-10 h-10 rounded-full mr-[10px]">
                            <div class="flex flex-col">
                                <p class="font-medium">{{ eachCompany.company }}</p>
                                <span class="text-[0.80rem]">{{ eachCompany.address }}</span>
                            </div>
                        </div>
                    </div>
                    <small class="text-red-600" v-if="selectedCompany == null">Company is required!*</small>
                </div>
                <!-- select position -->
                <div class="w-full bg-white font-medium" v-if="selectedCompany">
                    <span class="bg-white">Position:</span>
                    <div class="w-full flex items-center border-2 rounded-md">
                        <div class="flex justify-end items-center ml-3 bg-[#e2e2e2] h-[75%] rounded-2xl px-3" v-if="selectedPosition != null">
                            <span class="font-normal">{{ selectedPosition }}</span>
                            <fa icon="xmark" class="cursor-pointer p-2 text-[#e04]" @click="selectedPosition = null" />
                        </div>
                        <input
                            @focus="isFocusPosition = true; isShowPosition = true" @blur="isFocusPosition = false;"
                            v-model="position" type="text" :placeholder="[[ placeholder ]]"
                            class="pl-3 font-normal text-base  block flex-1 min-w-0 w-full rounded-md p-2 outline-none">
                    </div>
                    <div v-if="isShowPosition" class="w-full items-center border-2 rounded-md max-h-40	bg-white overflow-auto">
                        <div v-for:="position of filterPosition"
                            @click="selectedPosition = position; isShowPosition = false;"
                            class="flex items-center py-2 pl-4 hover:bg-[#d9eafd]">
                            <div class="flex flex-col">
                                <p class="font-medium">{{ position }}</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-red-600" v-if="selectedPosition == null">Position is required!*</small>
                </div>
                <div class="w-full font-medium mt-5">
                    <!-- START AND END YEAR INPUT -->
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="">Start Year</label>
                        <input type="month" placeholder=" "
                            class="border-2 outline-none p-2 rounded-md w-full border-gray-300" v-model="start_year"
                            min="2005-08">
                        <small class="text-red-600" v-if="start_year == ''">Start year is required!*</small>
                    </div>
                    <div class="relative z-0 mb-6 w-full group" v-if="hideEndYear">
                        <label for="">End Year</label>
                        <input type="month" placeholder=" "
                            class="border-2 outline-none p-2 rounded-md w-full border-gray-300" v-model="end_year"
                            min="2005-08">
                    </div>
                </div>
                <!-- CHECK IS LEFT COMPANY INPUT -->
                <div class=" mb-6 w-full group">
                    <input id="default-checkbox" type="checkbox" v-model='hideEndYear'
                        class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                    <label for="default-checkbox" class="disabled ml-2 text-sm cursor-pointer">Already left from this company?</label>
                </div>
            </div>
            <div v-else>
                <div class="w-[10rem] h-[10rem] m-auto">
                    <div class="border border-gray-300 w-[10rem] h-[10rem] rounded-full m-auto mb-5" >
                        <img v-show="imageURL != '' " :src="imageURL" alt="" class="w-full rounded-full w-[10rem] h-[10rem]">
                    </div>
                    <input type="file" id="companyProfile" @change="showProfile($event.target.files[0])" hidden>
                    <label for="companyProfile"><fa icon='camera-alt' class="float-right cursor-pointer mt-[-3rem]" /></label>
                </div>
                <input type="text" class="border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none" placeholder="Company name" v-model="newCompany" required>
                <select name="" id="" multiple class="mt-3 border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none" v-model="selectPositions">
                    <option :value="position" v-for:="position in positions">{{position}}</option>
                </select>
                <input type="text" class="mt-3 border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none" placeholder="Company Address" v-model="newAddress" required>
                <input type="url" class="mt-3 border border-gray-300 pl-3 font-normal text-base min-w-0 w-full rounded-md p-2 outline-none" placeholder="Company URL" v-model="newCompany_link" required>
            </div>
            <div class="p-2 flex justify-end">
                <BaseButton @click="hideForm" type="cancel" class="text-red-500 mr-2 cursor-pointer font-medium">Cancel</BaseButton>
                <BaseButton v-if="!showCompanyForm && type != 'edit'" type="submit" class="text-[#0062ff] sm:w-auto ml-2 cursor-pointer font-medium" @click="newAlumniExperience(selectedCompany)">Add</BaseButton>
                <BaseButton class="text-[#0062ff] sm:w-auto ml-2 cursor-pointer font-medium" v-else-if="type=='edit'" @click="editExperience">Edit</BaseButton>
                <BaseButton v-else type="submit" class="text-[#0062ff] ml-2 cursor-pointer font-medium" @click="addCompany">Create</BaseButton>
            </div>
        </template>
    </BaseForm>
</template>

<script>
import axios from '../../axios-http'
import BaseForm from '../../components/widget/BaseForm.vue'
export default {
    components: {
        BaseForm,
    },
    props: {
        experience: Object,
        type: String
    },  
    data() {
        return {
            companies: [],
            selectedPositionCompany: [],
            positions: ['frontend developer', 'backend developer', 'laravel developer', 'Mobile application', 'IT support', 'Devops', 'Business Analysis'],
            duration: '',
            start_year: '',
            end_year: '',
            isCompanyNull: false,
            isShowCompanies: false,
            isFocusCompany: false,
            hideEndYear: false,
            selectedCompany: null,
            isNoPostion: false,
            isNoCompany: false,
            inValidDate: false,
            isNoStartYear: false,
            selectedPosition: null,
            isFocusPosition: false,
            isShowPosition: false,
            position: null,
            company: null,
            showCompanyForm: false,
            imageURL: '',
            newCompany: '',
            newAddress: '',
            newCompany_link: ''
        }
    },
    methods: {
        getCompany() {
            axios.get('company')
            .then((response) =>{
                this.companies = response.data;
            })
        },
        getSelectedPosition() {
            this.selectedPositionCompany = (this.selectedCompany.position).split(',');
        },  
        showProfile(profile) {
            const AlumniProfile = new FormData();
            AlumniProfile.append("profile", profile);
            axios.post('profile/', AlumniProfile)
            .then((res)=>{
                this.imageURL = res.data;
            })        
        },
        addCompany() {
            if (this.imageURL != '' && this.newCompany_link != '' && this.selectedPositionCompany != null && this.newCompany != '' && this.newAddress != '' ) {
                axios.post('company', {
                    profile: this.imageURL,
                    company_link: this.newCompany_link,
                    position: this.selectPositions.toString(),
                    company: this.newCompany,
                    address: this.newAddress
                })
                .then((res)=>{
                    console.log(res.data);
                });
                this.hideForm();
            }
        },
        hideForm() {
            this.$emit('hideForm', false)
        },
        //=================== CALCULATE DURATION =================
        calculateDuration() {
            if (this.end_year != '') {
                let duration = parseInt(new Date(this.end_year) - new Date(this.start_year)) / (1000 * 60 * 60 * 24);
                if (duration >= 365) {
                    this.years = parseInt(duration / 365) + 'years'
                    this.duration = this.years
                }
                else if (duration >= 30) {
                    this.month = parseInt(duration / 30) + 'month'
                    this.duration = this.month
                }
            }
        },
        //=================== add new experience emit  and validate create alumni experience=================
        newAlumniExperience(data) {
            if (this.selectedPosition != null && data.company != '' && data.start_year != '') {
                console.log('i am working--------------');
                console.log(parseInt(new Date(this.end_year) - new Date(this.start_year)) / (1000 * 60 * 60 * 24) > 0);
                this.calculateDuration();
                if (this.end_year) {
                    if (parseInt(new Date(this.end_year) - new Date(this.start_year)) / (1000 * 60 * 60 * 24) > 0) {
                        this.$emit('addAlumniExperience', this.selectedPosition, data.company, this.start_year, this.end_year, data.company_link, this.duration, data.profile);
                        this.hideForm();
                    }
                } else { 
                    this.$emit('addAlumniExperience', this.selectedPosition, data.company, this.start_year, this.end_year, data.company_link, this.duration, data.profile);
                    this.hideForm();
                }
            }

        },
        //=================== SET DATA TO FORM INPUT =================
        showDataInForm() {
            this.selectedPosition = this.experience.position;
            this.selectedCompany = this.experience;
            this.start_year = this.experience.start_year;
            this.end_year = this.experience.end_year;
            this.company_link = this.experience.company_link;
            console.log('hideForm');
            console.log('----------================================')
            console.log(this.selectedCompany.company);
        },
        // emit data to edit experience
        editExperience(){
            this.calculateDuration();
            let experience =
            {
                id: this.experience.id, 
                position: this.selectedPosition,
                company: this.selectedCompany.company,
                start_year: this.start_year,
                end_year: this.end_year,
                company_link: this.selectedCompany.company_link,
                duration: this.duration,
                profile: this.selectedCompany.profile,
            }
            //////validate edit alumni experience/////
            if (this.selectedPosition != '' && this.selectedCompany != '' && this.start_year != '') {
                this.hideForm();
                this.$emit('edit',experience);
            } 
            console.log(experience)
        },
    },
    computed: {
        filterCompany() {
            let data = this.companies;
            if (this.company != null) {
                data = this.companies.filter(company => (company.company.toLowerCase().includes(this.company)));
            }
            return data;
        },
        filterPosition() {
            let data = this.selectedPositionCompany;
            if (this.position != null) {
                data = this.selectedPositionCompany.filter(position => (position.includes(this.position)));
            } 
            return data;
        },
    },
    created() {
        this.getCompany();
        if (this.type   == 'edit'){
            this.showDataInForm();
        }
    }
}
</script>