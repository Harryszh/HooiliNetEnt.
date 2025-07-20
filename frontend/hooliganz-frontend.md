muss genau nach anleitung aufgebaut werden

 🎮 Hooliganz Frontend – Vue 3 Webanwendung

## 🧭 Projektziel

Dieses Frontend ist Teil des Spiels **Hooliganz** – einer strategischen, rundenbasierten Webanwendung mit Comic-Style. Ziel ist der Aufbau einer **modernen Vue 3 App**, die modular, performant und wiederverwendbar ist.

Die Anwendung dient als technische Grundlage für mehrere Spielmodule und soll mittelfristig auch für Web, PC und Mobile funktionieren.

---

## 🚀 Technologien

- **Vue 3 (Composition API)**
- **Pinia** – State-Management
- **Vue Router** – mit Public & Protected Routes
- 
- Optional: Verbindung mit **Laravel 11 + MySQL**

---

## 🧱 Projektstruktur (Grundaufbau)

```bash
src/
├── views/                  # Seitenansichten (z. B. Register, Home)
│   └── Anmelde.vue
├── router/
│   └── index.js            # Vue Router Setup
├── components/             # Wiederverwendbare UI-Komponenten
└── App.vue

backend/database/seeders/UserSeeder.php

routs sind so aufgebaut

import WCView from '@/views/game/WCView.vue'


 import TestPage from '@/components/Auth/Test.vue' 

verbindung zur  user daten bank  
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

nur das wirt benütigt

 $table->id();
            $table->string('name');
            $table->string('password');
            $table->timestamps();

  so viel wie möglich schon verbinden

🔗 Relevante Verbindungen & Pfade
🐘 Datenbank (MySQL)
Service-Name: HooliNetdb
Pfad im Container: /var/lib/mysql
Lokaler Mount: ./(via Volume: dbdataz)

⚙️ Backend (Laravel)
Service-Name: backend
Container-Name: net2_backend
Pfad im Container: /var/www/html
Lokaler Mount: ./backend:/var/www/html

🌐 Frontend (Vue 3)
Service-Name: frontend
Container-Name: net2_frontend
Pfad im Container: /app
Lokaler Mount: ./frontend:/app
Node Modules Volume: frontend_node_modules:/app/node_modules

🛠️ phpMyAdmin
Service-Name: phpmyadmin
Pfad im Container: /var/www/html (Standard bei phpmyadmin)
Kein lokaler Volume-Mount notwendig



🔧 Erstkonfiguration (Docker-basiert)
Führe im laufenden Container net2_frontend dieses Skript aus, um die Grundstruktur zu erzeugen:

ocker exec -it net2_frontend sh -c "\
cat > /app/src/views/TestiReginestiViue.vue << 'EOF'
<template>
  <div class='p-4'>
    <h1 class='text-2xl font-bold'>Registrierungstestseite</h1>
    <p>Hier kommt später das Registrierungsformular hin.</p>
  </div>
</template>

<script setup>
  // Platz für Composables oder Props
</script>

<style scoped>
/* Spätere Styles */
</style>
EOF
" && \
cat > /app/src/router/index.js << 'EOF'
import { createRouter, createWebHistory } from 'vue-router'
import TestiReginestiViue from '../views/TestiReginestiViue.vue'

const routes = [
  { path: '/', name: 'home', component: () => import('../views/Home.vue') },
  { path: '/register', name: 'register', component: TestiReginestiViue },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
EOF
"

_______

# 🎮 Hooliganz Frontend – Vue 3 Webanwendung

## 🧭 Projektziel

Dieses Frontend ist Teil des Spiels **Hooliganz** – einer strategischen, rundenbasierten Webanwendung mit Comic-Style.  
Ziel ist der Aufbau einer **modernen Vue 3 App**, die modular, performant und wiederverwendbar ist.

Die Anwendung dient als technische Grundlage für mehrere Spielmodule und soll mittelfristig auch für Web, PC und Mobile funktionieren.

---

## 🚀 Technologien

- **Vue 3 (Composition API)**
- **Pinia** – State-Management
- **Vue Router** – mit Public & Protected Routes
- **TailwindCSS**
- Optional: Verbindung mit **Laravel 11 + MySQL**

---

## 🧱 Projektstruktur (Grundaufbau)

```bash
src/
├── views/                  # Seitenansichten (z. B. Register, Home)
│   └── Anmelde.vue
├── router/                 # Vue Router Setup
│   └── index.js
├── components/             # Wiederverwendbare UI-Komponenten
└── App.vue

backend/database/seeders/UserSeeder.php
🛣️ Beispielhafte Routenstruktur (Import)
js
Kopieren
Bearbeiten
import WCView from '@/views/game/WCView.vue'
import TestPage from '@/components/Auth/Test.vue'
🧩 Verbindung zur User-Datenbank
php
Kopieren
Bearbeiten
// Datei: database/migrations/xxxx_xx_xx_create_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
Nur diese Felder werden verwendet:

php
Kopieren
Bearbeiten
$table->id();
$table->string('name');
$table->string('password');
$table->timestamps();
🔗 Relevante Verbindungen & Pfade
🐘 Datenbank (MySQL)
Service-Name: HooliNetdb

Pfad im Container: /var/lib/mysql

Lokaler Mount: via Volume dbdataz

⚙️ Backend (Laravel)
Service-Name: backend

Container-Name: net2_backend

Pfad im Container: /var/www/html

Lokaler Mount: ./backend:/var/www/html

🌐 Frontend (Vue 3)
Service-Name: frontend

Container-Name: net2_frontend

Pfad im Container: /app

Lokaler Mount: ./frontend:/app

Node Modules Volume: frontend_node_modules:/app/node_modules

🛠️ phpMyAdmin
Service-Name: phpmyadmin

Pfad im Container: /var/www/html (Standard bei phpmyadmin)

Kein Volume nötig

🔧 Erstkonfiguration (Docker-basiert)
Führe im laufenden Container net2_frontend folgendes Setup-Skript aus, um eine Beispiel-View und die erste Route zu erstellen:

bash
Kopieren
Bearbeiten
docker exec -it net2_frontend sh -c "\
cat > /app/src/views/TestiReginestiViue.vue << 'EOF'
<template>
  <div class='p-4'>
    <h1 class='text-2xl font-bold'>Registrierungstestseite</h1>
    <p>Hier kommt später das Registrierungsformular hin.</p>
  </div>
</template>

<script setup>
  // Platz für Composables oder Props
</script>

<style scoped>
/* Spätere Styles */
</style>
EOF
" && \
cat > /app/src/router/index.js << 'EOF'
import { createRouter, createWebHistory } from 'vue-router'
import TestiReginestiViue from '../views/TestiReginestiViue.vue'

const routes = [
  { path: '/', name: 'home', component: () => import('../views/Home.vue') },
  { path: '/register', name: 'register', component: TestiReginestiViue },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
EOF
"
📍 Danach ist die Testseite unter
👉 http://localhost:5173/register erreichbar.

✅ Nächste Schritte
Authentifizierung (Pinia Store, Backend API)

Benutzer-Registrierung/Anmeldung integrieren

Protected Routes umsetzen

Komponenten (z. B. Input, Button) wiederverwendbar machen

Verbindung mit Laravel Backend aufbauen

Stand: Juli 2025 – Team Hooliganz

yaml
Kopieren
Bearbeiten

---

Wenn du willst, baue ich dir daraus auch direkt ein `.sh`-Setup-Skript oder kombiniere es mit der Datenbankmigration.