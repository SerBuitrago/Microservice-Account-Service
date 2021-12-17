import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const ACCION = 'rol/'
export const PETICION_ROL = 'register'
export const PETICION_LISTAR = 'list'
export const ELIMINAR_ROL = 'delete/'

class rol {

    /* peticion_agregar_rol(name){
        return axios.post(API_URL + ACCION + PETICION_ROL, {
            name
        } )
    } */

    post_rol(json) {
        console.log(json)
        return axios.post(API_URL + ACCION + PETICION_ROL, json)
    }

    get_lista_roles(token) {

        let a = {
            "api_token": token
        }
        console.log(a)

        return axios.post(API_URL + ACCION + PETICION_LISTAR, a) /* Uso del post por error en uso del get */
    }
    delete_rol(id, api_token) {
        return axios.delete(API_URL + ACCION + ELIMINAR_ROL + id, {data:{api_token}})
    }

}

export default new rol;