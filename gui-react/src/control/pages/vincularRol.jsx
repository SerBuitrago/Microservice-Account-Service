import { Component } from 'react';
import SidebarComponent from "../SidebarComponent.jsx";
import "../../css/vincularRol.css";

class VincularRol extends Component {


    render() {
        return (
            <div>
                <SidebarComponent></SidebarComponent>
                <div className='vinculo'>
                    <div style={{ height: 50, width: '100%' }}></div>
                    <h1 className='text'>Vincular Rol</h1>
                    <div style={{ height: 30, width: '100%' }}></div>
                    <div>
                        <select name="Codigo" id="">
                            <option value="">Hola</option>
                        </select>
                    </div>
                    <div style={{ height: 20, width: '100%' }}></div>
                    <div>
                        <select name="Rol" id="">
                            <option value="">Hola</option>
                        </select>
                    </div>
                    <div style={{ height: 20, width: '100%' }}></div>
                    <button className='vincular'>Vincular Rol</button>
                </div>
            </div>
        );
    }
}

export default VincularRol;