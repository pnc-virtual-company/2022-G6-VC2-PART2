<template>
  <BaseForm class="relative mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white">
    <template v-slot:header>Invite People</template>        
    <template v-slot:form>
        <div class=" md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 mt-[-1rem] w-full group">
                <input  v-model="email" type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer">
                <p class="text-[0.8rem] text-[#e04]" v-if="isExisted">this email is existed !!</p>
                <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-sky-500" /> Email</BaseLabel>
            </div>
        </div>
        <div class="text-right">
            <button @click="hideForm" type="cancel" class="text-[#e04] font-medium mr-4">Cancel</button>
            <button @click="CreateAndInviteAlumni" type="submit" class="text-[#04e] font-medium">Invite</button>
        </div>
    </template>
</BaseForm>
</template>

<script>
import BaseForm from '../../components/widget/BaseForm.vue';
import BaseLabel from '../../components/widget/BaseSpanLabel.vue';
export default {
    props: {
        isExisted:Boolean,
    },
    components: {
        BaseForm,
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
            this.$emit('CreateAndInviteAlumni',this.email)
        },

        hideForm(){
            this.$emit('hideForm', false);
        }
    }
}
</script>

<style>

</style>