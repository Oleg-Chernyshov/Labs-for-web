import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/works',
    name: 'Works',
    component: () => import('@/views/WorksPage')
  },
  {
    path: '/types',
    name: 'Types',
    component: () => import('@/views/TypesPage'),
  },
  {
    path: '/work-edit/:id?',
    name: 'WorkEdit',
    props: (route) => {
      return {
        id: route.params.id,
      }
    },
    component: () => import('@/views/WorkEdit'),
  },
  {
    path: '/type-edit/:id?',
    name: 'TypeEdit',
    props: (route) => {
      return {
        id: route.params.id,
      }
    },
    component: () => import('@/views/TypeEdit'),
  },
  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: () => import('@/views/WorksPage'),
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
