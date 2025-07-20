<template>
    <main class="main-pc">
      <div class="terminal">
        <h3>💻 Hooli-Terminal</h3>
        <p>📬 Neue Nachricht:<br><span class="msg-bold">„Die Ultras treffen sich heute vor dem Stadion.“</span></p>
  
        <div class="actions">
          <button @click="openChat">💬 Chat öffnen</button>
          <button @click="planAction">🔥 Aktion planen</button>
          <button @click="nachHause">🏠 Nach Hause</button>
          <button @click="vereinswahl">🏠 Vereins Wahl</button>
          <RouterLink to="/ligaplan" class="router-btn">📅 Zum Spielplan</RouterLink>
        </div>
  
        <transition name="fade">
          <p v-if="message" class="msg">{{ message }}</p>
        </transition>
      </div>
    </main>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
  
  const router = useRouter()
  const message = ref('')
  
  function nachHause() {
    router.push('/home')
  }
  function vereinswahl() {
    router.push('/vereinswahl')
  }
  
  function openChat() {
    message.value = '👥 Du betrittst den Gruppenchat... Es wird wild diskutiert.'
  }
  
  function planAction() {
    message.value = '🧨 Du planst eine Pyro-Aktion für heute Abend...'
  }
  </script>
  
  <style scoped>
  .main-pc {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: radial-gradient(ellipse at 60% 50%, #23272a 70%, #121212 100%);
    box-sizing: border-box;

    overflow: hidden;
  }
  
  .terminal {
    width: 80vw;
    height: 80vh;
    
   
    background: rgba(15,18,20,0.97);
    border-radius: 32px;
    border: 2.5px solid #27ffe7;
    box-shadow: 0 18px 54px #12a6a055, 0 2px 8px #0008;
    padding: 60px 50px 40px 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    color: #1fffc5;
    font-family: 'Fira Mono', 'Consolas', 'Menlo', monospace;
    font-size: 2.1rem;
    letter-spacing: 1.1px;
    position: relative;
    justify-content: center;
  }
  
  .terminal h3 {
    font-size: 3rem;
    letter-spacing: 2.5px;
    margin-bottom: 1.2rem;
    color: #5fffdc;
    text-shadow: 0 0 24px #2ee6b955, 0 2px 4px #222a;
  }
  
  .terminal p {
    margin-bottom: 1.2rem;
    font-size: 1.6rem;
    color: #1fffc5;
  }
  
  .msg-bold {
    display: inline-block;
    margin-top: 7px;
    color: #fffbe7;
    font-weight: bold;
    font-size: 1.32em;
    text-shadow: 0 0 5px #16ffc6bb;
  }
  
  .actions {
    margin-top: 1.4rem;
    margin-bottom: 2.5rem;
    display: flex;
    flex-wrap: wrap;
    gap: 1.2rem;
    justify-content: center;
  }
  
  .actions button,
  .router-btn {
    padding: 0.8rem 2.4rem;
    background: #101b18;
    border: 2px solid #27ffe7;
    color: #24ffe7;
    font-size: 1.3rem;
    font-family: 'Fira Mono', monospace;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.16s, border-color 0.18s, color 0.17s;
    outline: none;
    box-shadow: 0 3px 18px #14ffe34e;
    margin-bottom: 0.4rem;
    text-decoration: none;
  }
  
  .actions button:hover,
  .router-btn:hover {
    background: #172a21;
    color: #ffd666;
    border-color: #ffd666;
    box-shadow: 0 2px 22px #ffda7d88;
  }
  
  .router-btn {
    display: inline-block;
  }
  
  .msg {
    margin-top: 2.5rem;
    color: #fffbe8;
    background: linear-gradient(90deg, #232a2a77 0%, #18302b44 100%);
    padding: 1.2rem 2rem;
    border-radius: 13px;
    font-size: 1.25rem;
    min-height: 44px;
    box-shadow: 0 2px 14px #0003;
    border: 1.5px solid #26ffb7;
  }
  
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.28s;
  }
  .fade-enter-from, .fade-leave-to {
    opacity: 0;
  }
  
  @media (max-width: 900px), (max-height: 700px) {
    .terminal {
      width: 97vw;
      height: auto;
      min-width: 0;
      min-height: 0;
      padding: 18px 3vw;
      font-size: 1.1rem;
    }
    .terminal h3 {
      font-size: 1.5rem;
    }
    .actions button,
    .router-btn {
      font-size: 1rem;
      padding: 0.5rem 1rem;
    }
  }
  </style>
  