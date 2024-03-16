import { createRouter, createWebHistory } from 'vue-router'
import SigninView from '@/views/Authentication/SigninView.vue'
import SignupView from '@/views/Authentication/SignupView.vue'
import CalendarView from '@/views/CalendarView.vue'
import ECommerceView from '@/views/Dashboard/DashboardView.vue'
import FormElementsView from '@/views/Forms/FormElementsView.vue'
import FormLayoutView from '@/views/Forms/FormLayoutView.vue'
import SettingsView from '@/views/Pages/SettingsView.vue'
import ProfileView from '@/views/ProfileView.vue'
import TablesView from '@/views/TablesView.vue'
import AlertsView from '@/views/UiElements/AlertsView.vue'
import ButtonsView from '@/views/UiElements/ButtonsView.vue'
import DashboardView from '@/views/Dashboard/DashboardView.vue'
import CreateView from '@/views/Sales/CreateView.vue'
import SalesView from '../views/Sales/SalesView.vue'
import EditSalesView from '@/views/Sales/EditSalesView.vue'
import CreateFuelInfoView from '@/views/Fuels/CreateFuelInfoView.vue'
import AllFuelsInfoView from '@/views/Fuels/AllFuelsInfoView.vue'
import EditFuelsInfoView from '@/views/Fuels/EditFuelsInfoView.vue'
import CreateStockInfView from '@/views/Stocks/CreateStockInfView.vue'
import AllStockInfoView from '@/views/Stocks/AllStockInfoView.vue'
import EditStockInfView from '@/views/Stocks/EditStockInfView.vue'
import CreateInveInfoView from '@/views/Inventories/CreateInveInfoView.vue'
import AllInvInfoView from '@/views/Inventories/AllInvInfoView.vue'
import EditInvInfoView from '@/views/Inventories/EditInvInfoView.vue'
import ResertPasswordView from '@/views/Authentication/ResertPasswordView.vue'

const routes = [
  {
    path: '/dashboard',
    name: 'adminDashboard',
    component:  DashboardView,
    meta: {
      title: 'admin Dashboard'
    }
  },
  
  {
    path: '/profile',
    name: 'profile',
    component: ProfileView,
    meta: {
      title: 'Profile'
    }
  },
  {
    path: '/forms/form-elements',
    name: 'formElements',
    component: FormElementsView,
    meta: {
      title: 'Form Elements'
    }
  },
  //sales
  {
    path:'/create-sale',
    name: 'create-sale',
    component: CreateView,
    meta: {
      title: 'Create Sales'
    }
  },

  {
    path: '/sales',
    name: 'sales',
    component: SalesView,
    meta: {
      title: 'All Sales'
    }
  },

  {
    path: '/edit-sale/:id',
    name: 'EditSale',
    component: EditSalesView,
    props: true,
  },
  //ends

  //fules
  {
    path:'/create-fuel',
    name: 'create-fuel',
    component: CreateFuelInfoView,
    meta: {
      title: 'Create Fuels inof'
    }
  },
  
  {
    path: '/fuels',
    name: 'fuels',
    component: AllFuelsInfoView,
    meta: {
      title: 'All Fuels info'
    }
  },
  {
    path: '/edit-fuel/:id',
    name: 'EditFuel',
    component: EditFuelsInfoView,
    props: true,
  },
  //ends

  //stocks
  {
    path:'/create-stock',
    name: 'create-stock',
    component: CreateStockInfView,
    meta: {
      title: 'Create Stocks info'
    }
  },
  {
    path: '/stocks',
    name: 'stocks',
    component: AllStockInfoView,
    meta: {
      title: 'All Stock info'
    }
  },
{
  path: '/edit-stock/:id',
  name: 'EditStock',
  component: EditStockInfView,
  props: true,
},
  //ends


  //stocks
  {
    path:'/create-inventory',
    name: 'create-inventory',
    component: CreateInveInfoView,
    meta: {
      title: 'Create Stocks info'
    }
  },
  {
    path: '/inventories',
    name: 'inventories',
    component: AllInvInfoView,
    meta: {
      title: 'All Inventory info'
    }
  },
  {
    path: '/edit-inventory/:id',
    name: 'EditInventory',
    component: EditInvInfoView,
    props: true,
  },
  //ends

  {
    path: '/tables',
    name: 'tables',
    component: TablesView,
    meta: {
      title: 'Tables'
    }
  },
  {
    path: '/pages/settings',
    name: 'settings',
    component: SettingsView,
    meta: {
      title: 'Settings'
    }
  },
 
  {
    path: '/ui-elements/alerts',
    name: 'alerts',
    component: AlertsView,
    meta: {
      title: 'Alerts'
    }
  },
  {
    path: '/ui-elements/buttons',
    name: 'buttons',
    component: ButtonsView,
    meta: {
      title: 'Buttons'
    }
  },
  {
    path: '/',
    name: 'signin',
    component: SigninView,
    meta: {
      title: 'Signin'
    }
  },
  {
    path: '/auth/signup',
    name: 'signup',
    component: SignupView,
    meta: {
      title: 'Signup'
    }
  },
  {
    path: '/auth/resert-password',
    name: 'resert-password',
    component: ResertPasswordView,
    meta: {
      title: 'resert-password'
    }
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { left: 0, top: 0 }
  }
})

router.beforeEach((to, from, next) => {
  document.title = `Vue.js ${to.meta.title} | Petrol station management application`
  next()
})

export default router
