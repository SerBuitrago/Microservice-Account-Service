import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const ACCION = 'permission/'
export const PETICION_PERMISO = 'register'
export const PETICION_LISTAR = 'list'
export const ELIMINAR_PERMISO = 'delete/'
export const AGG_ROL = 'aggRol'



class Permisos {


    get_list_permisos(token) {
        
        return axios.post(API_URL + ACCION + PETICION_LISTAR,  {
            api_token:token
        })
    }


    post_aggRol (json) {
        return axios.post(API_URL + ACCION + AGG_ROL, json)

        
    }
}

export default new Permisos;