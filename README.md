composer install
composer update 
yarn install 
bin/console make:migration
php bin/console doctrine:migrations:migrate
bin/console d:f:l
symfony server:start
yarn encore dev --Watch

Avec une base de Données Vierge, mettre  le carousel du Default index en commentaire avec {# puis #} se rendre dans la partie Admin et uploader les images de votre choix pour le carrousel avec 3 Images Maximum (par la même occassion le background aussi 1 image seulement pour en changer effacer l'ancienne image) puis remettre en fonction le carrousel et après la navigation sera possible.

Vidéo de Fonctionnement du Site : https://youtu.be/yOGC61VcfgU