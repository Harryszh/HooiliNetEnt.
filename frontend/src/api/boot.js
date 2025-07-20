import axios from 'axios'

export async function bootGuestSession() {
  try {
    const res = await axios.get('http://localhost:8000/api/boot', { withCredentials: true })
    console.log('🎫 Gast-Session geladen:', res.data)
    localStorage.setItem('guest_token', res.data.token)
  } catch (e) {
    console.error('⚠️ Fehler beim Gast-Login:', e)
  }
}
