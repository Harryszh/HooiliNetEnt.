<template>
    <div class="verein-card">
      <h2>{{ vereinsName }}</h2>
      <p v-if="beschreibung">{{ beschreibung }}</p>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue'
  
  // Props für den Vereinsnamen und optional eine Beschreibung
  defineProps({
    vereinsName: {
      type: String,
      required: true
    },
    beschreibung: {
      type: String,
      default: ''
    }
  })
  </script>
  
  <style scoped>
  .verein-card {
    border: 2px solid #4CAF50;
    border-radius: 8px;
    padding: 16px;
    max-width: 400px;
    background-color: #f9f9f9;
  }
  .verein-card h2 {
    color: #4CAF50;
    margin: 0 0 8px;
  }
  </style>
  