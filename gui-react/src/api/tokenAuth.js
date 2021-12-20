import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const API_DIREC = 'login'
export const API_LOGOUT = 'logout'
export const USER_NAME_SESSION_ATRIBUTE = 'authenticatedUser'
export const USER_NAME_SESSION_CODIGO = 'codeUser'
class tokenAuth {

    token =""

    executeJwtAuthenticationService(student_code,password){
        console.log(student_code,  password)
        return axios.post(API_URL+API_DIREC, {
            student_code,
            password
        } )
    }
    createTokenJwt(token){
        this.token=token
        return 'Bearer ' + token;
    }

    registerAuthenticationSuccesJwt(student_code,token){

        console.log(token)
        let a = [
            student_code,
            token
    ]
    console.log(a)
        /* sessionStorage.setItem(USER_NAME_SESSION_ATRIBUTE,token); */ /* Esto no es para nada seguro pero necesito que funcion  */
        sessionStorage.setItem(USER_NAME_SESSION_ATRIBUTE,a); /* Esto no es para nada seguro pero necesito que funcion  */
        this.setupAxiosInterceptos(this.createTokenJwt(token));

    }

    logout(api_token){
        console.log(sessionStorage.getItem(USER_NAME_SESSION_ATRIBUTE))
        sessionStorage.removeItem(USER_NAME_SESSION_ATRIBUTE);
        return axios.get(API_URL + API_LOGOUT,{
            api_token:api_token
        })
    }

    getAuthenticated(){
        let authenticated = sessionStorage.getItem(USER_NAME_SESSION_ATRIBUTE);
        if (authenticated === null) {
            return false;
        }
        return true;
    }
    getItem(){
        return sessionStorage.getItem(USER_NAME_SESSION_ATRIBUTE);
    }

    setupAxiosInterceptos(token){
        console.log(this.getAuthenticated())
        axios.interceptors.request.use((config) => {
            if(this.getAuthenticated()){
                config.headers.Authorization  = token;
            }
            //console.log(config)
            return config;
        })

    }

}
export default new tokenAuth;