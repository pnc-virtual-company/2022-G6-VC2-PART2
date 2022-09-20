<template>
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full p-6 bg-white rounded-lg shadow md:mt-0 sm:max-w-md sm:p-8">
                <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-black text-center">
                    Forgot your password?
                </h2>
                <p class="p-3 text-center">Enter your email and we'll send you a link to reset your password</p>
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="#" @submit.prevent="findEmail">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black p-2">Your email</label>
                        <input type="email" name="email" id="email" class="p-3 bg-primary-50 border border-blue-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-primary-700 dark:border-primary-600 dark:placeholder-primary-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="" v-model="email">
                        <span v-if="notFound" class="text-[#ef4444] text-center">
                             Email not found !
                        </span>
                    </div>
                    <div class="flex flex-end justify-end">
                        <button @click="hide" type="button" class="  bg-[#ef4444] text-white hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-2.5  py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Cancel</button>
                        <button type="submit" class="ml-3 text-white bg-[#0062ff] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-2.5  py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Verify Code</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
<script>
import axios from '../../axios-http'
export default {
    emit: ['hide', 'showVerifyForm'],
    data() {
        return {
            email:'',
            verify_code: '',
            notFound:false,
        }
    },
    methods: {
        hide() {
            this.$emit('hide', false);
        },
        showVerifyForm() {
            this.$emit('showVerifyForm', true, this.email);
        },
        findEmail() {
            let chars = "01234567890123456789012345678901234567890123456789123456789";
            let string_length = 6;
            let random_string = ""
            for (let i = 0; i < string_length; i++) {
                let rnum = Math.floor(Math.random() * chars.length);
                random_string += chars.substring(rnum, rnum + 1);
            }
            this.verify_code = random_string;
            axios.post('forgot', {email: this.email, verify_code: this.verify_code})
            .then((response) => {
                console.log(response.data);
                this.hide();
                this.showVerifyForm();
            }).catch((response) => {
                this.notFound = true;
                console.log(response);
            })
        }
    }
}
</script>