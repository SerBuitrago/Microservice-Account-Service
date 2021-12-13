import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const URL_PETICION_ROL = 'rol/register'
class rol {

    post_rol(json) {
        console.log(API_URL + URL_PETICION_ROL)
        return axios.post(API_URL + URL_PETICION_ROL, 
        
            json

        );
    }

}

export default new rol;