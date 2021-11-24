import React, { Component } from 'react'
import '../css/login.css';


class LoginComponent extends Component {

    render(){
        return(
            <div className="loginComponent">
               

               <img src="" alt="" />

               <p>Bienvenido a portal.</p>


               <input type="text" placeholder="Código"/>
               <br />
               <input type="text" placeholder="Contraseña"/>

               <button>Acceder</button>

               
            </div>
        );
    }

   
}

export default LoginComponent;