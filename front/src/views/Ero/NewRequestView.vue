<template>
<div class="mt-[4rem] w-[70%] bg-red-50 mx-auto rounded-xl p-5">
    <p class="text-2xl font-medium ml-6">Notification</p>
    <NewRequestCard v-for="newAlumni of alumniRequest" :key="newAlumni" :newAlumni='newAlumni' @UpdateStatus="updateStatus"/>
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
            })
        },
        updateStatus(user_id,stat){
            let alumniStatus ={status:stat}
            axios.patch('user/status/'+user_id,alumniStatus).then((res)=>{
                console.log(res.data);
                location.reload();
            })
        }
    },
    created(){
        this.getRequest()
    }
})
</script>
