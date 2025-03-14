# PracticaFinal
## Descripción
La práctica trata de desplegar una aplicación web en AWS escrita en php siguiendo el patrón de diseño MVC. Permite la gestión de productos, autenticación de usuarios y un sistema de carrito de compras.
## Tecnologías utilizadas
PHP<br>
Mariadb<br>
HTML<br>
Bootstrap<br>
AWS
## Características Principales
Listado de productos.
Ver un producto (Mostrar una descripción de un producto).
Inicio de sesión (admin y usuario). 
Dar de alta nuevo producto (solo administrador).
Añadir producto a carro de compra.
Ver carro de la compra.
## Uso de la aplicación
**Usuarios:**<br>
Los usuarios deben loguearse para poder realizar un pedido.<br>
Los administradores pueden añadir nuevos productos.<br>
**Carrito de compra:**<br>
Se pueden añadir productos al carrito sin estar logueado.<br>
**Administración de los productos:**<br>
Solo los administradores pueden añadir productos
## Despliegue en AWS
La aplicación estará alojada en un servidor EC2 con la siguiente configuración:<br>
Linux configurado para que funcione la aplicación.<br>
Docker onstalado para desplegar la aplicación y acceder a ella mediante una ip elástica.
## Autor 
**Moisés Pintiado Velasco ASIR2**
