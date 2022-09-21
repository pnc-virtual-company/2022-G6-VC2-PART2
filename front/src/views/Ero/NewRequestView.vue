<template>
<div class="mt-[4rem] w-[70%] bg-red-50 mx-auto rounded-xl p-5">
    <p class="text-[32px] font-bold ml-5">Notification</p>
    <NewRequestCard v-for="newAlumni of alumniRequest" :key="newAlumni" :newAlumni='newAlumni'/>
</div>
</template>
<script>
import axios from '../../axios-http'
import NewRequestCard from "./NewRequestCard.vue"
export default({
    components:{NewRequestCard},
    data(){
        return{
            alumniRequest:[],
        }
    },
    methods:{
        getRequest(){
            axios.get('alumni').then((res)=>{
                this.alumniRequest = res.data.filter(alumniRequest=>alumniRequest.user.status=='padding')
                console.log('hi');
                console.log(this.alumniRequest);
            })
        }
    },
    created(){
        this.getRequest()
    }
})
</script>
