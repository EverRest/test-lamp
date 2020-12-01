# Test

Docker example with Apache, MariaDB 10.1, PhpMyAdmin and Php 7
`` add to /etc/hosts loc.test or host name
- Configurate
- To run Docker containers in the root:
```
docker-compose up -d
```
```
to apache2 inside contaner
```
a2enmod rewrite
etc/init.d/apache2 restart

Open phpmyadmin at [http://localhost:8000](http://localhost:8000)

Run mysql client:

- `docker-compose exec db mysql -u root -p` 

`` Apache Site configuration

/conf/apache2
