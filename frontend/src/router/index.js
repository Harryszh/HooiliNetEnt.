// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router'

// AUTH Pages
import StartScreen from '@/views/auth/StartScreen.vue'
import VereinsWahl from '@/views/auth/VereinsWahl.vue'
import LoginPage from '@/views/auth/LoginPage.vue'
import RegisterPage from '@/views/auth/RegisterPage.vue' // Register page import
import RegistriPag from '@/views/auth/RegistriPag.vue' // Register page import 

// MAIN Pages
import HomeView from '@/views/HomeView.vue'


import TeamDropdown from '@/components/TeamDropdown.vue'

// GAME Pages
import PcView from '@/views/game/PcView.vue'
import LigaplanPageVue from '@/components/LigaplanPage.vue'
import FridgePageView from '@/views/game/FridgePageView.vue'
import StadionView from '@/views/game/StadionView.vue'
import BarPageView from '@/views/game/BarPageView.vue'
import WCView from '@/views/game/WCView.vue'


// TEST Components
 import TestPage from '@/components/Auth/Test.vue' 

const routes = [
  // Auth RoutePaths
  { path: '/', name: 'StartScreen', component: StartScreen },
  { path: '/vereinswahl', name: 'Vereinswahl', component: VereinsWahl },
  { path: '/login', name: 'LoginPage', component: LoginPage },
  { path: '/register', name: 'RegisterPage', component: RegisterPage}, // Register page route
  { path: '/registri', name: 'RegistriPag', component: RegistriPag}, // Register page route

  // Main Routes
  { path: '/home', name: 'Home', component: HomeView },
  
  

  // Game Routes
  
  { path: '/pc', name: 'Pc', component: PcView },
  { path: '/ligaplan', name: 'Ligaplan', component: LigaplanPageVue },
  { path: '/bar', name: 'Bar', component: BarPageView },
  { path: '/fridge', name: 'Fridge', component: FridgePageView },
  { path: '/stadion', name: 'Stadion', component: StadionView },
  { path: '/wc', name: 'WC', component: WCView },

  // Test Route
  { path: '/test', name: 'Test', component: TestPage},
  { path: '/team-dropdown', name: 'TeamDropdown', component: TeamDropdown},
]
   

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router
