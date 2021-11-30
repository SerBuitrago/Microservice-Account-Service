# Gestion de usuarios, roles y permisos

![N|Solid](https://1.bp.blogspot.com/-Vr9ieaHwBPs/WTvLrQcDFUI/AAAAAAAABsQ/Uvhc69QqmeYmDPeNZuaEVLDk3oM4GKklACLcB/s1600/LzLinwg%255B1%255D.png)

Esta aplicacion fue realizada en Lumen Laravel con persistencia de datos en MySQL

## 🛠 Caracteristicas

### USUARIO
- Iniciar sesión de usuario en el portal
- Inicar sesion a traves de correo personal/institucional
- Registro de usuario en el portal
- Registrar un usuario al portal educativo
- Obtener detalles de usuario
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
  php -S localhost:8000 -t public
```
Verifique la implementación navegando a la dirección de su servidor en
su navegador preferido.

```sh
  http://localhost:8000/
```
## Rutas
`Para enviar data en el body a las peticiones POST utilizamos POSTMAN`

### Navegacion en Usuarios


**Peticion POST, Iniciar sesión de usuario en el portal**
```sh
http://localhost:8000/login
Opción BODY - RAW - TypeJSON
{
    "student_code" : "1151651",
    "password" : "hola"
}
```
**Peticion GET, traer un producto, Inicar sesion a traves de correo personal/institucional**
```sh
http://localhost:8000/login/google http://localhost:8000/logout
```
**Peticion POST, Registro de usuario en el portal**
```sh
http://localhost:8000/student/register
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
**Peticion GET, Listar usuarios del portal**
```sh
http://localhost:8000/student
```
**Peticion POST, Obtener detalles de usuario**
```sh
http://localhost:8000/student/show
Opción BODY - RAW - TypeJSON
{
    "code" : "1151651",
}
```
**Peticion POST, Editar información del usuario**
```sh
http://localhost:8000/student/admin/edit/{id}
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
**Peticion POST, Eliminar usuarios**
```sh
http://localhost:8000/student/admin/delete/{id}
```
**Peticion POST, Recuperar contraseña**
```sh
http://localhost:8000/send/password
Opción BODY - RAW - TypeJSON
{
    "email": "gabrielarturo@gmail.com"
}
```
**Peticion POST, Cambiar contraseña**
```sh
http://localhost:8000/reset/password
Opción BODY - RAW - TypeJSON
{
    "email" :  "gabrielarturo@gmail.com",
    "password" : "hola2",
    "password_confirmation" : "hola2",
    "token" : "oxerLarFqRs2lwNUXozWF01kv11yTTeg8LnjiFADcx5TsfDtpIvrTgUdfdzk"
}
```


## 🔗 Links
**Despliegue del MicroServicio**

 [![debug](https://img.icons8.com/color/48/000000/amazon-web-services.png)](http://18.235.152.56/students)


## License

MIT

**SOFTWARE LIBRE**
