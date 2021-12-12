import axios from 'axios';

export const API_URL = 'http://18.235.152.56/'
export const API_DIREC = 'login'
export const USER_NAME_SESSION_ATRIBUTE = 'authenticatedUser'
class tokenAuth {

    executeJwtAuthenticationService(student_code,password){
        console.log(student_code,  password)
        return axios.post(API_URL+API_DIREC, {
            student_code,
            password
        } )
    }
    createTokenJwt(token){
        return 'Bearer ' + token;
    }

    registerAuthenticationSuccesJwt(student_code,token){
        console.log(token)
        console.log(student_code + "HOLAJAJJA")
        sessionStorage.setItem(USER_NAME_SESSION_ATRIBUTE,student_code);
        this.setupAxiosInterceptos(this.createTokenJwt(token));

    }

    logout(){
        console.log(sessionStorage.getItem(USER_NAME_SESSION_ATRIBUTE))
        sessionStorage.removeItem(USER_NAME_SESSION_ATRIBUTE);
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