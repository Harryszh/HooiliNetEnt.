<template>
    <div class="need-bar">
      <div>
        <span class="need-label">Hunger:</span>
        <div class="bar-bg">
          <div class="bar-fill" :style="{ width: hunger + '%' }"></div>
        </div>
        <span class="need-value">{{ hunger }}</span>
      </div>
      <div>
        <span class="need-label">Durst:</span>
        <div class="bar-bg">
          <div class="bar-fill" :style="{ width: durst + '%' }"></div>
        </div>
        <span class="need-value">{{ durst }}</span>
      </div>
    </div>
  </template>
  
  <script setup>
  defineProps({
    hunger: {
      type: Number,
      required: true
    },
    durst: {
      type: Number,
      required: true
    }
  })
  </script>
  
  <style scoped>
  .need-bar {
    display: flex;
    flex-direction: column;
    gap: 0.8rem;
    min-width: 200px;
    margin-bottom: 1.2rem;
  }
  .need-label {
    min-width: 80px;
    font-weight: 500;
    font-size: 1.14rem;
    color: #fffbe7;
    letter-spacing: 1px;
    margin-right: 0.7rem;
  }
  .bar-bg {
    flex: 1;
    height: 1.15rem;
    background: #242c35;
    border-radius: 7px;
    margin: 0 0.5rem;
    overflow: hidden;
    box-shadow: 0 1px 8px #0004;
    display: inline-block;
    width: 180px;
    vertical-align: middle;
  }
  .bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #22c55e 0%, #3b82f6 100%);
    transition: width 0.4s cubic-bezier(.6,1.3,.4,1);
    border-radius: 7px;
  }
  .need-value {
    min-width: 34px;
    font-size: 1.06rem;
    text-align: right;
    color: #00ffbb;
    font-family: monospace;
    margin-left: 0.7rem;
  }
  </style>
  