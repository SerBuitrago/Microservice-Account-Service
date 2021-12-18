import { Component, useState } from 'react';
import api_permisos from "../../api/permisos.js";
import tokenAuth from "../../api/tokenAuth";
import "../../css/agregarRol.css";
import algoritmos from "../../tools/algoritmos.js"
import SidebarComponent from "../SidebarComponent.jsx";
import sesion from "../../api/sesion.js";
import { useNavigate } from 'react-router-dom';
import Swal from 'sweetalert2';

export default function AgregarPermiso() {


    const [name, setName] = useState("")
    const [api_token, setToken] = useState(algoritmos.obtenerToken(tokenAuth.getItem()))
    const navigate = useNavigate()

    const handleChange = (event) => {
        setName(event.target.value)
    }

    const click = () => {
        let aux = {
            name,
            api_token
        }
        if (name != "") {
            api_permisos.post_agregar_permiso(aux).then(response => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Agregó rol correctamente',
                    showConfirmButton: false,
                    timer: 2000
                })
                navigate("/permisos")
            }
            ).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal...',
                    text: 'vuelva a intentar.',
                })
            })
        }
        else{
            Swal.fire({
                icon: 'error',
                title: 'Ingrese datos válidos',
                text: 'No se permite vacíos',
            })
        }
    }

    return (<div>
        <SidebarComponent></SidebarComponent>
        <div className='rol'>
            <div style={{ height: 50, width: '100%' }}></div>
            <h1 className='text'>Agregar Permiso</h1>
            <div style={{ height: 30, width: '100%' }}></div>
            <input
                name="permiso"
                id="permiso"
                className="nombreRol"
                type="text"
                placeholder="Nombre del permiso"
                onChange={handleChange}
            />
            <div style={{ height: 20, width: '100%' }}></div>
            <button className='agregar' onClick={() => click()}>Agregar Permiso</button>
        </div>
    </div>)
}



