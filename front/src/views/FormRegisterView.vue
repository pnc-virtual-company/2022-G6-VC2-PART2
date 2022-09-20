<template>
    <FormRegister @create-user="Create" />
</template>


<script>
import FormRegister from '@/components/Register/FormRegister.vue' 

export default{
    components:{
        FormRegister,
    },
    data() {
        
    },
}
</script>