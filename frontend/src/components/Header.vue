<script setup>
import { ref } from 'vue'
import Clock from '@/components/Clock.vue'
import Bedürfnise from '@/components/Leben/Bedürfnise.vue'

const open = ref(false)

function toggleOpen() { open.value = !open.value }
function onOpen() { open.value = true }
function onClose() { open.value = false }
</script>

<template>
  <header
    class="app-header"
    :class="{ visible: open }"
    @mouseenter="onOpen"
    @mouseleave="onClose"
    @touchstart="toggleOpen"
  >
    <div class="header-content">
      <!-- Boxen in einer Reihe -->
      <div class="status-panel">
        <div class="box-panel">
          <h3>Status</h3>
          <p>⚡ Energie</p>
          <p>🍗 Hunger</p>
          <p>😎 Charakter</p>
        </div>

        <div class="box-panel">
          <h3>Stats</h3>
          <p>💪 Stärke</p>
          <p>🏆 Siege</p>
          <p>💔 Niederlagen</p>
        </div>

        <div class="box-panel">
          <h3>Rang & Level</h3>
          <p>👥 Hooligans</p>
          <p>🎖️ Respekt</p>
          <p>📣 Ruf</p>
          <p>📈 Level</p>
        </div>
      </div>

      <div class="unterteil">
        <div class="box-panel-one">
          <div>
            <Bedürfnise />
          </div>
        </div>
        
        <div class="clock">
          <Clock />
        </div>
      
        <div class="box-panel-one">
          <div>
            <Bedürfnise />
          </div>
          
        </div>
      </div>
    
    </div>
  </header>
</template>

<style scoped>
.app-header {
  position: fixed;
  top: -32vh; /* Anfang: leicht versteckt */
  left: 0;
  right: 0;
  height: 40%;
  background-image: url('@/assets/images/header-bg.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  box-shadow: 0 2px 16px #000a;
  transition: top 0.38s cubic-bezier(.52,1.53,.61,1);
  z-index: 999;
  padding: 1vh 2vw;
}

.app-header.visible {
  top: 0;
}

.header-content {
  display: flex;
  flex-direction: column; /* Boxen und Uhr übereinander */
  align-items: center;
  width: 80%;
}

.status-panel {
  display: flex;
  gap: 1.5rem;
  justify-content: center;
  margin-bottom: 0.5rem; /* Abstand zur Uhr */
}

.box-panel {
  background-color: rgba(0, 0, 0, 0.5);
  padding: 0.8rem 1rem;
  border-radius: 10px;
  color: #fff;
  width: 220px;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.clock {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2rem;
  color: #fff;
  text-shadow: 0 0 8px #000;
}
.box-panel-one {
  display: flex;
  
 
  width: 602px;

}
.unterteil {
  display: flex;
  flex-direction: row;
  height: 50px;
  gap: 20px;

}
</style>
