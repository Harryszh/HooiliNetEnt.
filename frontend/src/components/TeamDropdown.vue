<script setup>
import { ref, onMounted } from "vue";
import axios from "axios"; // nicht vergessen, Axios zu importieren!

// Alle Teams aus der API
const teams = ref([]); // <--- FEHLTE bisher

// Vom User ausgewähltes Team
const selectedTeam = ref("");

// Teams laden
const loadTeams = async () => {
  try {
    const response = await axios.get("http://localhost:8000/api/teams");
    teams.value = response.data; // z.B. [{id: 1, name: 'Hooliganz'}, ...]
  } catch (error) {
    console.error("❌ Fehler beim Laden der Teams:", error);
  }
};

// Wenn die Komponente gemountet wird, Daten holen
onMounted(() => {
  loadTeams();
});
</script>

<template>
  <div class="team-dropdown">
    <label for="team-select">Wähle dein Team:</label>
    <select id="team-select" v-model="selectedTeam">
      <option disabled value="">-- Bitte Team wählen --</option>
      <option
        v-for="team in teams"
        :key="team.id"
        :value="team.name"
      >
        {{ team.name }}
      </option>
    </select>

    <p v-if="selectedTeam">
      ✅ Du hast <strong>{{ selectedTeam }}</strong> gewählt!
    </p>
  </div>
</template>

<style scoped>
.team-dropdown {
  margin: 1rem;
  font-family: Arial, sans-serif;
}

#team-select {
  padding: 8px;
  font-size: 16px;
}
</style>
