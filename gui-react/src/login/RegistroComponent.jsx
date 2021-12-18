import { Component } from "react";
import css from '../css/registro.module.css'
import GoogleIcon from '@mui/icons-material/Google';

export default function RegistroComponent() {

    const registrar = (event) => {
        console.log(event)
    }

    return (
        <div className={css.contenedor}>
            <div className="UFPS">
                <p className="bienvenido">BIENVENIDO AL PORTAL</p>
            </div>
            <div className="contenido_login">
                <form >

                    <input name="code" type="number" placeholder="Codigo" autoComplete="off" className={css.balloon} ></input>
                    <input name="name" type="text" placeholder="Nombres" autoComplete="off" className={css.balloon} ></input>
                    <input name="last_name" type="text" placeholder="Apellidos" autoComplete="off" className={css.balloon} ></input>
                    <input name="phone" type="number" placeholder="Telefono" autoComplete="off" className={css.balloon} ></input>
                    <input name="age" type="number" placeholder="Edad" autoComplete="off" className={css.balloon} ></input>
                    <input name="semester" type="text" placeholder="Semestre" autoComplete="off" className={css.balloon} ></input>
                    <input name="university_career" type="text" placeholder="Carrera" autoComplete="off" className={css.balloon} ></input>
                    <input name="mail" type="mail" placeholder="Email" autoComplete="off" className={css.balloon} ></input>
                    <input name="password" type="password" placeholder="Contraseña" autoComplete="off" className={css.balloon} ></input>
                    <input name="password_2" type="password" placeholder="Confirmar Contraseña" autoComplete="off" className={css.balloon} ></input>

                    <button className="button_registro">Registrar</button>
                </form>
                <br />
                <button className="button_google" value="Acceder"><GoogleIcon />   Registrarse con Google</button>
            </div>
            <div style={{ height: 25, width: '100%' }}></div>
        </div>
    );

}