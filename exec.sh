#!/bin/bash

# 🔧 Standardwerte
CONTAINER=${1:-net1_backend}  # Standardcontainer ist "net1_backend"
shift                        # Nächstes Argument (falls vorhanden) ist der Befehl

# Wenn kein Befehl angegeben ist, dann bash öffnen
if [ $# -eq 0 ]; then
    docker exec -it "$CONTAINER" bash
else

  php artisan optimize//

  docker compose down -v
  docker compose up -d --build

  docker exec -it net1_frontend sh
  docker exec -it net2_backend php artisan session:table
  docker exec -it net2_backend php artisan migrate
  ocker exec -it net2_backend rm storage/logs/laravel.log
  
docker exec -it net2_backend php artisan migrate:fresh --seed

docker exec -it net2_backend php artisan session:table
docker exec -it net2_backend php artisan migrate


docker ps

docker compose up -d --build

docker-compose down
docker-compose up 

docker compose down -v



docker exec -it net1_frontend sh

cd /app/src/router

sed -i "1i import TestiReginestiViue from '../views/TestiReginestiViue.vue';" index.js
sed -i "/];/i \  { path: '/register', name: 'register', component: TestiReginestiViue }," index.js





docker exec -it net2_backend php artisan migrate

docker exec -it net2_backend php artisan migrate:fresh --seed

docker exec -it net1_backend php artisan optimize
docker exec -it net1_db_mysql mysql -u harryz -p

docker exec -it net1_backend php artisan migrate
docker exec -it net1_backend php artisan db:seed
docker exec -it ne