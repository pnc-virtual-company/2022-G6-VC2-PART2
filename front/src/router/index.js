import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Alumni/AlumniProfileView.vue'
import FormLoginView from '../views/login/FormLoginView.vue'
const routes = [
  {
    path: '/profile',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',

    component: () => import('../views/AboutView.vue')
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
