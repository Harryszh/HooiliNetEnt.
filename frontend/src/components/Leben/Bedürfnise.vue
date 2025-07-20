<script setup>
import { useAuthStore } from '@/stores/auth'
import { useUserStore } from '@/stores/user'

const authStore = useAuthStore()
const userStore = useUserStore()
</script>

<template>
  <div>
    <div class="bedürfnisse">
         
      <ul>
        <li>😴 Müdigkeit: {{ müdigkeit }}</li>
        <li>🍔 Hunger: {{ hunger }}</li>
        <li>🚰 Durst: {{ durst }}</li>
        <li>💩 Bedürfnis: {{ bedürfnis }}</li>
      </ul>
    </div>
  </div>
</template>

<style>
.bedürfnisse {
  display: flex;
  flex-direction: row;
  background-color: rgba(16, 16, 22, 0.42); /* halbtransparentes Schwarz-Blau */
  padding: 0.5rem;
  border-radius: 8px;
  color: white;
  box-shadow: 0 1px 6px #0006;
  backdrop-filter: blur(1.5px); /* optional: leichter Glass-Blur-Effekt */
}
.bedürfnisse ul {
  list-style: none;
  display: flex;
  flex-direction: row;
  gap: 1.5rem;
}
</style>