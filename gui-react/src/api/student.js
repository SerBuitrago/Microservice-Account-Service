import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const URL_PETICION_ROL = 'students'
class students {

    get_students() {
        console.log(API_URL + URL_PETICION_ROL)
        return axios.get(API_URL + URL_PETICION_ROL, {
            headers: {
                'Access-Control-Allow-Origin': 'http://127.0.0.1:3000',
                'Access-Control-Allow-Methods': 'GET,PUT,POST,DELETE,PATCH,OPTIONS',
            }
        });
    }

}

export default new students;