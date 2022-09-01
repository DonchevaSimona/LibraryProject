import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/Home.vue'),
      meta: {
        pageTitle: 'All books in library',
      },
    },
    {
      path: '/current-rented',
      name: 'current-rented',
      component: () => import('@/views/CurrentRented.vue'),
      meta: {
        pageTitle: 'Currently rented books',
      },
    },
    {
      path: '/all-rented',
      name: 'all-rented',
      component: () => import('@/views/AllRented.vue'),
      meta: {
        pageTitle: 'All rented books',
      },
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/Login.vue'),
      meta: {
        layout: 'full',
      },
    },
    {
      path: '/donate-book',
      name: 'donate-book',
      component: () => import('@/views/DonateBook.vue'),
      meta: {
        pageTitle: 'Donate a book from your home library!',
      },
    },
    {
      path: '/error-404',
      name: 'error-404',
      component: () => import('@/views/error/Error404.vue'),
      meta: {
        layout: 'full',
      },
    },
    {
      path: '*',
      redirect: 'error-404',
    },
  ],
})

router.beforeEach((to, from, next) => {
  const tokenExpirationStorage = localStorage.getItem('tokenExpiration')
  const dt = new Date()
  if (tokenExpirationStorage !== null && tokenExpirationStorage < dt.setHours(dt.getHours())) {
    localStorage.removeItem('tokenExpiration')
    window.location.reload()
  }
  if (to.name !== 'login'
        && to.name !== 'register'
        && tokenExpirationStorage == null && tokenExpirationStorage < dt.setHours(dt.getHours())) {
    next({ name: 'login' })
  } else if (to.name === 'login' && tokenExpirationStorage !== null && tokenExpirationStorage > dt.setHours(dt.getHours())) {
    next({ name: 'home' })
  } else {
    next()
  }
})

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
  if (appLoading) {
    appLoading.style.display = 'none'
  }
})

export default router
