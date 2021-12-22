
# Microservicio: Gestión de Usuarios, Roles y Permisos

<p align="center">
    <img src="https://1.bp.blogspot.com/-Vr9ieaHwBPs/WTvLrQcDFUI/AAAAAAAABsQ/Uvhc69QqmeYmDPeNZuaEVLDk3oM4GKklACLcB/s1600/LzLinwg%255B1%255D.png" width="400" height="200">
</p>

Esta aplicacion fue realizada en **Lumen Laravel** con persistencia de datos en **MySQL**


## Caracteristicas

A continuación se muestran las caracteristicas del microservicio:

### Usuario
- Iniciar sesión de usuario en el **portal**.
- Inicar sesion a traves de correo **personal/institucional**.
- Registro de usuario en el portal (*normal*).
- Registrar un usuario al portal educativo (*Admin*).
- Obtener detalles de usuario.
- Obtener detalles de estudiante.
- Editar información del usuario.
- Listar usuarios.
- Eliminar usuarios.
- Recuperar clave.
- Cambiar clave.

### Rol
- Registrar rol.
- Obtener detalles del rol.
- Editar información del rol.
- Listar roles .
- Eliminar roles.
- Agregar rol al Usuario.
- Eliminar rol al Usuario.

### Permisos
- Registrar un permiso **(*funcionalidad*)**.
- Asignación de permisos al rol.
- Desvincular permisos al rol.
- Obtener detalles de un permiso.
- Editar información del permiso.
- Listar permisos.
- Eliminar permiso.
- Obtener permisos vinculados al rol.
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
- Se debe verificar la implementación navegando a la dirección de su servidor en su navegador preferido.
    ```sh
    http://18.235.152.56/
    ```
**Nota:** Para cada petición se debe enviar el api_token (Generado y unico para cada Microservicio), este debe ser enviado en el body.
## Rutas
Para enviar **data** en el body a las peticiones POST utilizamos **POSTMAN**

`Host:` http://18.235.152.56


### Servicio Usuarios

- Listar usuarios
  | Metodo | Ruta     |
  |--------|----------|
  | GET    | /student |

- Cerra sesión
  | Metodo | Ruta    |
  |--------|---------|
  | GET    | /logout |

- Iniciar sesión

  | Metodo | Ruta   |
  |--------|--------|
  | POST   | /login |

  **JSON**
  ```sh
  {
    "student_code" : "1151651",
    "password" : "hola"
  }
  ```  
    
- Inicar sesión a traves del correo **personal/institucional**
  | Metodo | Ruta          |
  |--------|---------------|
  | POST   | /login/google |

- Registro de usuario en el portal **(*normal*)**
  | Metodo | Ruta              |
  |--------|-------------------|
  | POST   | /student/register |

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
  | Metodo | Ruta                    |
  |--------|-------------------------|
  | POST   | /student/admin/register |
  
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
  | Metodo | Ruta       |
  |--------|------------|
  | POST   | /user/show |

  **JSON**
  ```sh
  {
    "code" : "1151651"
  }
  ```
- Obtener detalles de un usuario vía Token
  | Metodo | Ruta                      |
  |--------|---------------------------|
  | GET    | /user/showByToken/{token} |

- Obtener detalles de estudiante
  | Metodo | Ruta          |
  |--------|---------------|
  | POST   | /student/show |

  **JSON**
  ```sh
  {
    "code" : "1151651",
  }
  ```

- Recuperar clave
  | Metodo | Ruta           |
  |--------|----------------|
  | POST   | /send/password |

  **JSON**
  ```sh
  {
    "email": "gabrielarturo@gmail.com"
  }
  ```

- Cambiar clave
  | Metodo | Ruta            |
  |--------|-----------------|
  | POST   | /reset/password |
  
  **JSON**
  ```sh
  {
    "email" :  "gabrielarturo@gmail.com",
    "password" : "hola2",
    "password_confirmation" : "hola2",
    "token" : "oxerLarFqRs2lwNUXozWF01kv11yTTeg8LnjiFADcx5TsfDtpIvrTgUdfdzk"
  }
  ```

- Editar información del usuario
  | Metodo | Ruta                     |
  |--------|--------------------------|
  | PUT    | /student/admin/edit/{id} |
   
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
  | Metodo | Ruta                      |
  |--------|---------------------------|
  | DELETE | student/admin/delete/{id} |






### Servicio Rol

- Listar roles
  | Metodo | Ruta      |
  |--------|-----------|
  | GET    | /rol/list |

