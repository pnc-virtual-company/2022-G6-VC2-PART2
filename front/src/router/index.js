import { createRouter, createWebHistory } from 'vue-router'
import FormRegisterView from '../views/login/FormRegisterView.vue'
import ProfileView from '../views/Alumni/AlumniProfileView.vue'
import FormLoginView from '../views/login/FormLoginView.vue'
import EroList from '../views/Ero/EroListView.vue'
import VueCookies from 'vue-cookies'
import PageNotFound from '@/views/PageNotFound.vue'
import ListAlumniView from '../views/Ero/ListAlumniView.vue'
import NewRequestView from "../views/Ero/NewRequestView.vue"

const routes = [
  {
    path: '/profile',
    name: 'home',
    component: ProfileView,
    meta:{
      isAuthentication:true,
      userRole:'alumni',
    },
  },
  {
    path: '/register',
    name: 'register',
    component: FormRegisterView
  },
  {
    path: '/ero',
    name: 'ero',
    component: EroList,
    meta:{
      isAuthentication:true,
      userRole:'admin',
    },
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
    path: '/listAlumni',
    name: 'listAlumni',
    component: ListAlumniView,
    meta: {
      isAuthentication:true,
      userRole:'ero',
    }
  },
  {
    path: '/newRequest',
    name: 'newRequest',
    component: NewRequestView,
    meta:{
      isAuthentication:true,
      userRole:'ero',
    },
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
