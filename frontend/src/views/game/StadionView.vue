<template>
    <main>
        <img src="/src\assets\images\Stadion.png" class="bg" alt="Stadion hinter dem Tor" />
      <div class="stadion">
        <div class="fans">
        <p>🍺 Rudi: "Ey, wir stehen hier wie die Wand, keiner kommt durch!"</p>
        <p>🥁 Hoolz: "Gleich knallt’s auf dem Rasen, Bruder!"</p>
        <p>🔥 Flex: "Nach dem Spiel gehen wir los, verstehst du?"</p>
      </div>
  
      <div class="actions">
        <button @click="orderBeer">🍺 Bier holen</button>
        <button @click="orderFood">🌭 Wurst holen</button>
        <button @click="goBack">🔙 Zurück</button>
      </div>
    </div>
      
    </main>
  </template>
  
  <script setup>
      import { useRouter } from 'vue-router';

      const router = useRouter();

      function orderBeer() {
       alert('Du hast ein Bier geholt! 🍻')
      }
     function orderFood() {
       alert('Du hast eine Wurst geholt! 🌭')
     }
    function goBack() {
     router.push('/home') // zurück zur Spielansicht
   }
  </script>
  
  <style scoped>
  .stadion {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    color: white;
    text-shadow: 1px 1px 3px black;
  }
  .bg {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    
  }
  
  
  
  </style>
  