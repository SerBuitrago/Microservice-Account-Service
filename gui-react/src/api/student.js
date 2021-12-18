import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const URL_PETICION_STUDENT = 'student'
export const ACCION_LISTAR = 'students'
export const ACCION_REGISTRAR= '/register'
class students {

    get_students(token) {        
        return axios.post(API_URL + ACCION_LISTAR, {
            api_token:token
        });
    }

    post_student_register(json){
        return axios.post(API_URL + URL_PETICION_STUDENT + ACCION_REGISTRAR, json)
    }

}

export default new students;