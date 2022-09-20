<template>
  <BaseForm class="relative mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white">
    <template v-slot:header>Create Alumni</template>        
    <template v-slot:form>
        <div class="grid md:grid-cols-2 md:gap-6 ">
            <div class="relative z-0 mb-6 w-full group">
                <input v-model="firstName" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">
                <BaseLabel for="floating_first_name"><fa icon="user" class="text-sky-500" /> First name</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input v-model="lastName" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">
                <BaseLabel for="floating_last_name"><fa icon="user" class="text-sky-500" /> Last name</BaseLabel>
            </div>
        </div>
        <div class=" md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input  v-model="email" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">
                <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-sky-500" /> Email</BaseLabel>
            </div>
        </div>
        <div class="p-3 text-center">
            <BaseButton @click="CreateAndInviteAlumni" type="submit" class="bg-[#1da1f2] sm:w-auto ">Create</BaseButton>
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
    data(){
        return{
            firstName:'',
            lastName:'',
            email:'',
        }
    },
    methods:{
        CreateAndInviteAlumni(){
            this.$emit('CreateAndInviteAlumni',this.firstName,this.lastName,this.email)
        },

        hideForm(){
            this.$emit('hideForm', false);
        }
    }
}
</script>

<style>

</style>