import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const URL_PETICION_ROL = 'students'
class students {

    get_students(token) {
        
        console.log(API_URL + URL_PETICION_ROL)
        return axios.post(API_URL + URL_PETICION_ROL, {
            api_token:token
        });
    }

}

export default new students;