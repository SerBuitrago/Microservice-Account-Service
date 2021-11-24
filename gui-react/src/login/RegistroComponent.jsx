import { Component } from "react";

class RegistroComponent extends Component {
    
    render() {
        return (
            <div className="registroComponent">
                <input typeof="text" placeholder="Nombre"></input>
                <input typeof="text" placeholder="Apellido"></input>
                <input typeof="text" placeholder="Documento"></input>
                <input typeof="text" placeholder="Codigo"></input>
                <input typeof="text" placeholder="Carrera"></input>
                <input typeof="text" placeholder="Correo"></input>
                <input typeof="text" placeholder="Contraseña"></input>

                <input type="text"/>
            </div>
        );
    }
}


export default RegistroComponent;
