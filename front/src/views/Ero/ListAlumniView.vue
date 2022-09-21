<template>
    <div class="mt-[3.5rem] w-[80%] mx-auto">
        <filterAlumni
         @invite = "show = true"
        />
        <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
            <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
                <h1 class="text-3xl text-gray-900 dark:text-white ml-7" >Alumni List</h1>
                <CardAlumni v-for="alumni of alumniData" :key="alumni" :alumni="alumni"/>
            </div>
        </div>
        <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center"> 
            <InvitAlumniForm
                @hideForm="hide"
                @CreateAndInviteAlumni = "CreateAndInviteAlumni"
            /> 
        </section>
        <section v-if="isSpin" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center"> 
            <div class="grid m-auto">
                <fa icon="spinner" class="text-[5rem] m-auto animate-spin text-[#fff]" /> 
                <p class="text-[#fff] text-[2rem]">Sending email..</p>
            </div>
        </section>
    </div> 
</template>
<script>
import axios from '../../axios-http'
import filterAlumni from "../Ero/FilterAlumni.vue"
import CardAlumni from "../Ero/ListALumniCard.vue"
import InvitAlumniForm from './InvitAlumniForm.vue'
export default ({
    components: {filterAlumni,CardAlumni,InvitAlumniForm},
    data(){
        return{
            alumniData:[],
            show: false,
            isSpin: false,
        }
    },
    methods:{
        getAlumni(){
            axios.get('alumni').then((res)=>{
                this.alumniData=res.data
            }).catch((error)=>{
                console.log(error);
            })
        },

        hide(value){
            this.show=value
        },

        CreateAndInviteAlumni(firstName,lastName,email){
            this.isSpin= true
            let user = {firstName:firstName,lastName:lastName,email:email,password:'12345678',role:'alumni'};
            axios.post('user', user).then(()=>{
                this.isSpin= false;
                this.show = false;
                this.getAlumni();
            })
        }
    },
    created(){
        this.getAlumni()
    }
})
</script>
