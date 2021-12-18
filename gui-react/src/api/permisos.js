import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const ACCION = 'permission/'
export const PETICION_LISTAR = 'list'
export const ELIMINAR_PERMISO = 'delete/'
export const AGG_ROL = 'aggRol'
export const AGREGAR_PERMISO = 'register'



class Permisos {


    get_list_permisos(token) {
        
        return axios.post(API_URL + ACCION + PETICION_LISTAR,  {
            api_token:token
        })
    }

    post_agregar_permiso(json){
        return axios.post(API_URL + ACCION + AGREGAR_PERMISO, json)       
    }


    post_aggRol (json) {
        return axios.post(API_URL + ACCION + AGG_ROL, json)       
    }

    delete_permisos (id,api_token) {
        return axios.delete(API_URL + ACCION + ELIMINAR_PERMISO + id, {data:{api_token}})
    }
}

export default new Permisos;