- Obtener detalle de un rol en especifico
  | Metodo | Ruta      |
  |--------|-----------|
  | GET    | /rol/show |

  **JSON**
  ```sh
  {
    "role_id": 3
  }
  ```

- Registrar rol
  | Metodo | Ruta          |
  |--------|---------------|
  | POST   | /rol/register |
  
  **JSON**
  ```sh
  {
    "name": "Admin"
  }
  ```

- Editar rol
  | Metodo | Ruta        |
  |--------|-------------|
  | PUT    | /rol/update |

  **JSON**
  ```sh
  {
    "role_id":3
  }
  ```

- Eliminar un rol en especifico
  | Metodo | Ruta          |
  |--------|---------------|
  | DELETE | /rol/delete/3 |

### Servicio Rol al Usuario
- Agregar un rol al usuario
  | Metodo | Ruta             |
  |--------|------------------|
  | POST   | /student/rol/add |

  **JSON**
  ```sh
  {
   "student_code":"115165",
   "role": "Admin"
  }
  ```

- Eliminar un rol al usuario
  | Metodo | Ruta                |
  |--------|---------------------|
  | DELETE | /student/rol/delete |

  **JSON**
  ```sh
  {
   "student_code":"115165",
   "role": "Admin"
  }
  ```
### Servicio Permisos

- Listar permisos
  | Metodo | Ruta             |
  |--------|------------------|
  | GET    | /permission/list |

- Registrar un permiso **(*funcionalidad*)**
  | Metodo | Ruta                 |
  |--------|----------------------|
  | POST   | /permission/register |

  **JSON**
  ```sh
  {
    "name" : "create user"
  }
  ```

- Asignación de permisos al rol
  | Metodo | Ruta               |
  |--------|--------------------|
  | POST   | /permission/aggRol |

  **JSON**
  ```sh
  {
    "name": "Teacher",
    "name_permission": "create user"
  }
  ```

- Obtener detalles de un permiso
  | Metodo | Ruta             |
  |--------|------------------|
  | POST   | /permission/show |

  **JSON**
  ```sh
  {
    "id" : "1"
  }
  ```

- Obtener permisos vinculados al rol
  | Metodo | Ruta          |
  |--------|---------------|
  | POST   | /rol/dataPerm |

  **JSON**
  ```sh
  {
     "api_token": "LIToHuYqcXv2fURzvTBycMXHfR4oZJj34jvb8M8xoKNKAo8GmNfDitBAUHid1cO9d3gTdhNRjeOGzuO7vPZXEFcMXbNkjTO9GrAmFOjHWP6WZsjM3hPLbLIOqmINhU7woYOib2xOGw92o5gFmoLgpL",
     "name": "Admin"
  }
  ```

### Microservicio Notificaciones

Todas las rutas para acceder a este microservicio tienen el prefix de /notification-service

- Obtener todas las notificaciones por el id del usuario.
  | Metodo | Ruta                      |
  |--------|---------------------------|
  | GET    | /users/{id}/notifications |

- Registrar una notificación para el usuario con el id.
  | Metodo | Ruta                 |
  |--------|----------------------|
  | POST   | /users/notifications |

  **JSON**
  ```sh
  {
    "title": "required-string",
    "description": "required-string",
    "id_user" : "required-integer",
    "id_sender" : "not_required-integer",
    "id_type" : "required-integer"
  }
  ``` 

- Eliminar las notificaciones del usuario con el id.
  | Metodo | Ruta                      |
  |--------|---------------------------|
  | DELETE | /users/{id}/notifications |

- Actualizar la notificación.
  | Metodo | Ruta                      |
  |--------|---------------------------|
  | PUT    | /users/{id}/notifications |

    **JSON**
  ```sh
  {
    "title": "required-string",
    "description": "required-string",
    "id_user" : "required-string",
    "id_sender" : "not_required-string",
    "id_type" : "required-integer"
    "id_state" : "required-integer"
  }
  ``` 

- Registrar un usuario dentro del microservicio.
  | Metodo | Ruta   |
  |--------|--------|
  | POST   | /users |

    **JSON**
  ```sh
  {
    "fullname": "required-string",
    "email": "required-string",
    "id_role" : "required-string",
  }
  ``` 

- Marcar como vistas, las notificaciones de un usuario.
  | Metodo | Ruta                     |
  |--------|--------------------------|
  | PATCH  | /users/checkNotification |

    **JSON**
  ```sh
  {
    "id": "required-integer",
  }
  ``` 

