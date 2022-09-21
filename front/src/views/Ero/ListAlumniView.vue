<template>
    <div class="mt-[3.5rem] w-[80%] mx-auto">
        <filterAlumni
         @invite = "show = true"
        />
        <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
            <CardAlumni :alumniData='alumniData' @toDeleteAlumni="removeAlumni"/>
        </div>
    </div> 
    <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center"> 
        <InvitAlumniForm
            :isExisted="isexisted"
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
</template>
<script>
import axios from '../../axios-http'
import filterAlumni from "../Ero/FilterAlumni.vue"
import CardAlumni from "../Ero/ListALumniCard.vue"
import InvitAlumniForm from './InvitAlumniForm.vue'
import swal from 'sweetalert2';
export default ({
    components: {filterAlumni,CardAlumni,InvitAlumniForm},
    data(){
        return{
            alumniData:[],
            show: false,
            isSpin: false,
            isexisted:false,
        }
    },
    methods:{
        getAlumni(){
            axios.get('alumni').then((res)=>{
                this.alumniData=res.data
                console.log(this.alumniData)
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
                this.show = false;
                this.isSpin= false;
                this.getAlumni();
            }).catch((error)=>{
                this.isSpin= false;
                this.isexisted=true;
                console.log(error.response.data.message)
            })
        },
        removeAlumni(userId){
            swal.fire({
                    title: 'Are you sure to delete?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0062ff',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {       
                        axios.delete('user/'+userId).then(()=>{
                            this.getAlumni();
                        })
                    }
                })
        }, 
    },
    created(){
        this.getAlumni()
    }
})
</script>
