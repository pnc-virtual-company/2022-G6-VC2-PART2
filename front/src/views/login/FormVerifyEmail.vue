<template>
        <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full p-6 bg-white rounded-lg shadow md:mt-0 sm:max-w-md sm:p-8">
                <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-black text-center">
                    Are you get code from email?
                </h2>
                <p class="p-3 text-center">After you got code verify from your email you need to check with it</p>
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="#" @submit.prevent="verifyCode">
                    <div>
                        <label for="number" class="block text-sm font-medium text-gray-900 dark:text-black p-2block mb-2 text-sm font-medium text-gray-900 dark:text-black p-2">Your Code</label>
                        <input type="number" class="p-2 border border-blue-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-primary-700 dark:border-primary-600 dark:placeholder-primary-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="code get from verify email" required="" v-model="verify_code">
                        <span v-if="notFound" class="text-[#ef4444] text-center">
                             Your verify code is incorrect !
                        </span>
                    </div>
                    <div class="flex flex-end justify-end">
                        <button type="submit" @click="hide" class="text-white bg-[#e04] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-2.5  py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cancel</button>
                        <button type="submit" class="ml-2 text-white bg-[#0062ff] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-2.5  py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Confirm Code</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
<script>
import axios from '../../axios-http'
export default {
    data() {
        return {
            isMatch: '',
            verify_code: '',
            sms_alert: '',
            notFound:false,
        }
    },
    emits: ['confirmation', 'hide', 'showResetForm'],
    methods: {
        hide() {
            this.$emit('hide', true);
        },
        verifyCode() {
            axios.post('verifyCode', {verify_code: this.verify_code})
            .then((response) => {
                console.log(response.data);
                this.showResetForm();
                this.hide();
            }).catch((response) => {
                this.notFound = true;
                console.log(response);
            })
        },
        showResetForm() {
            this.$emit('showResetForm', true);
        }
    }
}
</script>