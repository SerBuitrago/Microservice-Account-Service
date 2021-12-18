import { Component, useEffect, useState } from 'react';
import SidebarComponent from "../SidebarComponent.jsx";
import "../../css/asignarPermisos.css";
import { Autocomplete, TextField } from '@mui/material';
import tokenAuth from '../../api/tokenAuth.js';
import algoritmos from '../../tools/algoritmos.js';
import api_permisos from "../../api/permisos.js";
import api_rol from "../../api/rol.js";
import Swal from 'sweetalert2';


export default function AsignarPermisos() {

    const [permisos, setPermisos] = useState([])
    const [roles, setRoles] = useState([])


    /* Lo selecionado */
    const [rolS, setRol] = useState("")
    const [permiso, setPermiso] = useState("")

    useEffect(() => {
        let token = algoritmos.obtenerToken(tokenAuth.getItem());
        api_permisos.get_list_permisos(token).then(
            response => {
                setPermisos(response.data.message)
            }
        )

        api_rol.get_lista_roles(token).then(
            response => {
                setRoles(response.data.message)
            }
        )
    }, []);

    const options = permisos.map((option) => {
        const firstLetter = option.name[0];
        return {
            firstLetter: /[0-9]/.test(firstLetter) ? '0-9' : firstLetter,
            ...option,
        };
    });

    const rol = roles.map((option) => {
        const firstLetter = option.name[0];
        return {
            firstLetter: /[0-9]/.test(firstLetter) ? '0-9' : firstLetter,
            ...option,
        };
    });


    const click = () => {
        let token = algoritmos.obtenerToken(tokenAuth.getItem())
        let json = {
            name:rolS,
            name_permission:permiso,
            api_token:token
        }

        console.log(json)

        api_permisos.post_aggRol(json).then(
            response => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se ha relacionado correctamente',
                    showConfirmButton: false,
                    timer: 2000
                })               
            }
        ).catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Upsss',
                text: 'No se pudo relacionar el permiso',
                timer:2000
            })
        })
    }

    const handleChangeRol = (event) =>{
        console.log(event.target.value)
        setRol(event.target.value)
    }
    const handleChangePermiso = (event) =>{
        console.log(event)
        setPermiso(event.target.value)
    }

    return (
        <div>
            <SidebarComponent></SidebarComponent>
            <div className='asigna'>
                <div style={{ height: 50, width: '100%' }}></div>
                <h1 className='text'>Asignar Permisos al Rol</h1>
                <div style={{ height: 30, width: '100%' }}></div>
                <div>
                    <Autocomplete
                        id="permiso"
                        options={options.sort((a, b) => -b.firstLetter.localeCompare(a.firstLetter))}
                        groupBy={(option) => option.firstLetter}
                        getOptionLabel={(option) => option.name}
                        sx={{ width: 300 }}
                        renderInput={(params) => <TextField {...params} label="Permisos" 
                        onChange={handleChangePermiso}
                        onSelect={handleChangePermiso}/>}
                    />
                </div>
                <div style={{ height: 20, width: '100%' }}></div>
                <div>
                <Autocomplete
                        id="rol"
                        options={rol.sort((a, b) => -b.firstLetter.localeCompare(a.firstLetter))}
                        groupBy={(option) => option.firstLetter}
                        getOptionLabel={(option) => option.name}
                        sx={{ width: 300 }}
                        renderInput={(params) => <TextField {...params} label="Roles"
                        onChange={handleChangeRol}
                        onSelect={handleChangeRol} />}
                    />
                </div>
                <div style={{ height: 20, width: '100%' }}></div>
                <button className='asignar' onClick={click}>Asignar Permisos</button>
            </div>
        </div>
    );
}