# Gestion de usuarios, roles y permisos

![N|Solid](https://1.bp.blogspot.com/-Vr9ieaHwBPs/WTvLrQcDFUI/AAAAAAAABsQ/Uvhc69QqmeYmDPeNZuaEVLDk3oM4GKklACLcB/s1600/LzLinwg%255B1%255D.png)

Esta aplicacion fue realizada en Lumen Laravel con persistencia de datos en MySQL

## 🛠 Caracteristicas

### USUARIO
- Iniciar sesión de usuario en el portal
- Inicar sesion a traves de correo personal/institucional
- Registro de usuario en el portal (normal)
- Registrar un usuario al portal educativo (admin)
- Obtener detalles de usuario
- Obtener detalles de estudiante
- Editar información del usuario
- Listar usuarios
- Eliminar usuarios
- Recuperar contraseña
- Cambiar contraseña


## Instalacion Local
Primero  debemos instalar  [Laragon](https://laragon.org/download/index.html) en nuestro equipo.

Clonar el proyecto

```bash
  https://github.com/Arquitectura-de-software-UFPS-2021-2/Microservice-Account-Service.git
```

ir al directorio del proyecto

```bash
  cd my-project
```

Luego se Instala/Actualiza las dependencias composer en la terminal del proyecto.

```sh
  composer update
```

Corremos el proyecto a traves del siguiente comando.

```sh
  php -S 18.235.152.56 -t public
```
Verifique la implementación navegando a la dirección de su servidor en
su navegador preferido.

```sh
  http://18.235.152.56/
```
- `PARA CADA PETICION SE DEBE ENVIAR EL API_TOKEN(GENERADO), EN EL BODY`

## Rutas
`Para enviar data en el body a las peticiones POST utilizamos POSTMAN`

### Navegacion en Usuarios


**Peticion POST, Iniciar sesión de usuario en el portal**
```sh
http://18.235.152.56/login
Opción BODY - RAW - TypeJSON
{
    "student_code" : "1151651",
    "password" : "hola"
}
```
**Peticion POST, Inicar sesion a traves de correo personal/institucional**
```sh
http://18.235.152.56/login/google
```
**Peticion GET, Cerra sesion**
```sh
http://18.235.152.56/logout
```
**Peticion POST, Registro de usuario en el portal (normal)**
```sh
http://18.235.152.56/student/register
Opción BODY - RAW - TypeJSON
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
**Peticion POST, Registro de usuario en el portal (admin)**
```sh
http://18.235.152.56/student/admin/register
Opción BODY - RAW - TypeJSON
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
**Peticion POST, Obtener detalles de usuario**
```sh
http://18.235.152.56/user/show
Opción BODY - RAW - TypeJSON
{
    "code" : "1151651",
}
```
**Peticion POST, Obtener detalles de estudiante**
```sh
http://18.235.152.56/student/show
Opción BODY - RAW - TypeJSON
{
    "code" : "1151651",
}
```
**Peticion PUT, Editar información del usuario**
```sh
http://18.235.152.56/student/admin/edit/{id}
Opción BODY - RAW - TypeJSON
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
**Peticion GET, Listar usuarios del portal**
```sh
http://18.235.152.56/student
```
**Peticion DELTE, Eliminar usuarios**
```sh
http://18.235.152.56/student/admin/delete/{id}
```
**Peticion POST, Recuperar contraseña**
```sh
http://18.235.152.56/send/password
Opción BODY - RAW - TypeJSON
{
    "email": "gabrielarturo@gmail.com"
}
```
**Peticion POST, Cambiar contraseña**
```sh
http://18.235.152.56/reset/password
Opción BODY - RAW - TypeJSON
{
    "email" :  "gabrielarturo@gmail.com",
    "password" : "hola2",
    "password_confirmation" : "hola2",
    "token" : "oxerLarFqRs2lwNUXozWF01kv11yTTeg8LnjiFADcx5TsfDtpIvrTgUdfdzk"
}
```
---------------------------------
### ROLES
- Registrar rol
- Obtener detalles del rol
- Editar información del rol
- Listar roles 
- Eliminar roles
- Agregar Rol al Usuario
- Eliminar Rol al Usuario

**Peticion POST, Registrar rol**
```sh
http://18.235.152.56/rol/register
Opción BODY - RAW - TypeJSON
 {
    "name": "Admin"
 }
```
**Peticion GET, Obtener detalles del rol**
```sh
http://18.235.152.56/rol/show
Opción BODY - RAW - TypeJSON
{
    "role_id":3
}
```
**Peticion PUT, Editar información del rol**
```sh
http://18.235.152.56/rol/update
Opción BODY - RAW - TypeJSON
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
Opción BODY - RAW - TypeJSON
{
   "student_code":"115165",
   "role": "Admin"
}
```
**Peticion DELETE, Eliminar Rol al Usuario**
```sh
http://18.235.152.56/student/rol/delete
Opción BODY - RAW - TypeJSON
{
   "student_code":"115165",
   "role": "Admin"
}
```

---------------------------------
### PERMISOS
- Registrar un permiso (funcionalidad)
- Asignación de permisos al rol
- Desvincular permisos al rol
- Obtener detalles de un permiso
- Editar información del permiso
- Listar permisos
- Eliminar permiso
- Obtener permisos vinculados al rol

**Peticion POST, Registrar un permiso (funcionalidad)**
```sh
http://18.235.152.56/permission/register
Opción BODY - RAW - TypeJSON
{
    "name" : "create user"
}
```
**Peticion POST, Asignación de permisos al rol**
```sh
http://18.235.152.56/permission/aggRol
Opción BODY - RAW - TypeJSON
{
    "name": "Teacher",
    "name_permission": "create user"
}
```
**Peticion DELTE, Desvincular permisos al rol**
```sh
http://18.235.152.56/permission/deleteRolPerm
Opción BODY - RAW - TypeJSON
{
    "name": "Teacher",
    "name_permission": "create user"
}
```
**Peticion POST, Obtener detalles de un permiso**
```sh
http://18.235.152.56/permission/show
Opción BODY - RAW - TypeJSON
{
    "id" : "1"
}
```
**Peticion PUT, Editar información del permiso**
```sh
http://18.235.152.56/permission/update
Opción BODY - RAW - TypeJSON
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
Opción BODY - RAW - TypeJSON
{
     "api_token": "LIToHuYqcXv2fURzvTBycMXHfR4oZJj34jvb8M8xoKNKAo8GmNfDitBAUHid1cO9d3gTdhNRjeOGzuO7vPZXEFcMXbNkjTO9GrAmFOjHWP6WZsjM3hPLbLIOqmINhU7woYOib2xOGw92o5gFmoLgpL",
     "name": "Admin"
}
```

## 🔗 Links
**Despliegue del MicroServicio**

 [![debug](https://img.icons8.com/color/48/000000/amazon-web-services.png)](http://18.235.152.56/students)

** Uso del Microservicio ** 

[![debug](https://img.icons8.com/office/42/react.png)](http://52.90.33.232/)


## 🔗 Rutas para consumir la ApiGateWay

## License

MIT

**SOFTWARE LIBRE**
