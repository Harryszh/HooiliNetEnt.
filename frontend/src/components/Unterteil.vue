<template>
    <div class="unterteil">
      <div class="row-unterteil">
        
        <div class="wc">
          <RouterLink to="/wc">🚽 WC</RouterLink>
        </div> 
      
    
  
        <div class="küche">
          <RouterLink class="nav-link" to="/fridge">🍔 Küche</RouterLink>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { RouterLink } from 'vue-router'
  </script>
  
  <style scoped>
  .unterteil {
    background-image: url(../assets/images/gang.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;


    width: 20%;
    height: 20%;
  }
  
  .row-unterteil {
    display: flex;
    
    
    gap:910px;
    
  }
  
  .küche{
    background-color:transparent;
        
    width: 200px;
    height: 100px;
   
  }
  .wc {
    width: 200px;
    height: 100px;

  }
  
  .küche:hover {
    transform: scale(1.05);

}
.wc:hover {
    transform: scale(1.05);
   
  }
  
  .nav-link {
    text-decoration: none;
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    transition: background 0.3s, color 0.3s;
  }
  
  .nav-link:hover {
    background: rgba(255, 255, 255, 0.3);
    color: black;
  }
  </style>
  