<template>
    <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
        <h1 class="text-3xl text-gray-900 dark:text-white ml-7" >Alumni List</h1>
        <div class=" flex justify-between items-center w-[95%] mx-auto border-l-4 border-blue-600 rounded-lg p-2.5 shadow-lg bg-slate-200 mt-3" v-for="alumni of alumniData" :key="alumni">
            <div>
                <img :src="alumni.profile" alt="" class="w-20 h-20 rounded-full">
            </div>
            <div>
                <p>Name</p>
                <h5>{{alumni.user.firstName}}  {{alumni.user.lastName}}</h5>
            </div>
            <div>
                <p>Email</p>
                <h5>{{alumni.user.email}}</h5>
            </div>
            <div>
                <p>Action</p>
                <fa icon="trash-alt" class="text-[1.2rem] text-[#e04] bg-[#ddd]  p-2 rounded-full cursor-pointer" />
            </div>
        </div>
    </div>
</template>
<script>

export default({
    props:{ alumniData:Array }
})
</script>
