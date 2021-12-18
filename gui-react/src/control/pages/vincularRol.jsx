import { Component, useEffect, useState } from 'react';
import SidebarComponent from "../SidebarComponent.jsx";
import "../../css/vincularRol.css";
import tokenAuth from '../../api/tokenAuth.js';
import algoritmos from '../../tools/algoritmos.js';
import api_student from "../../api/student";
import api_rol from "../../api/rol.js";
import Swal from 'sweetalert2';
import { Autocomplete, TextField } from '@mui/material';


export default function VincularRol() {

    const [usuarios, setUsuarios] = useState([])
    const [roles, setRoles] = useState([])

    const [usuario,setUsuario] = useState()
    const [role,setRol] = useState()


    useEffect(() => {
        console.log("sadjcsajdoijsaodfjopsiajdoif")
        let token = algoritmos.obtenerToken(tokenAuth.getItem());
        api_student.get_students(token).then(
            response => {
                console.log(response.data.data)
                setUsuarios(response.data.data)
            }
        )
        api_rol.get_lista_roles(token).then(
            response => {
                console.log(response.data.message)
                setRoles(response.data.message)
            }
        )
    }, []);

    const options = usuarios.map((option) => {
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
            role:role,
            student_code:usuario,
            api_token:token
        }

        console.log(json)

        api_rol.post_asignar_rol_a_usuario(json).then( response => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Se ha relacionado correctamente',
                showConfirmButton: false,
                timer: 2000
            })             
        }).catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Upsss',
                text: 'No se pudo relacionar el rol',
                timer:2000
            })
        })
      /*   api_permisos.post_aggRol(json).then(
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
        }) */
    }

    const handleChangeRol = (event) =>{
        console.log(event.target.value)
        setRol(event.target.value)
    }
    const handleChangeUsuario = (event) =>{
        setUsuario(algoritmos.obetenertCodeDePrimero(event.target.value))
    }

   
        return (
            <div>
                <SidebarComponent></SidebarComponent>
                <div className='vinculo'>
                    <div style={{ height: 50, width: '100%' }}></div>
                    <h1 className='text'>Vincular Rol al Usuario</h1>
                    <div style={{ height: 30, width: '100%' }}></div>
                    <div>
                    <Autocomplete
                        id="usuario"
                        options={options.sort((a, b) => -b.firstLetter.localeCompare(a.firstLetter))}
                        groupBy={(option) => option.firstLetter}
                        getOptionLabel={(option) => option.code + " - " + option.name} 
                        sx={{ width: 300 }}
                        renderInput={(params) => <TextField {...params} label="Usuarios" 
                        onSelect={handleChangeUsuario}/>}
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
                    <button className='vincular'>Vincular Rol</button>
                </div>
            </div>
        );

}