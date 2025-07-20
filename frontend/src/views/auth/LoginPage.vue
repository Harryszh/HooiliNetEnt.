<script setup>
import { ref } from 'vue'
import axios from 'axios'

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
    await axios.post('http://localhost:8000/login', {
      name: name.value,
      password: password.value
    }, {
      withCredentials: true
    })

    message.value = '✅ Login erfolgreich'

    // 3. User abfragen (optional)
    const res = await axios.get('http://localhost:8000/api/user', {
      withCredentials: true
    })

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
