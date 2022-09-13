import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import {library} from '@fortawesome/fontawesome-svg-core'
import {fas} from '@fortawesome/free-solid-svg-icons'
import {fab} from '@fortawesome/free-brands-svg-icons'

import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import VueSweetalert2 from 'vue-sweetalert2';



library.add(fas, fab);
const app = createApp(App)
app.use(VueSweetalert2);


createApp(App).use(router)
.component('fa', FontAwesomeIcon)
.mount('#app')
