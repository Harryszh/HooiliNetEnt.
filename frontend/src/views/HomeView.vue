<script setup>
import { ref, onMounted } from 'vue'
import Unterteil from '@/components/Unterteil.vue'
import Header from '@/components/Header.vue'
import axios from 'axios'

const user = ref(null)

onMounted(async () => {
  try {
    const token = localStorage.getItem('token')
    const response = await axios.get('http://localhost:8000/api/user', {
      headers: {
        Authorization: `Bearer ${token}`
      }
    })
    user.value = response.data
    console.log('Angemeldeter Benutzer:', user.value)
  } catch (error) {
    console.error('Fehler beim Laden des Users:', error)
  }
})
</script>


<template>
  <div class="game-scroll-bg">
    <Header />
    <section class="game-home-bg">
      
  

    

      <RouterLink to="/pc">
        <div class="pc-button">
          <button class="hotspot-btn">Harrys Enterprise</button>
        </div>
      </RouterLink>
      <RouterLink to="/stadion">
        <div>
          <button class="stadion-button"> </button>
        </div>
      </RouterLink>
    </section>
    
    <section class="unterteil">
      <Unterteil />
    </section>
  </div>
</template>

<style scoped>
/* Haupt-Wrapper für Scrollbarkeit */
.game-scroll-bg {
  width: 100vw;
  min-height: 100vh;
 
  display: flex;
  flex-direction: column;
  background: #12181f;
}

/* Oberer Bereich: Zimmer, z.B. 90% Höhe */
.game-home-bg {
  width: 100vw;
  height: 100vh;           /* Sichtbarer Bereich (z. B. 90% des Screens) */
 
  background-image: url('@/assets/images/zimmer.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  position: relative;
  z-index: 1;
}

/* Unterer Bereich: Gang/Bar, erst beim Scrollen sichtbar */
.unterteil {
  width: 100vw;
  height: 60vh;           /* Volle Höhe – jetzt wird gescrollt! */
  margin: 0;
  padding: 0;
  background-image: url('@/assets/images/gang.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
}

/* Unsichtbarer, positionierter Button über dem PC */
.pc-button {
  position: absolute;
  top: 35%;     /* Feinjustieren! */
  left: 68%;    /* Feinjustieren! */
  width: 10%;
  height: 10vh;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
  background: none;
  pointer-events: auto;
}
.hotspot-btn {
  font-size: 0.9rem;
  padding: 0.7rem 1.5rem;
  background: #23272aee;
  color: #00ffbb;
  border: 2.5px solid #00ffbb;
  border-radius: 12px;
  cursor: pointer;
  box-shadow: 0 2px 18px #0008;
  transition: background 0.2s, transform 0.18s;
  opacity: 0.9;
}
.hotspot-btn:hover {
  color: #23272a;
  background: #00ffbb;
  opacity: 1;
  transform: scale(1.07);
}
.stadion-button {
  position: absolute;
  top: 18%;
  left: 62%;
  width: 20vw;
  height: 20vh;
  background: transparent;
  cursor: pointer;
  outline: none;
  border: none;
  z-index: 10;
  /* Optional: beim Hover sichtbar machen */
  transition: background 0.18s;
}
.stadion-button:hover,
.stadion-button:focus {
  background: rgba(0, 255, 187, 0.11);
  box-shadow: 0 2px 16px #00ffbb44;
}


</style>

<!-- Globale Styles in App.vue oder main.css ergänzen -->
<!--
html, body, #app {
  margin: 0;
  padding: 0;
  min-width: 100vw;
  min-height: 100vh;
  width: 100vw;
  height: 100vh;
  box-sizing: border-box;
  overflow-x: hidden;
}
-->
