<script setup>

import { useRouter } from 'vue-router'

const router = useRouter()

function goBack() {
    router.push('/home') // zurück zur Spielansicht
  }




</script>

<template>
  <main>
    <div class="background-img">
      <div class="button-container">
        
        <button class="transparent-btn" @click="goBack">🔙 Zurück </button>
    </div>
      </div>
    
  </main>
</template>

<style scoped>
.background-img {
  background-image: url('@/assets/images/Wc.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

.button-container {
  display: flex;
  flex-direction: column;
  gap: 20px;
  z-index: 1;
}

.transparent-btn {
  background-color: transparent;
  border: 2px solid white;
  color: white;
  padding: 12px 24px;
  font-size: 18px;
  cursor: pointer;
  border-radius: 8px;
  transition: background-color 0.3s, color 0.3s;
}

.transparent-btn:hover {
  background-color: white;
  color: black;
}
</style>
