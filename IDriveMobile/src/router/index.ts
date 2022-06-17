import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/auth/home',
    component: () => import ('../views/Appbar.vue'),
    children:[
      {
        name: "Home",
        path: '/auth/home',
        component: () => import ('../views/Home.vue'),
        meta:{
          requiresAuth: true,
        }
      },
      {
        name: "Account",
        path: '/auth/account',
        component: () => import ('../views/Account.vue'),
        meta:{
          requiresAuth: true,
        }
      },
      {
        name: "Documents",
        path: '/auth/documents',
        component: () => import ('../views/ListDocuments.vue'),
        meta:{
          requiresAuth: true,
        } 
      }
    ]
  },
  {
    path: '',
    redirect: '/user/login'
  },
  
  {
    name: "Login",
    path: '/user/login',
    component: () => import ('../views/Login.vue')
  },
  {
    name: "Register",
    path: '/user/register',
    component: () => import ('../views/Register.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
router.beforeEach((to, from, next) =>{

  const tokenExist = localStorage.getItem("auth-token") || "";

  const requiresAuth = to.matched.some(route => route.meta.requiresAuth); 
  if(requiresAuth && !tokenExist) next({name: "Login"}); // Redirect to login page when the non logged in user try to access pages
  else if (!requiresAuth  && tokenExist) next({name: "Home"}) // Prevent from go to login or register page when the user is logged in
  else next()
})

export default router
