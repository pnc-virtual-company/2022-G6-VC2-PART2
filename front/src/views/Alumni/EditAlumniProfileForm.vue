<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white">
        <template v-slot:header>
            Edit Profile
        </template>        
        <template v-slot:form>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                <input 
                    v-model="firstName"
                    type="text" 
                    placeholder=" " 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                >
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-sky-500" /> First name</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                <input 
                    v-model="lastName"
                    type="text" 
                    placeholder=" " 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                >
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-sky-500" /> Last name</BaseLabel>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="major"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                    >
                    <BaseLabel for="floating_major_name"><fa icon="user-graduate" class="text-sky-500" /> Major</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="batch" 
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                    >
                    <BaseLabel for="floating_generation_name"><fa icon="users" class="text-sky-500" /> Generation</BaseLabel>
                </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input 
                    v-model="address"
                    type="text" 
                    placeholder=" " 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                >
                <BaseLabel for="floating_address"><fa icon="home" class="text-sky-500" /> Address</BaseLabel>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                        v-model="phone"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                    >
                    <BaseLabel for="floating_phone"><fa icon="phone" class="text-sky-500" /> Phone number</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input 
                    v-model="email"
                        type="text" 
                        placeholder=" " 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                    >
                    <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-sky-500" /> Email</BaseLabel>
                </div>
            </div >
            <div class="p-3 text-center">
                <BaseButton type="submit" class="bg-[#1da1f2] sm:w-auto " @click="updateData">Edit</BaseButton>
                <BaseButton @click="hideForm" type="cancel" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
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
    emits: ['hideForm','updateAlumni'],
    props:{
        alumniInfo: Object,      
        alumniData: Object,
    },
    data(){
        return{
            firstName:this.alumniInfo.firstName,
            lastName:this.alumniInfo.lastName,
            email:this.alumniInfo.email,
            major:this.alumniData.major,
            batch:this.alumniData.batch,
            phone:this.alumniData.phone,
            address:this.alumniData.address,
            userId:this.alumniInfo.id,
            alumniId:this.alumniData.id,
        }
    },
    methods: {
        hideForm() {
            this.$emit('hideForm', false);
        },
        updateData(){
            let userData ={firstName:this.firstName,lastName:this.lastName,email:this.email}
            let alumniData ={major:this.major,batch:this.batch,phone:this.phone,address:this.address}
            this.$emit('updateAlumni',this.userId,this.alumniId,userData,alumniData);
        }
    }
}
</script>