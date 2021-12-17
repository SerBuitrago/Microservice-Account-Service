import { Component } from 'react';
import api_rol from "../../api/rol.js";
import tokenAuth from "../../api/tokenAuth";
import "../../css/agregarRol.css";
import algoritmos from "../../tools/algoritmos.js"
import SidebarComponent from "../SidebarComponent.jsx";
import sesion from "../../api/sesion.js";

class AgregarRol extends Component {

    constructor(props){
        super(props);
        console.log(props)
        this.state ={
            name:"",
            api_token:""
        }

        this.click = this.click.bind(this);
        this.handleChange = this.handleChange.bind(this);

    }

    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value //el state y la forma de className tienen que ser iguales
        });
    }

    click() {
        console.log(this.props)
        api_rol.peticion_agregar_rol(this.state.rol)
        var token = algoritmos.obtenerToken(tokenAuth.getItem());
        this.setState({
            api_token: token
        });
        api_rol.post_rol(this.state)
    }

    render() {
        return (
            <div>
                <SidebarComponent></SidebarComponent>
                <div className='rol'>
                    <div style={{ height: 50, width: '100%'}}></div>
                    <h1 className='text'>Agregar Rol</h1>
                    <div style={{ height: 50, width: '100%'}}></div>
                    <input
                            name="rol"
                            id="rol"
                            className="nombreRol"
                            type="text"
                            placeholder="Nombre del rol"
                            onChange={this.handleChange}
                    />
                    <div style={{ height: 20, width: '100%'}}></div>
                    <button className='agregar' onClick={()=> this.click()}>Agregar Rol</button>
                </div>
            </div>
        );
    }

}
export default AgregarRol