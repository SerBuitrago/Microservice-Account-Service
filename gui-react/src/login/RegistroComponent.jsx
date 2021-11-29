import { Component } from "react";
import css from '../css/registro.module.css'

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
                <div className={css.cabeza}>
                    <h3 className={css.titulo_registro}> Formulario de registro </h3>
                </div>
                <form action="">                    
                {this.getInput}
                <button>Registrar</button>
                </form>
            </div>
        );
    }
}


export default RegistroComponent;
