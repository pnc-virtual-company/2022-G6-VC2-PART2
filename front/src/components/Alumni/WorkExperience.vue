<template>
  <div class="w-[75%] m-auto shadow-2xl border-[1px] border-slate-200 p-[30px] cursor-pointer bg-[#ffffffaf] mb-[20px]">
    <div class="flex justify-end">
        <div class="bg-[#34B3F1] w-[50px] h-[50px] flex justify-center items-center shadow-indigo-500/40 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-[#fff]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
    </div>
    <div class="border-b-[2px] border-gray-400 p-[10px] flex justify-center">
        <div class=" w-[83%] ml-[3%]">
            <div>
                <p class="text-[1.3rem]"><strong>Position : </strong>{{workExperience.position}}</p>
                <div class="ml-[8%]">
                    <p class="mt-[15px] text-[1rem]"><strong>Company : </strong>{{workExperience.company}}</p>
                    <p class=" mt-[15px] text-[1rem]"><strong>Start work : </strong>{{workExperience.start_year}}</p>
                    <p class="mt-[15px] text-[1rem]"><strong>End work : </strong>{{workExperience.end_year}}</p>
                </div>
            </div>
        </div>
        <div class="w-[15%] flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
        </div>
    </div>
  </div>

</template>

<script>
export default {
    props: {
        workExperience:Object,
    },  
}
</script>

<style>

</style>