<script setup>
import TeamDropdown from '@/components/TeamDropdown.vue';
</script>

<template>
  <main>
    <div class="startscreen">
      <div>
        <h1>Team auswählen</h1>
        <TeamDropdown />
      </div>
    </div>
  </main>
</template>

<style scoped>
main {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100vh;
  background-image: url('@/assets/images/HooliganzCover.png');
  background-size: cover;
  background-position: center;
}

.startscreen {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.5); /* Halbtransparenter Hintergrund */
  padding: 30px;
  border-radius: 10px;
  width: 60%;
  color: white;
  text-align: center;
}

input,
select {
  margin: 1rem;
  padding: 0.5rem;
  font-size: 1rem;
}

button {
  margin: 0.5rem;
  padding: 1rem 2rem;
  font-size: 1.1rem;
  background: #2c3e50;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

button:disabled {
  background-color: #555;
  cursor: not-allowed;
}
</style>
