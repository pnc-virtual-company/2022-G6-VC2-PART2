<template>
<BaseForm class="relative mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white">
    <template v-slot:header>Create Ero Team</template>        
    <template v-slot:form>
        <div class="grid md:grid-cols-2 md:gap-6 ">
            <div class="relative z-0 mb-6 w-full group">
                <input v-model="firstName" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <BaseLabel for="floating_first_name"><fa icon="user" class="text-[#0062ff]" /> First name</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input v-model="lastName" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <BaseLabel for="floating_last_name"><fa icon="user" class="text-[#0062ff]" /> Last name</BaseLabel>
            </div>
        </div>
        <div class=" md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input  v-model="email" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-[#0062ff]" /> Email</BaseLabel>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input v-model="phone" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <BaseLabel for="floating_phone"><fa :icon="['fas', 'phone']" class="text-[#0062ff]" /> Phone number</BaseLabel>
             </div>
            <div class="relative z-0 mb-6 w-full group">
                <input v-model="telegram" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <BaseLabel for="floating_address"><fa icon="paper-plane" class="text-[#0062ff]" /> Telegram</BaseLabel>
            </div>
        </div >
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <select v-model="gender" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-blue-1000 dark:focus:border-blue-1000 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="Gender" disabled>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>        
            </div>
         </div>
        <div class="text-end">
            <button @click="hidForm" type="cancel" class="text-[#e04] px-4 font-medium">Cancel</button>
            <button @click="addUserEro" type="submit" class="text-[#0062ff] font-medium">Create</button>
        </div>
    </template>
</BaseForm>
</template>
<script>
    import BaseForm from '../../components/widget/BaseForm.vue';
    import BaseLabel from '../../components/widget/BaseSpanLabel.vue';
    export default {
        components: {
            BaseForm,
            BaseLabel,
        },
        data(){
            return{
                firstName: '',
                lastName: '',
                email:'',
                role:'ero',
                gender:'Gender',
                phone:'',
                telegram:'',
            }
        },
        methods:{
            hidForm(){
                this.$emit('onClick',false)
            },
            addUserEro(){     
                this.$emit("addUserEro",this.firstName,this.lastName,this.email,this.role,this.gender,this.phone,this.telegram)
            }
        }
    }
    </script>