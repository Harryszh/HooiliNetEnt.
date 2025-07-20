<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue'

// 1x Deklaration reicht
const produkte = ref([
  { id: 1, name: 'Bier', menge: 4 },
  { id: 2, name: 'Pizza', menge: 1 },
  { id: 3, name: 'Wurst', menge: 3 },
])

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/fridge')
    produkte.value = response.data // Überschreibt den Platzhalter mit echten Daten
  } catch (error) {
    console.error('Fehler beim Laden der Kühlschrankdaten:', error)
    // Wenn API nicht erreichbar, bleibt Platzhalter bestehen
  }
})
</script>
