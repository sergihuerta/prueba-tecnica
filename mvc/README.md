##Instrucciones para probar la aplicación en un entorno local:

El proyecto se inicia con un formulario de autentificación de los usuarios mediante un nombre y una contraseña (url inicial: localhost/prueba-tecnica/mvc/public). Los usuarios que pueden acceder a esta aplicación se encuentran en una base de datos Mysql (el schema de Mysql se ubica en la carpeta mvc/app/BaseDatos del proyecto).

Una vez autentificado el usuario correctamente, se muestra una página con una lista de usuarios completa con sus nombres y claves. Cada usuario contiene un botón "Eliminar" que permite suprimir de la lista y de la base de datos el usuario seleccionado.

Esta página contiene un enlace para insertar un nuevo usuario en la lista. En acceder al enlace, se muestra un formulario para registrar un nuevo usuario con su clave correspondiente.

Cada nombre de la lista principal es un enlace a la vista detalles.php donde se muestra la clave del usuario y un botón "Modificar" que permite cambiar la clave del usuario. Además, contiene un enlace para volver a la lista de usuarios. 

Este proyecto está estructurado por el patrón Modelo Vista Controlador.
