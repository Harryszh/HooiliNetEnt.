<script setup>
import { ref } from 'vue'
import api from '@/api/api'

const login = ref({
  username: '',  // 👈 statt email
  password: ''
})

const error = ref(null)

const submitLogin = async () => {
  error.value = null

  try {
    const response = await api.post('/login', login.value)

    localStorage.setItem('token', response.data.token)

    window.location.href = '/dashboard'
  } catch (err) {
    if (err.response?.status === 401) {
      error.value = 'Benutzername oder Passwort falsch'
    } else {
      error.value = 'Fehler beim Login'
    }
    console.error(err)
  }
}
</script>

<template>
  <div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
      <h2 class="text-xl font-bold text-center mb-4">Login</h2>

      <form @submit.prevent="submitLogin" class="space-y-4">
        <div>
          <label class="block mb-1 text-sm font-medium">Benutzername</label>
          <input
            v-model="login.username"
            type="text"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring"
            required
          />
        </div>

        <div>
          <label class="block mb-1 text-sm font-medium">Passwort</label>
          <input
            v-model="login.password"
            type="password"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring"
            required
          />
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
        >
          Einloggen
        </button>

        <p v-if="error" class="text-red-500 text-center text-sm mt-2">{{ error }}</p>
      </form>
    </div>
  </div>
</template>
