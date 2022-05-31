import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';

const routes: Array<RouteRecordRaw> = [
  {
    path: '',
    redirect: '/folder/Inbox'
  },
  {
    path: '/folder/:id',
    component: () => import ('../views/FolderPage.vue')
  },
  {
    path: '/home',
    component: () => import ('../views/Home.vue')
  },
  {
    path: '/login',
    component: () => import ('../views/Login.vue')
  },
  {
    path: '/register',
    component: () => import ('../views/Register.vue')
  },
  {
    path: '/account',
    component: () => import ('../views/Account.vue')
  },
  {
    path: '/documents',
    component: () => import ('../views/ListDocuments.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
