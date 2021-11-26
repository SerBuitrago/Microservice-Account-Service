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

                    <button>Acceder</button>
                </form>
                {/* <div>
                <input type="checkbox">Recuerdame</input>
                </div> */}
            </div>
        );
    }
}

export default LoginComponent;
