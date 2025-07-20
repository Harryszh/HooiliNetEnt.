import { defineStore } from 'pinia'
import axios from 'axios'

export const useUserStore = defineStore('user', {
  state: () => ({
    müdigkeit: 0,
    hunger: 0,
    durst: 0,
    bedürfnis: 0
  }),

  actions: {
    async ladeWerte() {
      try {
        const response = await axios.get('/api/spieler/werte');
        this.müdigkeit = response.data.müdigkeit
        this.hunger = response.data.hunger
        this.durst = response.data.durst
        this.bedürfnis = response.data.bedürfnis
      } catch (error) {
        console.error('Fehler beim Laden der Spielerwerte:', error)
      }
    }
  }
})
