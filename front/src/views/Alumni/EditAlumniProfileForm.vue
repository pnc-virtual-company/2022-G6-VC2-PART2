<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white">
        <template v-slot:header>
            <span v-if="type=='edit'">Edit Profile</span>
            <span v-if="type=='create'">Complete General Information</span>
        </template>        
        <template v-slot:form>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                <input 
                    v-model="firstName"
                    type="text" 
                    placeholder=" " 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-bg-[#0062ff] dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                >
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-[#0062ff]" /> First name</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                <input 
                    v-model="lastName"
                    type="text" 
                    placeholder=" " 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                >
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-[#0062ff]" /> Last name</BaseLabel>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="major"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_major_name"><fa icon="user-graduate" class="text-[#0062ff]" /> Major</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="batch" 
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_generation_name"><fa icon="users" class="text-[#0062ff]" /> Generation</BaseLabel>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="address"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_address"><fa icon="map-marker-alt" class="text-[#0062ff]" /> Address</BaseLabel>
                </div>
                <!-- <div class="grid md:grid-cols-2 md:gap-6"> -->
                    <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="gender"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_gender"><fa icon="transgender-alt" class="text-[#0062ff]" /> Gender</BaseLabel>
                </div>
                
                </div>
                
                
            <!-- </div> -->
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="phone"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_phone"><fa icon="phone" class="text-[#0062ff]" /> Phone number</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="telegram"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_address"><fa icon="paper-plane" class="text-[#0062ff]" /> Telegram</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="dateOfBirth"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_home"><fa icon="home" class="text-[#0062ff]" /> Date Of Birth</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="placeOfBirth"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    >
                    <BaseLabel for="floating_home"><fa icon="home" class="text-[#0062ff]" /> Place Of Birth</BaseLabel>
                </div>
            </div>
            <div v-if="!type=='create'" class="relative z-0 mb-6 w-full group" >
                     <input 
                     v-model="email"
                         type="text" 
                         placeholder=" " 
                         class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                     >
                     <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-[#0062ff]" /> Email</BaseLabel>
                 </div>
            
            <div class="p-2 text-center flex justify-end">
                <button @click="hideForm" type="cancel" v-if="type=='edit'" class="text-red-500 font-medium">Cancel</button>
                <button type="submit" class="text-[#0062ff] font-medium ml-4" v-if="type=='create'" @click="create">Add </button>
                <button v-else-if="type=='edit'" class="text-[#0062ff] font-medium ml-4" @click="updateData">Edit</button>
            </div>
        </template>
    </BaseForm>
</template>
<script>
import BaseForm from '../../components/widget/BaseForm.vue'
import BaseLabel from '../../components/widget/BaseSpanLabel.vue'
import VueCookies from 'vue-cookies'
export default {
    components: {
        BaseForm,
        BaseLabel,
    },
    emits: ['hideForm','updateAlumni', 'Alumni'],
    props:{
        type: String,
        alumniInfo: Object,      
        alumniData: Object,
    },
    data(){
        return{
            firstName:this.alumniInfo.firstName,
            lastName:this.alumniInfo.lastName,
            email:this.alumniInfo.email,
            gender:this.alumniData.gender,
            placeOfBirth:this.alumniData.placeOfBirth,
            major:this.alumniData.major,
            batch:this.alumniData.batch,
            phone:this.alumniData.phone,
            address:this.alumniData.address,
            userId:this.alumniInfo.id,
            alumniId:this.alumniData.id,
            telegram:this.alumniData.telegram,
        }
    },
    methods: {
        hideForm() {
            this.$emit('hideForm', false);
        },
        updateData(){
            let userData ={firstName:this.firstName,lastName:this.lastName,email:this.email}
            let alumniData ={major:this.major,batch:this.batch,phone:this.phone,address:this.address,telegram:this.telegram,gender:this.gender,placeOfBirth:this.placeOfBirth}
            this.$emit('updateAlumni',this.userId,this.alumniId,userData,alumniData);
            this.hideForm();
        },
        create() {
            let newAlumni = {
                firstName:this.firstName,
                lastName:this.lastName,
                major: this.major,
                batch: this.batch,
                phone:this.phone,
                address:this.address,
                telegram:this.telegram,
                gender: this.gender,
                dateOfBirth: this.dateOfBirth,
                placeOfBirth: this.placeOfBirth,
                isComplete: true,
                user_id:VueCookies.get('userId'),
                method:'put'
            };
            this.$emit('Alumni', newAlumni)
        }
  },
}
</script>