<template></template>

<!-- <template>
  <main>
    <div class="startscreen">
      <h1>Willkommen, {{ auth.user.name }}!</h1>

      <input
        v-model="alter"
        type="number"
        placeholder="Alter"
        class="input"
      />

      <label for="team-select">Wähle dein Team:</label>
      <select
        id="team-select"
        v-model="team"
        class="dropdown"
      >
        <option disabled value="">-- Bitte wählen --</option>
        <option
          v-for="t in teams"
          :key="t.id"
          :value="t"
        >
          {{ t.name }} ({{ t.stadt }})
        </option>
      </select>

      <button
        @click="startGame"
        :disabled="!alter || !team"
        class="start-btn"
      >
        Neues Spiel starten
      </button>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useAuthStore } from '../stores/auth'
import axios from 'axios'
import { useRouter } from 'vue-router'

const auth = useAuthStore()
const router = useRouter()

const alter = ref('')
const team = ref(null) // Speichert das ganze Team-Objekt
const teams = ref([])

// Teams laden
onMounted(async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/teams')
    teams.value = res.data
  } catch (error) {
    console.error('Fehler beim Laden der Teams:', error)
    teams.value = []
  }
})

function startGame() {
  // Alter und Team im Store speichern
  auth.user.age = alter.value
  auth.user.team = team.value // ganzes Team-Objekt speichern

  console.log('Spieler-Daten:', {
    alter: alter.value,
    team: team.value,
  })

  // Optional: Daten an Backend schicken
  // await axios.post('/api/start-game', { age: alter.value, team: team.value })

  router.push('/game') // Weiter ins Spiel
}
</script>

<style scoped>
.startscreen {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  max-width: 400px;
  margin: 2rem auto;
  font-family: Arial, sans-serif;
}

.input,
.dropdown {
  padding: 8px;
  font-size: 16px;
}

.start-btn {
  padding: 10px;
  font-size: 18px;
  background-color: #4caf50;
  color: white;
  border: none;
  cursor: pointer;
}

.start-btn:disabled {
  background-color: #aaa;
  cursor: not-allowed;
}
</style>
 -->