- Enviar una notificación por SMS.
  | Metodo | Ruta              |
  |--------|-------------------|
  | POST   | /sendNotiToNumber |

      **JSON**
  ```sh
  {
    "numero": "required-string",
    "mensaje": "required-string"
  }
  ``` 

- Enviar correo de notificación de una asesoría.
  | Metodo | Ruta              |
  |--------|-------------------|
  | POST   | /sendMailAsesoria |

      **JSON**
  ```sh
  {
    "email":"email@gmail.com", 
    "username":"Dcris", 
    "teacher_name":"Milton Vera", 
    "hora":"4:30 PM"
  }
  ``` 

- Enviar correo de notificación de una auditoría.
  | Metodo | Ruta               |
  |--------|--------------------|
  | POST   | /sendMailAuditoria |

      **JSON**
  ```sh
  {
    "email":"email@gmail.com", 
    "username":"Dcris", 
    "teacher_name":"Milton Vera", 
    "hora":"4:30 PM"
  }
  ``` 
### Microservicio Knowledge
Todas las rutas para acceder a este microservicio tienen el prefix de /knowledge-service

- Registrar un nuevo usuario dentro del microservicio (redundar el usuario).
  | Metodo | Ruta   |
  |--------|--------|
  | POST   | /users |

  **JSON**
  ```sh
  {
     "id":"asjdhsdfdf",
     "name":"Carlos",
     "email":"prueba@gmail.com",
     "code":"1151505"
  }
  ``` 

- Anunciar al microservicio Knowledge service que entró a sesión.
  | Metodo | Ruta   |
  |--------|--------|
  | POST   | /login |

  **JSON**
  ```sh
  {
     "token":"asjdhsdfdf"
  }
  ``` 

### Microservicio Tutoria MAPEADO, FALTA PROBAR

Todas las rutas para acceder a este microservicio tienen el prefix de /tutoring-service

#### Servicio Tutoria

- Permite obtener todas las tutorias.
  | Metodo | Ruta      |
  |--------|-----------|
  | GET    | /tutorias |

- Permite obtener todas las tutorias terminadas.
  | Metodo | Ruta                 |
  |--------|----------------------|
  | GET    | /tutorias/terminadas |

- Permite obtener todas las tutorias activas.
  | Metodo | Ruta              |
  |--------|-------------------|
  | GET    | /tutorias/activas |

- Inscribirse a una tutoria
  | Metodo | Ruta                                 |
  |--------|--------------------------------------|
  | GET    | /tutorias/subscribe/{id}/{idusuario} |

  **Header**
  ```sh
  {
    Authorization: "string"
  }
  ``` 

- Registrar una tutoria
  | Metodo | Ruta      |
  |--------|-----------|
  | POST   | /tutorias |

  **Header**
  ```sh
  {
    Authorization: "string"
  }
  ``` 

  **JSON**
  ```sh
  {
    "dateEnd": "2021-12-15T03:35:52.761Z",
    "dateStrat": "2021-12-15T03:35:52.761Z",
    "description": "string",
    "id": 0,
    "idcategory": 0,
    "lissubjets": [ 0 ],
    "reason": "string",
    "state": true,
    "userCreator": 0,
    "userTutor": 0
  }
  ``` 

- Editar una tutoria
  | Metodo | Ruta     |
  |--------|----------|
  | PUT    | /tutoria |

  **JSON**
  ```sh
  {
    "category": {
       "id": 0,
       "name": "string"
    },
    "dateEnd": "2021-12-15T03:34:55.427Z",
    "dateStart": "2021-12-15T03:34:55.427Z",
    "description": "string",
    "id": 0,
    "reason": "string",
    "state": true,
    "subjectList": [
      {
        "id": 0,
        "name": "string"
      }
    ],
    "userCreator": {
      "address": "string",
      "age": "string",
      "apiToken": "string",
      "code": 0,
      "email": "string",
      "lastName": "string",
      "name": "string",
      "phone": "string",
      "role": "string",
      "semester": "string",
      "studentEmail": "string",
      "universityCareer": "string"
    },
    "userList": [
      {
        "address": "string",
        "age": "string",
        "apiToken": "string",
        "code": 0,
        "email": "string",
        "lastName": "string",
        "name": "string",
        "phone": "string",
        "role": "string",
        "semester": "string",
        "studentEmail": "string",
        "universityCareer": "string"
      }
    ],
    "userTutor": {
      "address": "string",
      "age": "string",
      "apiToken": "string",
      "code": 0,
      "email": "string",
      "lastName": "string",
      "name": "string",
      "phone": "string",
      "role": "string",
      "semester": "string",
      "studentEmail": "string",
      "universityCareer": "string"
    }
  }
  ```

