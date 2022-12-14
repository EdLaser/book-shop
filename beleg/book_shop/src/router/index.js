import { createRouter, createWebHistory } from 'vue-router'
import BookShopView from '../views/BookShopView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/book-shop',
      name: 'bookshop',
      component: BookShopView
    }
  ]
})

export default router
