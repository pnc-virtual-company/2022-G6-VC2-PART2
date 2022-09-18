import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Alumni/AlumniProfileView.vue'
import FormLoginView from '../views/login/FormLoginView.vue'
import EroInformationView from '../views/Ero/EroInformationView.vue'
const routes = [
  {
    path: '/profile',
    name: 'home',
    component: HomeView
  },
  {
    path: '/ero',
    name: 'ero',
    component: EroInformationView
  },
  {
    path: '/',
    name: 'login',
    component: FormLoginView,
    meta: {
      hide: true,
    }
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
