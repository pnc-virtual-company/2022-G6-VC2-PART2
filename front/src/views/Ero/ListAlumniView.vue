<template>
    <div class="mt-[3.5rem] w-[80%] mx-auto">
        <filterAlumni
         @invite = "show = true"
        />
     
        <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
            <h1 class="text-3xl text-gray-900 dark:text-white ml-7" >Alumni List</h1>
            <CardAlumni v-for="alumni of alumniData" :key="alumni" :alumni="alumni" :alumniData='alumniData' @toDeleteAlumni="removeAlumni"
            @onClickProfile = "onClickProfile"
            />
        </div>
        <section v-if="isSpin" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center z-10"> 
            <div class="grid m-auto">
                <fa icon="spinner" class="text-[5rem] m-auto animate-spin text-[#fff]" /> 
                <p class="text-[#fff] text-[2rem]">Sending email..</p>
            </div>
        </section>
        <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center"> 
            <InviteAlumniForm
                :isExisted="isexisted"
                @hideForm="hide"
                @CreateAndInviteAlumni = "CreateAndInviteAlumni"
            /> 
        </section>
    </div> 
    <section v-if="isShowProfile" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center">
        <AlumniDetail
            @hideAlumniDetail = "isShowProfile = false"
            :AlumniDetail = "oneAlumni"
        />
    </section>
</template>
<script>
import axios from '../../axios-http'
import filterAlumni from "../Ero/FilterAlumni.vue"
import CardAlumni from "../Ero/ListALumniCard.vue"
import InviteAlumniForm from './InviteAlumniForm.vue'
import AlumniDetail from './AlumniDetail.vue'
import swal from 'sweetalert2';
export default ({
    components: {filterAlumni,CardAlumni,InviteAlumniForm,AlumniDetail},
    data(){
        return{
            alumniData:[],
            show: false,
            isSpin: false,
            isexisted:false,
            isShowProfile: false,
            oneAlumni:[]
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
        onClickProfile(status,alumni){
            this.isShowProfile=status;
            this.oneAlumni=alumni
        },
        hide(value){
            this.show=value
        },

        CreateAndInviteAlumni(email){
            this.isSpin= true
            let passwords = "01234567890123456789012345678901234567890123456789123456789";
            let password_length = 8;
            let random_string = ""
            for (let i = 0; i < password_length; i++) {
                let rnum = Math.floor(Math.random() * passwords.length);
                random_string += passwords.substring(rnum, rnum + 1);
            }
            let user = {email:email,password:random_string,role:'alumni', status:'approve'};
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
