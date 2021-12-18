import { Component, useCallback, useState } from "react";
import css from '../css/registro.module.css'
import GoogleIcon from '@mui/icons-material/Google';
import api_student from '../api/student.js'
import Swal from "sweetalert2";

export default function RegistroComponent() {

    const [registro, setRegistro] = useState({
        code: "",
        name: "",
        last_name: "",
        phone: "",
        age: "",
        semester: "",
        address: "",
        university_career: "",
        email: "",
        password: "",
        password_2: "",
    })

    /* const auxiliar = {
        code: "",
        name: "",
        last_name: "",
        phone: "",
        age: "",
        semester: "",
        university_career: "",
        mail: "",
        password: "",
        password_2: "",
    } */

    const registrar = () => {
        /* setRegistro(auxiliar)
        */
        if(registro.code.length === 7 && registro.code.length>0 ){
            if(registro.age <=99){
                if(registro.password === registro.password_2){
                    api_student.post_student_register(registro).then(response => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Ha sido registrado',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }).catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Algo salió mal...',
                            text: 'No se pudo crear el registro (Email ya creado, codigo ya creado).',
                        })
                      })
                    
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salió mal...',
                        text: 'Contraseñas diferentes, tienen que ser iguales.',
                    })
                }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal...',
                    text: 'Este software no cree en la inmortalidad, años menor a 100.',
                })
            }
        }
        else {
            Swal.fire({
                icon: 'error',
                title: 'Algo salió mal...',
                text: 'Codigo de 7 digitos, por favor. ',
            })
        }
    }


    const handleChange = (event) => {
        registro[event.target.name]=event.target.value
    }

    return (
        <div className={css.contenedor}>
            <div className="UFPS">
                <p className="bienvenido">BIENVENIDO AL PORTAL</p>
            </div>
            <div className="contenido_login">
                <div>

                    <input name="code" type="number" placeholder="Codigo" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="name" type="text" placeholder="Nombres" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="last_name" type="text" placeholder="Apellidos" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="phone" type="number" placeholder="Telefono" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="age" type="number" placeholder="Edad" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="semester" type="text" placeholder="Semestre" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="address" type="text" placeholder="Direccion" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="university_career" type="text" placeholder="Carrera" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="email" type="mail" placeholder="Email" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="password" type="password" placeholder="Contraseña" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>
                    <input name="password_2" type="password" placeholder="Confirmar Contraseña" autoComplete="off" onChange={handleChange} className={css.input_re} ></input>

                    <button className="button_registro" onClick={registrar}>Registrar</button>
                </div>
                <br />
                <button className="button_google" value="Acceder"><GoogleIcon />   Registrarse con Google</button>
            </div>
            <div style={{ height: 25, width: '100%' }}></div>
        </div>
    );

}