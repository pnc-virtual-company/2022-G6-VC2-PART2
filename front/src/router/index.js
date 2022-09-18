import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Alumni/AlumniProfileView.vue'
import FormLoginView from '../views/login/FormLoginView.vue'
import VueCookies from 'vue-cookies'
import PageNotFound from '@/views/PageNotFound.vue'
const routes = [
  {
    path: '/profile',
    name: 'home',
    component: HomeView,
    meta:{
      isAuthentication:true,
      userRole:'alumni',
    },
  },
  {
    path:'/ero',
    name:'about',
    component:()=>import('../views/Ero/EroForm.vue')
  },
  {
    path: '/',
    name: 'login',
    component: FormLoginView,
    meta: {
      hide: true,
      isAuthentication:false,
    }
  },
  {
    path: '/logout',
    name: 'logout',
    component: FormLoginView,
    meta: {
      hide: true,
      logout: true,
    }
  },
  {
    path: '/:pathMatch(.*)*',
    component: PageNotFound,
    meta: {
      hide: true,
    }
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
router.beforeEach((to, from, next) => {
  let role = VueCookies.get('role')
  if (to.meta.isAuthentication) {
    console.log(to.path)
    if (!VueCookies.get("token") ) {
      next("/");
    } else if (to.meta.userRole == role) {
      next();
    } else{
      next('/')
    }
  } 
  else {
    next();
  }
});
export default router
