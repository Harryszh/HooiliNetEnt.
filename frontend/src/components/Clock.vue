<template>
    <div class="clock">
      <span class="clock-time">{{ time }}</span>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  
  const time = ref('')
  
  function updateTime() {
    const now = new Date()
    time.value = now.toLocaleTimeString('de-CH', {
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    })
  }
  
  onMounted(() => {
    updateTime()
    setInterval(updateTime, 1000)
  })
  </script>
  
  <style scoped>
  .clock {
  font-size: 0.3rem;
  font-weight: bold;
  background: rgba(16, 16, 22, 0.42);   /* halbtransparentes Schwarz-Blau! */
  padding: 0.15rem 0.5rem;
  border-radius: 8px;
  color: white;
  display: inline-block;
  box-shadow: 0 1px 6px #0006;
  backdrop-filter: blur(1.5px);          /* optional: leichter Glass-Blur-Effekt */
}

  
  .clock-time {
    color: #f22;           /* kräftiges Rot für die Uhrzeit */
    font-family: 'Courier New', Courier, monospace;
    letter-spacing: 1px;
  }
  </style>
  