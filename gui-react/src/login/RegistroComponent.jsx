import { Component } from "react";
import css from '../css/registro.module.css'
import GoogleIcon from '@mui/icons-material/Google';

class RegistroComponent extends Component {

    infoInput = [
        {
            'placeholder': 'Nombres',
            'type': 'text'
        },
        {
            'placeholder': 'Apellidos',
            'type': 'text'
        },
        {
            'placeholder': 'Documento',
            'type': 'number'
        },
        {
            'placeholder': 'Codigo',
            'type': 'number'
        },
        {
            'placeholder': 'Carrera',
            'type': 'text'
        },
        {
            'placeholder': 'Correo Electronico',
            'type': 'mail'
        },
        {
            'placeholder': 'Contraseña',
            'type': 'password'
        },
        {
            'placeholder': 'Confirmar contraseña',
            'type': 'password'
        }
    ]

    getInput = this.infoInput.map((item, pos) => {
        return (

            <input type={item.type} placeholder={item.placeholder} autocomplete="off" key={pos} className={css.balloon}></input>

        );
    })


    render() {
        return (
            <div className={css.contenedor}>
                <div className="UFPS">
                    <p className="bienvenido">BIENVENIDO AL PORTAL</p>
                </div>
                <div className="contenido_login">
                    <form action="">                    
                    {this.getInput}
                    <button className="button_registro">Registrar</button>
                    </form>
                    <br />
                    <button className="button_google" value="Acceder"><GoogleIcon/>   Registrarse con Google</button>
                </div>
                <div style={{ height: 25, width: '100%'}}></div>
            </div>
        );
    }
}


export default RegistroComponent;