- Eliminar una tutoria por su **id** y **nombre**
  | Metodo | Ruta                    |
  |--------|-------------------------|
  | PUT    | /tutorias/{id}/{nombre} |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }

#### Servicio Tema

- Permite obtener todos los temas.
  | Metodo | Ruta   |
  |--------|--------|
  | GET    | /temas |

- Permite buscar un tema por su **nombre**.
  | Metodo | Ruta            |
  |--------|-----------------|
  | POST   | /temas/{nombre} |

  **JSON**
  ```sh
  {
    "nombre": "string"
  }
  ``` 

- Registrar un tema
  | Metodo | Ruta   |
  |--------|--------|
  | POST   | /temas |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }
  ``` 

- Editar un tema
  | Metodo | Ruta   |
  |--------|--------|
  | PUT    | /temas |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }
  ``` 

- Eliminar un tema por su **id** y **nombre**
  | Metodo | Ruta                 |
  |--------|----------------------|
  | PUT    | /temas/{id}/{nombre} |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }
  ```

#### Servicio Categoria

- Permite obtener todas las categorias.
  | Metodo | Ruta            |
  |--------|-----------------|
  | GET    | /categoria/list |

- Registrar una Categoria
  | Metodo | Ruta            |
  |--------|-----------------|
  | POST   | /categoria/save |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }
  ``` 

- Editar una categoria
  | Metodo | Ruta       |
  |--------|------------|
  | PUT    | /categoria |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }
  ``` 
- Eliminar una categoria por su **id** y **nombre**
  | Metodo | Ruta                            |
  |--------|---------------------------------|
  | PUT    | /categoria/delete/{id}/{nombre} |

  **JSON**
  ```sh
  {
    "id": 0,
    "name": "string"
  }
  ```

### Microservicio Chat

Todas las rutas para acceder a este microservicio tienen el prefix de /chat-service

- Permite obtener una conversación de un usuario por su id
  | Metodo | Ruta                      |
  |--------|---------------------------|
  | GET    | /users/{id}/conversations |

- Permite obtener una conversación entre dos usuarios
  | Metodo | Ruta                                 |
  |--------|--------------------------------------|
  | GET    | /users/{user1}/{user2}/conversations |

- Permite obtener los mensajes por el id de una conversación
  | Metodo | Ruta                         |
  |--------|------------------------------|
  | GET    | /conversations/{id}/messages |

- Permite obtener los mensajes
  | Metodo | Ruta      |
  |--------|-----------|
  | POST   | /messages |

- Registrar Usuario dentro del Microservicio
  | Metodo | Ruta   |
  |--------|--------|
  | POST   | /users |

    **JSON**
  ```sh
  {
    "username":"required-string",
    "email":"required-email",
    "password": "required-password"
  }
  ```

- Permite obtener una conversación, sus mensajes.
  | Metodo | Ruta                         |
  |--------|------------------------------|
  | GET    | /conversations/{id}/messages |

  
- Registrar una conversación.
  | Metodo | Ruta           |
  |--------|----------------|
  | POST   | /conversations |

    **JSON**
  ```sh
  {
    "sendeId":"required-integer",
    "receiverId":"required-integer",
  }
  ```

### Microservicio Auditoría NO DESPLEGÓ, NO HAY ENDPOINTS

Todas las rutas para acceder a este microservicio tienen el prefix de /audit-service


## Lenguajes Programación, Tecnologias Y Frameworks
[![debug](https://img.icons8.com/color/48/000000/amazon-web-services.png)](http://18.235.152.56/students)
[![debug](https://img.icons8.com/office/42/react.png)](http://52.90.33.232/)
## Autores

- [@CamiloEscobar98](https://github.com/CamiloEscobar98)
- [@SerBuitrago](https://github.com/SerBuitrago)
- [@gabrielgarcia2211](https://github.com/gabrielgarcia2211)
- [@Ivancito-ur](https://github.com/Ivancito-ur)
- [@Danielcaos](https://github.com/Danielcaos)
- [@soleimygomez](https://github.com/soleimygomez)

## Contribuyentes
**¡Las contribuciones son siempre bienvenidas!**

## Licencia

[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)
