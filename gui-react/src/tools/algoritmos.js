import tokenAuth from "../api/tokenAuth"

class Algoritmos {


    obtenerToken() {        
        let a = tokenAuth.getItem().split(",")
        return a[1]
    }
    obtenerCode(string){
        let a = tokenAuth.getItem().split(",")
        return a[0]
    }

}

export default new Algoritmos;