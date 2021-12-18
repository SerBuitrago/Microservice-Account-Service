import { Component } from 'react';
import SidebarComponent from "../SidebarComponent.jsx";
import "../../css/asignarPermisos.css";

class AsignarPermisos extends Component {


    render() {
        return (
            <div>
                <SidebarComponent></SidebarComponent>
                <div className='asigna'>
                    <div style={{ height: 50, width: '100%' }}></div>
                    <h1 className='text'>Asignar Permisos al Rol</h1>
                    <div style={{ height: 30, width: '100%' }}></div>
                    <div>
                        <select name="Rol" id="">
                            <option value="">Hola</option>
                        </select>
                    </div>
                    <div style={{ height: 20, width: '100%' }}></div>
                    <div>
                        <select name="Permiso" id="">
                            <option value="">Hola</option>
                        </select>
                    </div>
                    <div style={{ height: 20, width: '100%' }}></div>
                    <button className='asignar'>Asignar Permisos</button>
                </div>
            </div>
        );
    }
}

export default AsignarPermisos;