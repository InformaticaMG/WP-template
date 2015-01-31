
# Copia de trabajo del sitio WP mareagranate.org #


Este repositiorio contiene:

- copia de los ficheros del template de WP
- copia comprimida de la bd a fecha 14-enero-2015 (para poder simular un entorno real). File: blog.sql.zip


## Configuracion local ##

### Instalar apache y mysql ###

### Clonar el repositorio ###

```
local$ git clone https://github.com/InformaticaMG/WP-template
```

Con esto tendremos también una copia de la base de datos: blog.sql.zip

### Base de datos ###

Crear la bd:
```
$ mysql -u root -p
mysql> CREATE DATABASE wordpress;
mysql> GRANT ALL PRIVILEGES ON wordpress.* TO "wordpressuser"@"localhost" IDENTIFIED BY "dbwordpress";
mysql> FLUSH PRIVILEGES;
mysql> EXIT
```

Cargar la bd:

```
local$ unzip blog.sql.zip
local$ mysql -h localhost -u root -p wordpress < u649981589_blog.sql
local$ mysql -u root -p
mysql> SHOW FULL TABLES IN wordpress;
mysql> EXIT
local$ rm -f blog.sql
```

### Cambiar la configuración de apache sobre nuestra carpeta local  ###

Los siguientes pasos están en la version de apache:

```
local$ apache2 -v 
Server version: Apache/2.4.7 (Ubuntu)
Server built:   Jul 22 2014 14:36:38
```

Insertar en el fichero: `local$ sudo vim /etc/apache2/apache2.conf`
```
# Global configuration
#
ServerName localhost
Insertar en la parte de los directorios (ojo: si el directorio tiene caracteres especiales ponerlo entre “”):
<Directory “completeLocalPath”>
        Options Indexes Multiviews FollowSymLinks
        AllowOverride None
        Order deny,allow
        Require all granted
</Directory>
```

Permisos sobre la carpeta:
```
$ sudo adduser $USER www-data
$ sudo chown -R $USER:www-data “completeLocalPath”
$ sudo chmod -R 775 “completeLocalPath”
```

Para crear un host virtual:
```
$ sudo cp /etc/apache2/sites-available/000-default.conf  
/etc/apache2/sites-available/mg-folder.org.conf
```

Añadir la info del host virtual en `/etc/apache2/sites-available/mg-folder.org.conf`
```
<VirtualHost mg-folder.org:80>
ServerAdmin webmaster@localhost
ServerName mg-folder.org
ServerAlias www.mg-folder.org
DocumentRoot “completeLocalPath”
</VirtualHost>
```

Permitir el nuevo host virtual:
```
$ sudo a2ensite mg-folder.org
```

### El host es local  ###

Añadir la línea en `/etc/hosts`
```
127.0.0.1 mg-folder.org
```

### Reiniciar el servicio:  ###
```
$ sudo service apache2 restart
```

Si visitais mg-folder.org tendria que abrirse la copia local del sitio web.

Accesos locales:
admin/admin
Marea Granate/coordinacion
paris/paris


