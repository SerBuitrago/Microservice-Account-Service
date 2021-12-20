import { Component } from "react";
import SidebarComponent from "../SidebarComponent.jsx";
import classes from "../../css/pages.module.css"
import { Button, TextField } from "@mui/material";
import sesion from "../../api/sesion.js";
import algoritmos from "../../tools/algoritmos.js";
import {Grid} from '@material-ui/core'
import Swal from 'sweetalert2'

class CambiarContraseña extends Component {

    constructor(props) {
        super(props);
        this.state = {
            name: "",
            code: "",
            email: "",
            password: "",
            password_confirmation: "",
            token: ""
        }
        this.handleChange = this.handleChange.bind(this);
        this.cambiarContrasena = this.cambiarContrasena.bind(this);
    }

    componentDidMount() {
        this.data()
    }

    data() {
        let code = algoritmos.obtenerCode()
        let token = algoritmos.obtenerToken()
        sesion.get_sesion(code, token).then(response => {
            this.setState({
                name: response.data.message[0].name,
                email: response.data.message[0].email,
                code: code
            })
        })
    }

    cambiarContrasena() {
        if (this.state.password === this.state.password_confirmation && this.state.password != "") {

            sesion.peticion_cambio_contrasena(this.state.email).then(
                response => {
                    this.setState({
                        token: response.data.token
                    })
                    sesion.cambio_contraseña(this.state).then(response => {
                        
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Cambio exitoso.',
                            showConfirmButton: false,
                            timer: 2000
                        })

                    }
                    )
                }
            )
        }
        else {
            Swal.fire({
                icon: 'error',
                title: 'Datos incorrectos...',
                text: 'Las contraseñas tienen que ser iguales y no vacías.',
                timer:2000
            })
        }
    }

    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value //el state y la forma de className tienen que ser ifuales
        });
    }

    render() {
        return (
            <div className={classes.pages}>
                <SidebarComponent></SidebarComponent>

                <h3>Cambio de contraseña</h3>
                <div className="contenido">
                    <Grid container>
                        <Grid item xs={6}>
                            <h4>Nombre:</h4>
                        </Grid>
                        <Grid item xs={6}>
                            <h4>{this.state.name}</h4>
                        </Grid>
                    </Grid>
                    <Grid container>
                        <Grid item xs={6}>
                            <h4>Codigo: </h4>
                        </Grid>
                        <Grid item xs={6}>
                            <h4>{this.state.code}</h4>
                        </Grid>
                    </Grid>
                    <h4>Digite la contraseña actual</h4>

                    <TextField
                        id="outlined-password-input"
                        label="Actual"
                        type="password"
                        autoComplete="current-password"
                    />
                    <h4>Digite la nueva contraseña</h4>

                    <TextField
                        id="password"
                        name="password"
                        label="Nueva"
                        type="password"
                        autoComplete="current-password"
                        onChange={this.handleChange}
                    />
                    <h4>Repita la contraseña</h4>

                    <TextField
                        id="password_confirmation"
                        name="password_confirmation"
                        label="Repetir nueva"
                        type="password"
                        autoComplete="current-password"
                        onChange={this.handleChange}
                    />
                    <br />
                    <br />
                    <Button variant="contained" size="large" color="success" onClick={this.cambiarContrasena}>
                        Realizar cambio
                    </Button>
                    <br />
                    <br />
                </div>
            </div>
        );
    }
}

export default CambiarContraseña;