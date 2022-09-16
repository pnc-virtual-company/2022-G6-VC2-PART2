import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Alumni/AlumniProfileView.vue'
// import FormloginView from '../views/FormloginView.vue'

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
  // {
  //   path: '/loginLogout',
  //   name: 'loginLogout',
  //   component: FormloginView
  // },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
