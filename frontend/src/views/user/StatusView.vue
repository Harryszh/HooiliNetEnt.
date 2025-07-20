<template>
  <main>
    <div class="startscreen">
      <h1>
        
      </h1>
      <input v-model="name" placeholder="Dein Name" />
      <select v-model="team">
        <option disabled value="">Team wählen</option>
        <option v-for="teamObj in teams" :key="teamObj.id" :value="teamObj.id">
          {{ teamObj.name }}
        </option>
      </select>
      <button @click="startGame" :disabled="!name || !team">Neues Spiel starten</button>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const name = ref('')
const team = ref('')
const teams = ref([])

onMounted(async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/teams') // Passe ggf. die URL an
    teams.value = res.data
  } catch (error) {
    teams.value = []
    // Fehler-Handling, z.B. Fehlermeldung anzeigen
  }
})

function startGame() {
  // Hier kommt deine Startlogik rein
  alert(`Viel Spaß, ${name.value}! Dein Team: ${teams.value.find(t => t.id === +team.value)?.name ?? team.value}`)
  // z.B. Weiterleitung, Charakter anlegen usw.
}
</script>

<style scoped>
main {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100vw;
  height: 100vh;
  background-image: url('@/assets/HooliganzCover.png');
  background-size: cover; 
  background-position: center;
}
.startscreen {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.55);
  padding: 30px;
  border-radius: 10px;
  width: 60%;
  color: white;
  text-align: center;
}
input, select {
  margin: 1rem;
  padding: 0.5rem;
  font-size: 1rem;
}
button {
  margin: 0.5rem;
  padding: 1rem 2rem;
  font-size: 1.1rem;
  background: #2c3e50;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}
button:disabled {
  background-color: #555;
  cursor: not-allowed;
}
</style>
