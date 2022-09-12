<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white">
        <template v-slot:header>
            Edit Profile
        </template>        
        <template v-slot:form>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="text" id="floating_first_name"  placeholder=" " required />
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-sky-500" /> First name</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="text" id="floating_last_name" placeholder=" "/>
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-sky-500" /> Last name</BaseLabel>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="text" id="floating_major_name"  placeholder=" " required />
                    <BaseLabel for="floating_major_name"><fa icon="user-graduate" class="text-sky-500" /> Major</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="text" id="floating_last_name"  placeholder=" " required />
                    <BaseLabel for="floating_generation_name"><fa icon="users" class="text-sky-500" /> Generation</BaseLabel>
                </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <BaseInput type="text" id="floating_address"  placeholder=" " required />
                <BaseLabel for="floating_address"><fa icon="home" class="text-sky-500" /> Address</BaseLabel>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="email" name="floating_email" id="floating_email"  placeholder=" " required />
                    <BaseLabel for="floating_email"><fa :icon="['fas', 'envelope']" class="text-sky-500" /> Email</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="text" id="floating_linkedin"  placeholder=" " required />
                    <BaseLabel for="floating_linkedin"><fa :icon="['fab', 'linkedin']" class="text-sky-500" /> Linkedin</BaseLabel>
                </div>
            </div >
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput  type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="floating_phone"  placeholder=" " required />
                    <BaseLabel for="floating_phone"><fa icon="phone" class="text-sky-500" /> Phone number</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput  type="text" id="floating_telegram"  placeholder=" " required  />
                    <BaseLabel for="floating_telegram"><fa :icon="['fab', 'telegram']" class="text-sky-500" /> Telegram</BaseLabel>
                </div>
            </div >
            <div class="p-3 text-center">
                <BaseButton type="submit" class="bg-[#1da1f2] sm:w-auto ">Edit</BaseButton>
                <BaseButton @click="hideForm" type="cancel" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
            </div>
        </template>
    </BaseForm>
</template>

<script>
import BaseForm from '../widget/BaseForm.vue'
import BaseInput from '../widget/BaseInput.vue'
import BaseButton from '../widget/BaseButton.vue'
import BaseLabel from '../widget/BaseSpanLabel.vue'
export default {
    components: {
        BaseForm,
        BaseInput,
        BaseButton,
        BaseLabel,
    },
    emits: ['hideForm'],
    methods: {
        hideForm() {
            this.$emit('hideForm', false);
        }
    }
}
</script>

<style>

</style>