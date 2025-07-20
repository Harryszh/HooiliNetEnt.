<script setup>
import { ref, onMounted } from 'vue'

const teams = ref([])

onMounted(async () => {
  const res = await fetch('http://localhost:8000/api/teams') // ggf. URL anpassen!
  teams.value = await res.json()
})
</script>

<template>
  <div class="teams-tabelle">
    <h2>Alle Mannschaften</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Stadt</th>
          <th>Punkte</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="team in teams" :key="team.id">
          <td>{{ team.name }}</td>
          <td>{{ team.stadt }}</td>
          <td>{{ team.punkte }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
.teams-tabelle {
  margin: 2rem auto;
  width: 95vw;
  max-width: 800px;
  background: #10171dcc;
  border-radius: 15px;
  box-shadow: 0 4px 20px #0007;
  padding: 2rem 1rem;
}
h2 {
  color: #00ffbb;
  text-align: center;
  margin-bottom: 1.5rem;
}
table {
  width: 100%;
  border-collapse: collapse;
  color: #fff;
}
th, td {
  padding: 0.9rem 0.4rem;
  text-align: center;
  border-bottom: 1px solid #2227;
}
th {
  background: #00ffbb33;
  color: #10171d;
}
tbody tr:hover {
  background: #00ffbb14;
}
</style>
