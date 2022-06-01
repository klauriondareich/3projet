import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/auth/home',
    component: () => import ('../views/Appbar.vue'),
    children:[
      {
        path: '/auth/home',
        component: () => import ('../views/Home.vue')
      },
      {
        path: '/auth/account',
        component: () => import ('../views/Account.vue')
      },
      {
        path: '/auth/documents',
        component: () => import ('../views/ListDocuments.vue')
      }
    ]
  },
  {
    path: '',
    redirect: '/user/login'
  },
  
  {
    path: '/user/login',
    component: () => import ('../views/Login.vue')
  },
  {
    path: '/user/register',
    component: () => import ('../views/Register.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
