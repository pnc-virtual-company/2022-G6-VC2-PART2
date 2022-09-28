<template>
<div>
    <div class="hover:bg-[#dddddd] flex justify-between items-center w-[95%] mx-auto border-l-4 border-blue-600 rounded-lg p-2.5 shadow-lg bg-slate-200 mt-3" @mouseover="isShow=true" @mouseleave="isShow=false">
        <div>
            <img  @click="onClickProfile" :src="alumni.profile" alt="" class="w-20 h-20 rounded-full cursor-pointer" v-if="alumni.profile !== null">
            <img @click="onClickProfile" src="@/assets/boy.jpg" alt="" class="w-20 h-20 rounded-full cursor-pointer" v-if="alumni.gender=='Male' && alumni.profile == null">
            <img @click="onClickProfile" src="@/assets/girl.webp" alt="" class="w-20 h-20 rounded-full cursor-pointer" v-if="alumni.gender=='Female' && alumni.profile == null">
        </div>
        <div>
            <p>Name</p>
            <h5 class=" cursor-pointer"  @click="onClickProfile">{{alumni.user.firstName}}  {{alumni.user.lastName}}</h5>
        </div>
        <div>
            <p>Email</p>
            <h5>{{alumni.user.email}}</h5>
        </div>
        <div v-show='isShow'>
            <p>Action</p>
            <fa icon="trash-alt" class="text-[1.2rem] text-[#e04] bg-[#ddd]  p-2 rounded-full cursor-pointer" @click="deletAlumni(alumni.user.id,alumni.id)"/>
        </div>
    </div>
</div>
</template>
<script>
export default({
    props:{ alumni:Object },
    data(){
        return{
            isShow:false
        }
    },
    methods: {
        deletAlumni(userId,alumniId){
            this.$emit('toDeleteAlumni',userId, alumniId)
        },
        onClickProfile(){
            this.$emit('onClickProfile',true,this.alumni)
        }
    },

})

</script>
