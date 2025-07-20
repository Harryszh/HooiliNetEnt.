<template>
  <div class="register-container">
    <div class="diamond-frame">
      <div class="register-box">
        <h2>🧢 Registrieren</h2>
        <form @submit.prevent="submitRegistration">
          <div class="form-group">
            <input
              type="text"
              v-model="formData.username"
              placeholder="Benutzername"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              v-model="formData.password"
              placeholder="Passwort"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              v-model="formData.confirmPassword"
              placeholder="Passwort bestätigen"
              required
            />
          </div>
          <div class="checkbox-group">
            <label>
              <input
                type="checkbox"
                v-model="formData.acceptTerms"
                required
              />
              Ich akzeptiere die AGB
            </label>
          </div>
          <button type="submit" :disabled="!isFormValid">
            Registrieren
          </button>
        </form>
        <div class="login-link">
          <p>Bereits ein Konto?
            <router-link to="/login">Hier einloggen</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import api from '@/api/api';

export default {
  name: 'RegistriPag',
  data() {
    return {
      formData: {
        username: '',
        password: '',
        confirmPassword: '',
        acceptTerms: false
      }
    };
  },
  computed: {
    isFormValid() {
      return (
        this.formData.username &&
        this.formData.password &&
        this.formData.confirmPassword &&
        this.formData.acceptTerms &&
        this.formData.password === this.formData.confirmPassword
      );
    }
  },
  methods: {
    async submitRegistration() {
      if (!this.isFormValid) {
        alert('Bitte alle Felder korrekt ausfüllen!');
        return;
      }

      try {
        const response = await api.post('/register', {
          name: this.formData.username,
          password: this.formData.password
        });

        console.log('✅ Registrierung erfolgreich:', response.data);
        alert('Registrierung erfolgreich! Jetzt einloggen.');

        this.$router.push('/login');
      } catch (error) {
        console.error('❌ Registrierungsfehler:', error.response?.data || error);
        alert(
          error.response?.data?.message || 'Registrierung fehlgeschlagen.'
        );
      }
    }
  }
};
</script>

<style scoped>
.register-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: auto;
}

.diamond-frame {
  transform: rotate(45deg);
  background: rgba(20, 20, 28, 0.92);
  padding: 3rem;
  border: 4px solid #4caf50;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
  border-radius: 10px;
}

.register-box {
  transform: rotate(-45deg);
  width: 380px;
  color: white;
  font-family: Arial, sans-serif;
}

.register-box h2 {
  text-align: center;
  margin-bottom: 1.5rem;
  font-size: 1.8rem;
  letter-spacing: 2px;
  color: #4caf50;
}

.form-group {
  margin-bottom: 1rem;
}

.register-box input[type="text"],
.register-box input[type="password"] {
  width: 100%;
  padding: 0.8rem;
  border-radius: 6px;
  border: 2px solid #333;
  background: #2d2d2d;
  color: white;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.register-box input:focus {
  outline: none;
  background: #3b3b3b;
  border-color: #4caf50;
}

.checkbox-group {
  margin-bottom: 1.5rem;
}

.checkbox-group label {
  display: flex;
  align-items: center;
  cursor: pointer;
  font-size: 0.9rem;
}

.checkbox-group input[type="checkbox"] {
  width: auto;
  margin-right: 0.5rem;
  transform: scale(1.2);
}

.register-box button {
  width: 100%;
  padding: 0.8rem;
  background: linear-gradient(90deg, #4caf50, #43a047);
  border: none;
  border-radius: 5px;
  color: white;
  font-weight: bold;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.register-box button:hover:enabled {
  background: linear-gradient(90deg, #43a047, #4caf50);
  transform: translateY(-2px);
}

.register-box button:disabled {
  background: #666;
  cursor: not-allowed;
}

.login-link {
  text-align: center;
  margin-top: 1.5rem;
}

.login-link p {
  color: #ccc;
  font-size: 0.9rem;
}

.login-link a {
  color: #4caf50;
  text-decoration: none;
  font-weight: bold;
}

.login-link a:hover {
  text-decoration: underline;
}
</style>
