
docker compose down -v
docker compose up -d --build
docker exec -it net2_backend php artisan migrate:fresh --seed
docker exec -it net2_backend php artisan migrate:fresh --seed
docker exec -it net2_backend php artisan session:table
docker exec -it net2_backend php artisan migrate

docker exec -it net2_backend sh -c 'echo "" > storage/logs/laravel.log'

docker exec -it net2_backend rm storage/logs/laravel.log



docker exec -it net2_frontend npm run dev


#!/bin/bash

echo "🐳 Starte Docker Compose Umgebung..."
docker compose up -d

echo "🧼 Lösche vorherige Sessions (optional)..."
docker exec -it net1_backend php artisan session:clear

echo "🚀 Starte Backend-Session-Check..."
docker exec -it net1_backend php artisan serve --host=0.0.0.0 --port=8000 &

sleep 3

echo "🧪 Sende Testaufruf an API (/api/boot)..."
curl -i http://localhost:8000/api/boot
🔁 Script ausführbar machen:

bash
Kopieren
Bearbeiten
chmod +x ./scripts/entrypoint-dev.sh
#!/bin/bash

echo "🚀 Starte alle Container..."
docker compose up -d --build

echo "⏳ Warte kurz bis MySQL bereit ist..."
sleep 10

echo "✅ Container laufen. Backend: http://localhost:8000"
🛠 Beispiel 2: stop.sh (alle Container sauber stoppen)
bash
Kopieren
Bearbeiten
#!/bin/bash

echo "🧹 Stoppe und entferne alle Container + Volumes..."
docker compose down -v

echo "✅ Gestoppt."
🛠 Beispiel 3: db-reset.sh (Datenbank neu + seed)
bash
Kopieren
Bearbeiten
#!/bin/bash

echo "⚠️  Zurücksetzen der Datenbank (alle Tabellen werden gelöscht)..."

docker exec -it net1_backend php artisan migrate:fresh --seed

echo "✅ Datenbank wurde neu aufgebaut."
🛠 Skripte ausführbar machen:
bash
Kopieren
Bearbeiten
chmod +x start.sh stop.sh db-reset.sh




docker exec -it net2_frontend sh -c "\

cat > /app/src/views/TestiReginestiViue.vue << 'EOF'       <-- aP

<template>
  
</template>

<script setup>

</script>

<style scoped>

</style>
EOF
" && \
cat > /app/src/router/index.js << 'EOF'                      <-- aP

import { createRouter, createWebHistory } from 'vue-router';
import TestiReginestiViue from '../views/TestiReginestiViue.vue';

const routes = [
  { path: '/', name: 'home', component: () => import('../views/Home.vue') },
  { path: '/register', name: 'register', component: TestiReginestiViue },
];


});

export default router;
EOF
"




