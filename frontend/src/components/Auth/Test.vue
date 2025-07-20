<script setup>
import { ref } from 'vue';



const sessionId = ref(null);
const userId = ref(null);
const userName = ref(null);

// Beispiel: Werte setzen (kann später per API geladen werden)
sessionId.value = 'abc123';
userId.value = 42;
userName.value = 'Harry';
</script>

<template>
  <div>
    <p>Session ID: {{ sessionId }}</p>
    <p>User ID: {{ userId }}</p>
    <p>User Name: {{ userName }}</p>
  </div>
</template>
