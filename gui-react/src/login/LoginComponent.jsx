import React, { useState} from "react";
import { Grid } from '@material-ui/core'
import AuthenticatedRoute from "../api/AuthenticatedRouter";
import tokenAuth from "../api/tokenAuth";
import ControlComponent from "../control/ControlComponente";
import "../css/login.css";

import Swal from 'sweetalert2'

import { useNavigate } from 'react-router-dom'




export default function LoginComponent() {

    const [name,setName] = useState("")
    const [password,setPassword] = useState("")
    const navigate = useNavigate()
   

    const handleChangeName = (event) => {
        console.log(event.target.value)
        setName(event.target.value)
    }
    const handleChangePassword = (event) => {
        console.log(event.target.value)
        setPassword(event.target.value)
    }

    const clickLogin = () => {

        tokenAuth.executeJwtAuthenticationService(name, password)
            .then((response) => {
                console.log(response)
                if (response.data.message==="¡data incorrect!") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salió mal...',
                        text: 'Los datos son incorrectos, vuelva a intentar.',
                      })
                }
                else{
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Inició sesión correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    tokenAuth.registerAuthenticationSuccesJwt(name, response.data.api_token);
                    navigate("/students")
                }
                /* this.context.router.push("/dash") */

            }).catch((error) => {
                alert("Datos incorrectos")
                console.log(error)
            }
            )
        /* .catch((error) => {
            this.setState({
                falloSesion: true
            });
            console.log("NO INICIA")
        }); */
    }

    return (

        <div className="loginComponent">
            <div className="UFPS">
                <p className="bienvenido">BIENVENIDO AL PORTAL</p>
            </div>


            <input
                name="name"
                id="name"
                className="campos"
                type="text"
                placeholder="Código"
                onChange={handleChangeName}
            />
            <br />
            <input
                name="password"
                id="password"
                className="campos"
                type="password"
                placeholder="Contraseña"
                onChange={handleChangePassword}
            />

            <button className="button_registro" onClick={() => clickLogin()} value="Acceder">Acceder </button>

            <div className="servicios">
                <Grid container>
                    <Grid item xs={5}>
                        <label ><input className="chec" type="checkbox" value="Recuerdame" />Recuerdame</label>
                    </Grid>
                    <Grid item xs={7}>
                        <div className="olvidar">
                            <a className="href" href="#">Olvide mi contraseña</a>
                        </div>
                    </Grid>
                </Grid>
            </div>


        </div>
    );

}


