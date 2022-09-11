import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import {library} from '@fortawesome/fontawesome-svg-core'
import {fas} from '@fortawesome/free-solid-svg-icons'
import {fab} from '@fortawesome/free-brands-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
// import {axios} from 'axios'
// export default axios.create({
//     baseURL: process.env.VUE_APP_API_URL,
//     headers: {
//       "Content-type": "application/json"
//     }
//   });
library.add(fas, fab);


createApp(App).use(router)
.component('fa', FontAwesomeIcon)
.mount('#app')
