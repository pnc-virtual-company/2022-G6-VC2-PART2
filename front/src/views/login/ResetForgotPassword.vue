<template>
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full p-6 bg-white rounded-lg shadow md:mt-0 sm:max-w-md sm:p-8">
                <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-black text-center">
                    New Password
                </h2>
                <p class="text-center">For new password must be match with comfirm password</p>
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="#" @submit.prevent="resetPassword">
                    <div>
                        <label for="password" class="block  text-sm font-medium text-gray-900 dark:text-black p-2">New Password</label>
                        <div class="flex justify-between items-center p-3 bg-primary-50 border border-blue-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-primary-700 dark:border-primary-600 dark:placeholder-primary-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <input class="outline-none" :type="!showPassword ? 'password' : 'text'" placeholder="••••••••" required="" v-model="new_password">
                            <fa @click="showPassword = !showPassword" :icon="showPassword ? 'eye' : 'eye-slash'" />
                        </div>
                    </div>
                    <div>
                        <label for="confirm-password" class="block  text-sm font-medium text-gray-900 dark:text-black p-2">Confirm password</label>
                        <div class="flex justify-between items-center p-3 bg-primary-50 border border-blue-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-primary-700 dark:border-primary-600 dark:placeholder-primary-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <input class="outline-none" :type="!showConfirm ? 'password' : 'text'"  placeholder="••••••••"  required="" v-model="confirm_password">
                            <fa @click="showConfirm = !showConfirm" :icon="showConfirm ? 'eye' : 'eye-slash'" />
                        </div>
                        <span v-if="isMatch" class="text-[#ef4444] text-center">
                             Password is not match !
                        </span>
                    </div>
                    <div class="flex flex-end justify-end">
                        <button type="submit" class="text-white bg-[#e04] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-2.5  py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" @click="hide">Cancle</button>
                        <button type="submit" class="ml-2 text-white bg-[#0062ff] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-2.5  py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Reset passwod</button>
                    </div>
                </form>
            </div>
    </div>
    </section>
</template>
<script>
import axios from '../../axios-http';
export default {
    emits: ["hide"],
    data() {
        return {
            new_password:'',
            confirm_password:'',
            isMatch: false,
            showPassword:false,
            showConfirm:false
        }
    },
    props: {
        email: String,
    },
    methods: {
        resetPassword() {
            if(this.new_password != ''){
                if(this.new_password == this.confirm_password){
                    axios.post('resetForgot', {new_password: this.new_password, email: this.email})
                    .then((response) => {
                        console.log(response.data);
                        this.hide();
                    })
                }
                else{
                    this.isMatch = true;
                    this.new_password='';
                    this.confirm_password='';
                }
            }
        },
        hide() {
            this.$emit('hide', true);
        }
    }
}
</script>