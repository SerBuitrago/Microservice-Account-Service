
# Microservicio: Gestión de Usuarios, Roles y Permisos

<div>
    <img src="https://1.bp.blogspot.com/-Vr9ieaHwBPs/WTvLrQcDFUI/AAAAAAAABsQ/Uvhc69QqmeYmDPeNZuaEVLDk3oM4GKklACLcB/s1600/LzLinwg%255B1%255D.png">
</div>

Esta aplicacion fue realizada en **Lumen Laravel** con persistencia de datos en **MySQL**


## Caracteristicas

### Usuario
- Iniciar sesi¨®n de usuario en el **portal**.
- Inicar sesion a traves de correo **personal/institucional**.
- Registro de usuario en el portal (*normal*).
- Registrar un usuario al portal educativo (*Admin*).
- Obtener detalles de usuario.
- Obtener detalles de estudiante.
- Editar informaci¨®n del usuario.
- Listar usuarios.
- Eliminar usuarios.
- Recuperar clave.
- Cambiar clave.
## Instalación (Uso local)
- Primero se debe instalar [Laragon](https://laragon.org/download/index.html) en la maquina.

- Clonar proyecto
    ```bash
    https://github.com/Arquitectura-de-software-UFPS-2021-2/Microservice-Account-Service.git
    ```

- Despues se debe ir al directorio del proyecto
    ```bash
    cd my-project
    ```

- Luego se **Instala/Actualiza** las dependencias composer en la terminal del proyecto, con el siguiente comando:
    ```sh
    composer update
    ```

- Se corre el proyecto a traves del siguiente comando:
    ```sh
    php -S 18.235.152.56 -t public
    ```
- Se debe verificar la implementaci¨®n navegando a la direcci¨®n de su servidor en su navegador preferido.
    ```sh
    http://18.235.152.56/
    ```
**Nota:** Para cada petici¨®n se debe enviar el api_token (Generado y unico para cada Microservicio), este debe ser enviado en el body.
## Rutas
Para enviar **data** en el body a las peticiones POST utilizamos **POSTMAN**

`Host:` http://18.235.152.56


### Servicio Usuarios

- Listar usuarios
  | Metodo |      Ruta       |
  | ------ | --------------- |
  |  GET   |    /student     |

- Cerra sesi¨®n
  | Metodo |       Ruta        |
  | ------ | ----------------- |
  |  GET   |      /logout      |

- Iniciar sesi¨®n

  | Metodo |     Ruta      |
  | ------ | ------------- |
  | POST   |    /login     |

  **JSON**
  ```sh
  {
    "student_code" : "1151651",
    "password" : "hola"
  }
  ```  
    
- Inicar sesi¨®n a traves del correo **personal/institucional**
  | Metodo |       Ruta        |
  | ------ | ----------------- |
  | POST   |    /login/google  |

- Registro de usuario en el portal **(*normal*)**
  |  Metodo |            Ruta           |
  | ------- | ------------------------- |
  |  POST   |      /student/register    |

  **JSON**
   ```sh
   {
     "age" : "21",
     "code" : "1151651",
     "name" : "gabriel",
     "phone" : "14131",
     "email" : "gabrielarturo@gmail.com",
     "address" : "calle 23",
     "semester" : "decimo",
     "last_name" : "garcia",
     "university_career" : "ing. sistemas",
     "password" : "hola"
   }
  ```

- Registro de usuario en el portal **(*admin*)**
  |  Metodo |                Ruta             |
  | ------- | ------------------------------- |
  |  POST   |      /student/admin/register    |
  
  **JSON**
  ```sh
  {
    "age" : "21",
    "code" : "1151651",
    "name" : "gabriel",
    "phone" : "14131",
    "email" : "gabrielarturo@gmail.com",
    "address" : "calle 23",
    "semester" : "decimo",
    "last_name" : "garcia",
    "university_career" : "ing. sistemas",
    "password" : "hola",
    "role": "Student"
  }
  ```

- Obtener detalles de un usuario especifico
  |  Metodo |        Ruta        |
  | ------- | ------------------ |
  |  POST   |      /user/show    |

  **JSON**
  ```sh
  {
    "code" : "1151651"
  }
  ```
- Obtener detalles de estudiante
  |  Metodo |         Ruta         |
  | ------- | -------------------- |
  |  POST   |      /student/show   |

  **JSON**
  ```sh
  {
    "code" : "1151651",
  }
  ```

- Recuperar clave
  |  Metodo |         Ruta         |
  | ------- | -------------------- |
  |  POST   |     /send/password   |

  **JSON**
  ```sh
  {
    "email": "gabrielarturo@gmail.com"
  }
  ```

- Cambiar clave
  |  Metodo |          Ruta         |
  | ------- | --------------------- |
  |  POST   |     /reset/password   |
  
  **JSON**
  ```sh
  {
    "email" :  "gabrielarturo@gmail.com",
    "password" : "hola2",
    "password_confirmation" : "hola2",
    "token" : "oxerLarFqRs2lwNUXozWF01kv11yTTeg8LnjiFADcx5TsfDtpIvrTgUdfdzk"
  }
  ```

- Editar informaci¨®n del usuario
  |  Metodo |              Ruta               |
  | ------- | ------------------------------- |
  |   PUT   |      /student/admin/edit/{id}   |
   
  **JSON**
  ```sh
  {
    "api_token": "nno8VgkrTVWvY4zqStSly5ehwiaTf7Te7tSW1lAws2fcCPVnBii5PcylOf5AsoBuxC3cfTKKuuj3akee9qug4FqM3WUc4xfSK1mjSvLe5uzFxJwm95K1BAdDMev7bSoUkvEuv7ggO3T5dxHghUWUqX",
    "name" : "gabriela",
    "last_name" : "quintero",
    "address" : "calle 23a",
    "age" : "22",
    "phone" : "141311",
    "email" : "gabrielarturo@gmail.com",
    "semester" : "noveno",
    "university_career" : "ing. sistemas",
    "student_email" : "gabrielarturo@gmail.com",
    "code" : "1151652"
  }
  ```

- Eliminar usuario
  |   Metodo   |               Ruta               |
  | ---------- | -------------------------------- |
  |   DELETE   |      student/admin/delete/{id}   |






## Rutas Rol





---------------------------------
### ROLES
- Registrar rol
- Obtener detalles del rol
- Editar informaciÃ³n del rol
- Listar roles 
- Eliminar roles
- Agregar Rol al Usuario
- Eliminar Rol al Usuario

**Peticion POST, Registrar rol**
```sh
http://18.235.152.56/rol/register
OpciÃ³n BODY - RAW - TypeJSON
 {
    "name": "Admin"
 }
```
**Peticion GET, Obtener detalles del rol**
```sh
http://18.235.152.56/rol/show
OpciÃ³n BODY - RAW - TypeJSON
{
    "role_id":3
}
```
**Peticion PUT, Editar informaciÃ³n del rol**
```sh
http://18.235.152.56/rol/update
OpciÃ³n BODY - RAW - TypeJSON
{
    "role_id":3
}
```
**Peticion GET, Listar roles**
```sh
http://18.235.152.56/rol/list
```
**Peticion DELETE, Eliminar roles**
```sh
http://18.235.152.56/rol/delete/3
```
**Peticion POST, Agregar Rol al Usuario**
```sh
http://18.235.152.56/student/rol/add
OpciÃ³n BODY - RAW - TypeJSON
{
   "student_code":"115165",
   "role": "Admin"
}
```
**Peticion DELETE, Eliminar Rol al Usuario**
```sh
http://18.235.152.56/student/rol/delete
OpciÃ³n BODY - RAW - TypeJSON
{
   "student_code":"115165",
   "role": "Admin"
}
```

---------------------------------
### PERMISOS
- Registrar un permiso (funcionalidad)
- AsignaciÃ³n de permisos al rol
- Desvincular permisos al rol
- Obtener detalles de un permiso
- Editar informaciÃ³n del permiso
- Listar permisos
- Eliminar permiso
- Obtener permisos vinculados al rol

**Peticion POST, Registrar un permiso (funcionalidad)**
```sh
http://18.235.152.56/permission/register
OpciÃ³n BODY - RAW - TypeJSON
{
    "name" : "create user"
}
```
**Peticion POST, AsignaciÃ³n de permisos al rol**
```sh
http://18.235.152.56/permission/aggRol
OpciÃ³n BODY - RAW - TypeJSON
{
    "name": "Teacher",
    "name_permission": "create user"
}
```
**Peticion DELTE, Desvincular permisos al rol**
```sh
http://18.235.152.56/permission/deleteRolPerm
OpciÃ³n BODY - RAW - TypeJSON
{
    "name": "Teacher",
    "name_permission": "create user"
}
```
**Peticion POST, Obtener detalles de un permiso**
```sh
http://18.235.152.56/permission/show
OpciÃ³n BODY - RAW - TypeJSON
{
    "id" : "1"
}
```
**Peticion PUT, Editar informaciÃ³n del permiso**
```sh
http://18.235.152.56/permission/update
OpciÃ³n BODY - RAW - TypeJSON
{
    "id" : "2",
    "name" : "create admin",
    "guard_name" : "api"
}
```
**Peticion GET , Listar permisos**
```sh
http://18.235.152.56/permission/list
```
**Peticion DELETE , Eliminar permiso**
```sh
http://18.235.152.56/permission/delete/1
```
**Peticion POST, Obtener permisos vinculados al rol**
```sh
http://18.235.152.56/rol/dataPerm
OpciÃ³n BODY - RAW - TypeJSON
{
     "api_token": "LIToHuYqcXv2fURzvTBycMXHfR4oZJj34jvb8M8xoKNKAo8GmNfDitBAUHid1cO9d3gTdhNRjeOGzuO7vPZXEFcMXbNkjTO9GrAmFOjHWP6WZsjM3hPLbLIOqmINhU7woYOib2xOGw92o5gFmoLgpL",
     "name": "Admin"
}
```

## ðŸ”— Links
**Despliegue del MicroServicio**

 [![debug](https://img.icons8.com/color/48/000000/amazon-web-services.png)](http://18.235.152.56/students)

** Uso del Microservicio ** 

[![debug](https://img.icons8.com/office/42/react.png)](http://52.90.33.232/)


## ðŸ”— Rutas para consumir la ApiGateWay

### Notifications-Web Endpoints

`http://18.235.152.56/users/{token}/notifications  GET` Obtener todas las notificaciones del usuario por su api_token.
`http://18.235.152.56/users/{token}/notifications  POST` Crear una notificaciÃ³n para el usuario por su api_token.


### Tutoring-Web Endpoints


### Chat-Web Endpoints

## License

MIT

**SOFTWARE LIBRE**
