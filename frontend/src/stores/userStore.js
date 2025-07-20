import { defineStore } from "pinia";
import api from "../api/api";

export const useUserStore = defineStore("user", {
  state: () => ({
    user: null,
    spielerWerte: null,
    error: null,
  }),
  actions: {
    async fetchUser() {
      try {
        const res = await api.get("/user");
        this.user = res.data;
      } catch (err) {
        this.user = null;
      }
    },
    async login(credentials) {
      try {
        await api.get("/sanctum/csrf-cookie"); // für Sanctum
        await api.post("/login", credentials);
        await this.fetchUser();
      } catch (err) {
        this.error = "Login fehlgeschlagen";
      }
    },
    async register(data) {
      try {
        await api.post("/register", data);
        await this.fetchUser();
      } catch (err) {
        this.error = "Registrierung fehlgeschlagen";
      }
    },
    async logout() {
      await api.post("/logout");
      this.user = null;
    },
    async fetchSpielerWerte() {
      try {
        const res = await api.get("/spieler/werte");
        this.spielerWerte = res.data;
      } catch (err) {
        this.error = "Spielerwerte konnten nicht geladen werden.";
      }
    },
  },
});
