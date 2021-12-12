import React, { Component } from "react";
import AuthenticatedRoute from "../api/AuthenticatedRouter";
import tokenAuth from "../api/tokenAuth";
import ControlComponent from "../control/ControlComponente";
import "../css/login.css";
import logo from "./../ufps_resource/3.png";

import { useHistory } from 'react-router-dom'


class LoginComponent extends Component {

    constructor(props){
        super(props);
        console.log(props)
        this.state ={
            name:"",
            password:""
        }

        this.clickLogin = this.clickLogin.bind(this);
        this.handleChange = this.handleChange.bind(this);

    }


    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value //el state y la forma de className tienen que ser ifuales
        });
    }

    clickLogin() {
        console.log(this.props)
        
        tokenAuth.executeJwtAuthenticationService(this.state.name, this.state.password)
        .then((response) => {
                
                tokenAuth.registerAuthenticationSuccesJwt(this.state.name,response.data.api_token);
                                
                /* this.props.history.push("/students"); */
                /* this.context.router.push("/dash") */

            })
            /* .catch((error) => {
                this.setState({
                    falloSesion: true
                });
                console.log("NO INICIA")
            }); */
    }
    render() {
        return (
            
            <div className="loginComponent">
                <div className="UFPS">
                    <p className="bienvenido">Bienvenido al Portal.</p>
                </div>

            
                    <input
                        name="name"
                        id="name"
                        className="campos"
                        type="text"
                        placeholder="Código"
                        onChange={this.handleChange}
                    />
                    <br />
                    <input
                        name="password"
                        id="password"
                        className="campos"
                        type="text"
                        placeholder="Contraseña"
                        onChange={this.handleChange}
                    />

                    <button className="button_registro" onClick={()=> this.clickLogin()} value="Acceder">Acceder </button>

                    <label > <input className="chec" type="checkbox" value="Recuerdame" />Recuerdame</label>
                    <a className="href" href="#">Olvidar Costraseña </a>

                
            </div>
        );
    }
}

export default LoginComponent;
