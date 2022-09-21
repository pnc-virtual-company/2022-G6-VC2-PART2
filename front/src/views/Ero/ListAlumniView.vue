<template>
    <div class="mt-[3.5rem] w-[80%] mx-auto">
        <filterAlumni
         @invite = "show = true"
        />
        
        <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
            <h1 class="text-3xl text-gray-900 dark:text-white ml-7" >Alumni List</h1>
            <CardAlumni v-for="alumni of alumniData" :key="alumni" :alumni="alumni" :alumniData='alumniData' @toDeleteAlumni="removeAlumni"/>
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
    <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center"> 
        <InviteAlumniForm
            :isExisted="isexisted"
            @hideForm="hide"
            @CreateAndInviteAlumni = "CreateAndInviteAlumni"
        /> 
    </section>
</template>
<script>
import axios from '../../axios-http'
import filterAlumni from "../Ero/FilterAlumni.vue"
import CardAlumni from "../Ero/ListALumniCard.vue"
import InviteAlumniForm from './InviteAlumniForm.vue'
import swal from 'sweetalert2';
export default ({
    components: {filterAlumni,CardAlumni,InviteAlumniForm},
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
            let passwords = "01234567890123456789012345678901234567890123456789123456789";
            let password_length = 8;
            let random_string = ""
            for (let i = 0; i < password_length; i++) {
                let rnum = Math.floor(Math.random() * passwords.length);
                random_string += passwords.substring(rnum, rnum + 1);
            }
            let user = {firstName:firstName,lastName:lastName,email:email,password:random_string,role:'alumni'};
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
