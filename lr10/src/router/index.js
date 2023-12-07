import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/product',
    name: 'Product',
    component: () => import('@/views/ProductPage')
  },
  {
    path: '/material',
    name: 'Material',
    component: () => import('@/views/MaterialPage'),
  },
  {
    path: '/product-edit/:id?',
    name: 'ProductEdit',
    props: (route) => {
      return {
        id: route.params.id,
      }
    },
    component: () => import('@/views/ProductEdit'),
  },
  {
    path: '/material-edit/:id?/:name?',
    name: 'MaterialEdit',
    props: (route) => {
      return {
        id: route.params.id,
        name: route.params.name
      }
    },
    component: () => import('@/views/MaterialEdit'),
  },
  {
    path: '/product-sorted/:filter_id?',
    name: 'ProductSorted',
    props: (route) => {
      return {
        id: route.params.filter_id,
      }
    },
    component: () => import('@/views/ProductSorted'),
  },
  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: () => import('@/views/ProductPage'),
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
