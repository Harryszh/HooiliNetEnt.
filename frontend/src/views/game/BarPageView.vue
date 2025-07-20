<template>
    <div class="bar">
      <img :src="barImage" class="bg" alt="Bar Szene" />
  
      <div class="events">
        <h2>🍻 Die Bar</h2>
        <ul>
          <li @click="drink">Trinken gehen 🍺</li>
          <li @click="meet">Frauen kennenlernen 💃</li>
          <li @click="train">Boxsack kloppen 💪</li>
          <li @click="fight">Stress anfangen 🥊</li>
        </ul>
      </div>
  
      <div class="actions">
        <button @click="goBack">🔙 Zurück</button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useRouter } from 'vue-router'
  import barImage from '@/assets/images/Bar.png' // <-- Bild importieren
  
  const router = useRouter()
  
  function drink() {
    alert('Du trinkst ein kaltes Bier. 🍻 Stimmung steigt.')
  }
  
  function meet() {
    alert('Du versuchst zu flirten... 😏 Mal sehen, wie’s läuft.')
  }
  
  function train() {
    alert('Du schlägst ein paar Mal gegen den Boxsack. 🥊 Kraft +1')
  }
  
  function fight() {
    alert('Du hast Stress gemacht! Die Stimmung kippt... 💢')
  }
  
  function goBack() {
    router.push('/home')
  }
  </script>
  
  <style scoped>
  .bar {
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
    z-index: -1;
  }
  
  .events {
    padding: 2rem;
    font-size: 1.3rem;
    background-color: rgba(0, 0, 0, 0.6);
    margin: 2rem;
    border-radius: 10px;
  }
  
  .events ul {
    list-style: none;
    padding: 0;
  }
  
  .events li {
    margin: 1rem 0;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
  }
  
  .events li:hover {
    color: #ffd700;
  }
  
  .actions {
    position: absolute;
    bottom: 20px;
    left: 20px;
  }
  
  button {
    padding: 0.6rem 1.2rem;
    font-size: 1.1rem;
    background-color: darkred;
    color: white;
    border: 2px solid white;
    cursor: pointer;
  }
  </style>
  
