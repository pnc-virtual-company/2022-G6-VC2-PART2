<template>    
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">
        <template v-slot:header >
            <span v-if="type=='create'">Create Work Experoience</span>
            <span v-else-if="type=='edit'">Edit Work Experoience</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <BaseInput type="text" id="floating_address"  placeholder=" " required v-model="position"/>
                <BaseLabel for="floating_address"><fa icon="chalkboard-teacher" class="text-sky-500" /> Position</BaseLabel>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <BaseInput type="text" id="floating_address"  placeholder=" " required v-model="company"/>
                <BaseLabel for="floating_address"><fa icon="hotel" class="text-sky-500" /> Work Place</BaseLabel>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="date" id="floating_first_name"  placeholder=" " required v-model="start"/>
                    <BaseLabel for="floating_first_name"><fa icon="user" class="text-sky-500" /> Start_work</BaseLabel>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <BaseInput type="date" id="floating_last_name" placeholder=" " v-model="end"/>
                    <BaseLabel for="floating_last_name"><fa icon="user" class="text-sky-500" /> End_work</BaseLabel>
                </div>
            </div>
            <div class="p-2 text-center">
                <BaseButton type="submit" class="bg-[#1da1f2] sm:w-auto ">
                    <span v-if="type=='create'">Add</span>
                    <span v-else-if="type=='edit'">Edit</span>
                </BaseButton>
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
    props: {
        type: String,
    },
    data(){
        return {
            
        }
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