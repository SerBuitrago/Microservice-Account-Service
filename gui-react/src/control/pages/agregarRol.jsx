import { Component } from 'react';
import api_students from "../../api/rol.js";
import "../../css/agregarRol.css";

class AgregarRol extends Component {

    render() {
        return (
            <div style={{ height: 400, width: '100%'}}>
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
                    <button className='agregar'>Agregar Rol</button>
                </div>
            </div>
        );
    }

}
export default AgregarRol