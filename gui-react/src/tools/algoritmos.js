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

    obetenertCodeDePrimero(string){ /* Este metodo es para vincular rol en el seleccionador */
        let a = string.split(" - ")
        return a[0]
    }

}

export default new Algoritmos;