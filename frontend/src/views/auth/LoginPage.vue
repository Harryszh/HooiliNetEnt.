<script setup>
import { ref } from 'vue'
import axios from 'axios'
import api from "../api/api"

const name = ref('')
const password = ref('')
const message = ref('')

async function login() {
  try {
    // 1. CSRF-Cookie holen (wichtig!)
    await axios.get('http://localhost:8000/sanctum/csrf-cookie', {
      withCredentials: true
    })

    // 2. Login
    await api.post('/login', {
      name: name.value,
      password: password.value
    })

    message.value = '✅ Login erfolgreich'

    // 3. User abfragen (optional)
    const res = await api.get('/user')

    console.log('Eingeloggt als:', res.data)

  } catch (e) {
    console.error(e)
    message.value = '❌ Login fehlgeschlagen'
  }
}
</script>

<template>
  <div>
    <input v-model="name" placeholder="Name" />
    <input v-model="password" type="password" placeholder="Passwort" />
    <button @click="login">Login</button>
    <p>{{ message }}</p>
  </div>
</template>
