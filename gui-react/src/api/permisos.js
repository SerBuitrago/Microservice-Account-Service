import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const ACCION = 'permission/'
export const PETICION_ROL = 'register'
export const PETICION_LISTAR = 'list'
export const ELIMINAR_ROL = 'delete/'
class Permisos {
    get_list_permisos(api_token){
        return axios.get(API_URL+ACCION+PETICION_LISTAR , {
            api_token:api_token
        } )
    }
}

export default new Permisos;