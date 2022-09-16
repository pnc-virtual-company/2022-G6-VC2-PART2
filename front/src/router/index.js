import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Alumni/AlumniProfileView.vue'
import FormLoginView from '../views/FormLoginView.vue'







const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',

    component: () => import('../views/AboutView.vue')
  },
  {
    path: '/login',
    name: 'login',
    component: FormLoginView

   
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
