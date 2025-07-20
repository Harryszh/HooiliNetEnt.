<template>
    <div v-if="user && user.futscher">
      <h3>Mein Verein</h3>
      <p>{{ user.futscher.name }}</p>
    </div>
    <div v-else>
      <p>Kein Verein gefunden.</p>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import axios from 'axios'
  
  const user = ref(null)
  
  onMounted(async () => {
    // API-Endpunkt ggf. anpassen!
    const response = await axios.get('http://localhost:8000/api/user')
    user.value = response.data
  })
  </script>
  