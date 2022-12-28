import { createRouter, createWebHistory } from 'vue-router'
import BookShopView from '../views/BookShopView.vue'
import Checkout from '../components/Checkout.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'bookshop',
      component: BookShopView
    },
    {
      path: '/checkout',
      name: 'Checkout',
      component: Checkout
    }
  ]
})

export default router
