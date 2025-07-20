<template>
  <div>
    <h1>Registrierung</h1>
    <form @submit.prevent="register">
      <label for="username">Benutzername:</label>
      <input v-model="username" id="username" type="text" required autocomplete="username" />

      <label for="email">E-Mail:</label>
      <input v-model="email" id="email" type="email" required autocomplete="email" />

      <label for="password">Passwort:</label>
      <input v-model="password" id="password" type="password" required autocomplete="new-password" />

      <button type="submit">Registrieren</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const username = ref('');
const email = ref('');
const password = ref('');

function register() {
  console.log('Registrieren:', username.value, email.value, password.value);
}
</script>

<style scoped>
/* Styles hier */
</style>
