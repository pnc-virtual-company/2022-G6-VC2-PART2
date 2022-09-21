<template>
    <div class="hover:bg-[#dddddd] flex justify-between items-center w-[95%] mx-auto border-l-4 border-blue-600 rounded-lg p-2.5 shadow-lg bg-[#EDEDED] mt-3 px-10">
        <div>
            <h5>{{newAlumni.user.firstName}} {{newAlumni.user.lastName}}</h5>
            <h5> {{newAlumni.user.email}}</h5>
            <p class="text-[#0062FF]">7 Hours ago</p>
        </div>
        <div class="flex justify-evenly ">
            <button type="submit" class="bg-[#e04] rounded-[30px]  text-white mr-3 px-5 py-1" @click="updateStatus(newAlumni.user.id,'reject')">Reject</button>
            <button type="submit" class="bg-[#0062FF] rounded-[30px]  text-white px-5 py-1" @click="updateStatus(newAlumni.user.id,'approve')">Approve</button>
        </div>
    </div>
</template>
<script>
export default ({
    props:{newAlumni:Object},
    emits:['UpdateStatus'],
    methods:{
        updateStatus(user_id,status){
            this.$emit('UpdateStatus',user_id,status)
        }
    }
})
</script>
