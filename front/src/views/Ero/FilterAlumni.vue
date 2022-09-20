<template>
    <div>
        <div class="flex justify-between items-center">
            <div class="flex justify-between items-center ">              
                <select id="bacthSelection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none">
                <option selected>Choose a bacth</option>
                <option value="US">2007</option>
                <option value="CA">2008</option>
                <option value="FR">2009</option>
                <option value="DE">2010</option>
                </select>
            </div>
            <div class="flex justify-between items-center">
                <select id="bacthSelection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none">
                <option selected>Choose a Company</option>
                <option value="US">UDAYA</option>
                <option value="CA">Canada BANK</option>
                <option value="FR">Z1 Flexible Solution</option>
                </select>
            </div>
            <div class="flex justify-between items-center ">
                <select id="bacthSelection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none">
                <option selected>Choose a Major</option>
                <option value="US">Web</option>
                <option value="CA">SNA</option>
                <option value="CA">DMO</option>
                </select>
            </div> 
            <div class="flex  items-center w-[55%] ">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative w-full">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" id="default-search" class="block p-2.5 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none" placeholder="Search Mockups, Logos..." required>
                </div>
            </div>           
        </div>
        <div class="flex justify-between mx-auto mt-3">
            <div class="rounded bg-slate-50  w-[30%] p-7 flex">
                <div class="rounded-full  w-14 h-14 ring-8 ring-gray-300 dark:ring-gray-500 flex justify-center items-center">10</div>
                <h3 class="ml-3">INVITED : 10</h3>
            </div>
            <div>
                <button type="button" class="focus:outline-none text-white bg-blue-600 hover:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2.5" @click="invite">INVITE</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        methods:{
            invite(){
                this.$emit('invite');
            }
        }
    }
</script>