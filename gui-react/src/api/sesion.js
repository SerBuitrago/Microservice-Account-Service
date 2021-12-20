import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const URL_PETICION_ROL = 'student/show'
export const PETICION_ENVIO_CONTRA ='send/password'
export const PETICION_CAMBIO_CONTRA ='reset/password'
class sesion {

    get_sesion(student_code,token) {
        
        console.log(token)
        console.log(API_URL + URL_PETICION_ROL)
        return axios.post(API_URL + URL_PETICION_ROL, {
            code:student_code,
            api_token:token
        });
    }

    peticion_cambio_contrasena(email){
        return axios.post(API_URL + PETICION_ENVIO_CONTRA, {
            email
        } )
    }

    cambio_contraseña (json){
        console.log(json)
        return axios.post(API_URL + PETICION_CAMBIO_CONTRA, json)
    }

}

export default new sesion;