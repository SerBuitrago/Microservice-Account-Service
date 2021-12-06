import React, { Component } from "react";
import "../css/login.css";
import logo from "./../ufps_resource/3.png";

class LoginComponent extends Component {
    render() {
        return (
            <div className="loginComponent">
                <div className="UFPS">
                    <p className="bienvenido">Bienvenido al Portal.</p>

                </div>

                <form>
                    <input
                        className="campos"
                        type="text"
                        placeholder="Código"
                    />
                    <br />
                    <input
                        className="campos"
                        type="text"
                        placeholder="Contraseña"
                    />

                    <button className="button_registro" type="submit" value="Acceder">Acceder </button>

                    <label > <input className="chec" type="checkbox" value="Recuerdame" />Recuerdame</label>
                    <a className="href" href="#">Olvidar Costraseña </a>

                </form>
            </div>
        );
    }
}

export default LoginComponent;
