<template>
    <div class="register-page">
      <div class="register-header">
        <h1>🚀 Registrierung</h1>
        <p class="subtitle">Erstelle dein Konto und werde Teil der Community</p>
      </div>
      
      <form @submit.prevent="submitRegistration" class="register-form">
        <div class="form-group" :class="{ 'has-error': errors.name }">
          <label for="name">
            <i class="icon">👤</i>
            Benutzername
          </label>
          <input 
            type="text" 
            id="name" 
            v-model="name" 
            placeholder="Dein einzigartiger Benutzername"
            :class="{ 'error': errors.name, 'success': name && !errors.name }"
            @input="clearError('name')"
            @blur="validateName"
            required
          />
          <span v-if="errors.name" class="error-message">{{ errors.name }}</span>
          <div v-if="name && !errors.name" class="success-indicator">✓ Verfügbar</div>
        </div>
  
        <div class="form-group" :class="{ 'has-error': errors.password }">
          <label for="password">
            <i class="icon">🔒</i>
            Passwort
          </label>
          <div class="password-input-container">
            <input 
              :type="showPassword ? 'text' : 'password'" 
              id="password" 
              v-model="password" 
              placeholder="Mindestens 6 Zeichen"
              :class="{ 'error': errors.password, 'success': password && !errors.password }"
              @input="clearError('password')"
              @blur="validatePassword"
              required
            />
            <button 
              type="button" 
              class="toggle-password"
              @click="showPassword = !showPassword"
            >
              {{ showPassword ? '👁️' : '🙈' }}
            </button>
          </div>
          <div class="password-strength">
            <div class="strength-bar">
              <div 
                class="strength-fill" 
                :class="passwordStrength.class"
                :style="{ width: passwordStrength.percentage + '%' }"
              ></div>
            </div>
            <span class="strength-text">{{ passwordStrength.text }}</span>
          </div>
          <span v-if="errors.password" class="error-message">{{ errors.password }}</span>
        </div>
  
        <div class="form-group" :class="{ 'has-error': errors.confirmPassword }">
          <label for="confirmPassword">
            <i class="icon">🔐</i>
            Passwort bestätigen
          </label>
          <input 
            type="password" 
            id="confirmPassword" 
            v-model="confirmPassword" 
            placeholder="Passwort wiederholen"
            :class="{ 'error': errors.confirmPassword, 'success': confirmPassword && !errors.confirmPassword }"
            @input="clearError('confirmPassword')"
            @blur="validateConfirmPassword"
            required
          />
          <span v-if="errors.confirmPassword" class="error-message">{{ errors.confirmPassword }}</span>
          <div v-if="confirmPassword && !errors.confirmPassword" class="success-indicator">✓ Passwörter stimmen überein</div>
        </div>
  
        <button 
          type="submit" 
          class="submit-btn"
          :disabled="!isFormValid || isSubmitting"
          :class="{ 'loading': isSubmitting }"
        >
          <span v-if="!isSubmitting">
            <i class="icon">🎯</i>
            Jetzt registrieren
          </span>
          <span v-else class="loading-spinner">
            <i class="spinner">⚡</i>
            Wird erstellt...
          </span>
        </button>
      </form>
  
      <div class="login-link">
        <p>
          Bereits ein Konto? 
          <a href="#" @click.prevent="$emit('switchToLogin')" class="link-animated">
            Hier einloggen →
          </a>
        </p>
      </div>
  
      <div v-if="successMessage" class="success-toast">
        <i class="icon">✅</i>
        {{ successMessage }}
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'RegisterPage',
    emits: ['switchToLogin'],
    data() {
      return {
        name: '',
        password: '',
        confirmPassword: '',
        showPassword: false,
        isSubmitting: false,
        successMessage: '',
        errors: {
          name: '',
          password: '',
          confirmPassword: ''
        }
      };
    },
    computed: {
      isFormValid() {
        return this.name && 
               this.password && 
               this.confirmPassword && 
               !this.errors.name && 
               !this.errors.password && 
               !this.errors.confirmPassword;
      },
      passwordStrength() {
        if (!this.password) return { percentage: 0, text: '', class: '' };
        
        let score = 0;
        if (this.password.length >= 6) score += 25;
        if (this.password.length >= 10) score += 25;
        if (/[A-Z]/.test(this.password)) score += 25;
        if (/[0-9]/.test(this.password)) score += 25;
        
        if (score <= 25) return { percentage: score, text: 'Schwach', class: 'weak' };
        if (score <= 50) return { percentage: score, text: 'Mittel', class: 'medium' };
        if (score <= 75) return { percentage: score, text: 'Stark', class: 'strong' };
        return { percentage: score, text: 'Sehr stark', class: 'very-strong' };
      }
    },
    methods: {
      clearError(field) {
        this.errors[field] = '';
      },
      
      validateName() {
        if (!this.name) {
          this.errors.name = 'Benutzername ist erforderlich';
        } else if (this.name.length < 3) {
          this.errors.name = 'Mindestens 3 Zeichen erforderlich';
        } else if (this.name.length > 255) {
          this.errors.name = 'Maximal 255 Zeichen erlaubt';
        } else if (!/^[a-zA-Z0-9_-]+$/.test(this.name)) {
          this.errors.name = 'Nur Buchstaben, Zahlen, _ und - erlaubt';
        } else {
          this.errors.name = '';
        }
      },
      
      validatePassword() {
        if (!this.password) {
          this.errors.password = 'Passwort ist erforderlich';
        } else if (this.password.length < 6) {
          this.errors.password = 'Mindestens 6 Zeichen erforderlich';
        } else {
          this.errors.password = '';
        }
      },
      
      validateConfirmPassword() {
        if (!this.confirmPassword) {
          this.errors.confirmPassword = 'Passwort-Bestätigung ist erforderlich';
        } else if (this.password !== this.confirmPassword) {
          this.errors.confirmPassword = 'Passwörter stimmen nicht überein';
        } else {
          this.errors.confirmPassword = '';
        }
      },
      
      async submitRegistration() {
        // Vollständige Validierung vor dem Absenden
        this.validateName();
        this.validatePassword();
        this.validateConfirmPassword();
        
        if (!this.isFormValid) {
          return;
        }
  
        this.isSubmitting = true;
  
        try {
          const response = await fetch('/api/register', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
              'Accept': 'application/json'
            },
            body: JSON.stringify({
              name: this.name,
              password: this.password
            })
          });
  
          const data = await response.json();
  
          if (response.ok) {
            this.successMessage = 'Registrierung erfolgreich! Weiterleitung...';
            
            // Nach kurzer Verzögerung zum Login wechseln
            setTimeout(() => {
              this.$emit('switchToLogin');
            }, 1500);
          } else {
            // Laravel-Validierungsfehler behandeln
            if (data.errors) {
              Object.keys(data.errors).forEach(field => {
                if (this.errors.hasOwnProperty(field)) {
                  this.errors[field] = data.errors[field][0];
                }
              });
            } else {
              alert('Registrierung fehlgeschlagen: ' + (data.message || 'Unbekannter Fehler'));
            }
          }
        } catch (error) {
          console.error('Registrierung Fehler:', error);
          alert('Verbindungsfehler! Bitte versuche es später erneut.');
        } finally {
          this.isSubmitting = false;
        }
      }
    }
  }
  </script>
  
  <style scoped>
  .register-page {
    width: 100%;
    max-width: 450px;
    margin: 0 auto;
    padding: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    position: relative;
    overflow: hidden;
  }
  
  .register-page::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: shimmer 3s ease-in-out infinite;
  }
  
  @keyframes shimmer {
    0%, 100% { transform: rotate(0deg); }
    50% { transform: rotate(180deg); }
  }
  
  .register-header {
    text-align: center;
    margin-bottom: 30px;
    position: relative;
    z-index: 1;
  }
  
  .register-header h1 {
    color: white;
    font-size: 2.2rem;
    margin-bottom: 8px;
    font-weight: 700;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  }
  
  .subtitle {
    color: rgba(255,255,255,0.9);
    font-size: 1rem;
    margin: 0;
    font-weight: 300;
  }
  
  .register-form {
    position: relative;
    z-index: 1;
  }
  
  .form-group {
    margin-bottom: 25px;
    position: relative;
  }
  
  .form-group label {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    color: white;
    font-weight: 600;
    font-size: 0.95rem;
  }
  
  .form-group label .icon {
    margin-right: 8px;
    font-size: 1.1rem;
  }
  
  .form-group input {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid rgba(255,255,255,0.3);
    border-radius: 12px;
    background: rgba(255,255,255,0.95);
    color: #333;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-sizing: border-box;
  }
  
  .form-group input:focus {
    outline: none;
    border-color: #4CAF50;
    background: white;
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
    transform: translateY(-2px);
  }
  
  .form-group input.success {
    border-color: #4CAF50;
    background: rgba(76, 175, 80, 0.1);
  }
  
  .form-group input.error {
    border-color: #f44336;
    background: rgba(244, 67, 54, 0.1);
  }
  
  .password-input-container {
    position: relative;
  }
  
  .toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: background 0.2s ease;
  }
  
  .toggle-password:hover {
    background: rgba(0,0,0,0.1);
  }
  
  .password-strength {
    margin-top: 8px;
  }
  
  .strength-bar {
    width: 100%;
    height: 4px;
    background: rgba(255,255,255,0.3);
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 4px;
  }
  
  .strength-fill {
    height: 100%;
    transition: all 0.3s ease;
    border-radius: 2px;
  }
  
  .strength-fill.weak { background: #ff5722; }
  .strength-fill.medium { background: #ff9800; }
  .strength-fill.strong { background: #4caf50; }
  .strength-fill.very-strong { background: #2196f3; }
  
  .strength-text {
    color: rgba(255,255,255,0.9);
    font-size: 0.8rem;
    font-weight: 500;
  }
  
  .error-message {
    color: #ffcdd2;
    font-size: 0.85rem;
    margin-top: 4px;
    display: block;
    font-weight: 500;
  }
  
  .success-indicator {
    color: #c8e6c9;
    font-size: 0.85rem;
    margin-top: 4px;
    font-weight: 500;
  }
  
  .submit-btn {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #4CAF50, #45a049);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    margin-top: 10px;
  }
  
  .submit-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
  }
  
  .submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
  }
  
  .submit-btn.loading {
    background: linear-gradient(135deg, #757575, #616161);
  }
  
  .loading-spinner .spinner {
    display: inline-block;
    animation: spin 1s linear infinite;
  }
  
  @keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }
  
  .login-link {
    text-align: center;
    margin-top: 25px;
    position: relative;
    z-index: 1;
  }
  
  .login-link p {
    color: rgba(255,255,255,0.9);
    font-size: 0.95rem;
    margin: 0;
  }
  
  .link-animated {
    color: #FFD700;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
  }
  
  .link-animated:hover {
    color: white;
    transform: translateX(5px);
  }
  
  .success-toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #4CAF50;
    color: white;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    z-index: 1000;
    animation: slideIn 0.3s ease-out;
  }
  
  @keyframes slideIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
  }
  
  .success-toast .icon {
    margin-right: 8px;
  }
  
  /* Responsive Design */
  @media (max-width: 480px) {
    .register-page {
      margin: 10px;
      padding: 20px;
    }
    
    .register-header h1 {
      font-size: 1.8rem;
    }
    
    .form-group input {
      padding: 12px;
    }
  }
  </style>