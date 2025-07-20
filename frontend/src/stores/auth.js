//auth.js

import { defineStore } from 'pinia'
import axios from 'axios'




axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.withCredentials = true

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    token: null,
  }),

  actions: {
    async login(name, password) {
      try {
        const res = await axios.post('/api/login', {
          name,
          password
        });
        this.user = res.data.user;
        this.token = res.data.token;
      } catch (error) {
        console.error('Login fehlgeschlagen:', error)
      }
    },

    async register(name, password) {
      try {
        const res = await axios.post('/api/register', {
          name,
          password,
          
        });
        this.user = res.data.user || null;
        this.token = res.data.token || null;
      } catch (error) {
        console.error('Registrierung fehlgeschlagen:', error)
      }
    },

    logout() {
      this.user = null
      this.token = null
    }
  }
})
