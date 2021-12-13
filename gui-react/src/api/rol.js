import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const URL_PETICION_ROL = 'rol/register'
class rol {

    post_rol() {
        console.log(API_URL + URL_PETICION_ROL)
        return axios.post(API_URL + URL_PETICION_ROL, {
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Methods': 'GET,PUT,POST,DELETE,PATCH,OPTIONS',
            }
        });
    }

}

export default new rol;