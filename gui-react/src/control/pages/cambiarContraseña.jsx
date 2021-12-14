import { Component } from "react";
import SidebarComponent from "../SidebarComponent.jsx";
import classes from "../../css/pages.module.css"
import { Button, TextField } from "@mui/material";
import sesion from "../../api/sesion.js";
import algoritmos from "../../tools/algoritmos.js";

class CambiarContraseña extends Component {

    constructor(props){
        super(props); 
        this.state ={
            name:"",
            code:"",
            email:"",
            password:"",
            password_confirmation:"",
            token:""
        }
        this.handleChange = this.handleChange.bind(this);
        this.cambiarContrasena = this.cambiarContrasena.bind(this);
    }

    componentDidMount(){
        this.data()
    }

    data(){
        let code = algoritmos.obtenerCode()
        let token = algoritmos.obtenerToken()
        sesion.get_sesion(code,token).then( response => {
            this.setState({
                name:response.data.message[0].name,
                email:response.data.message[0].email,
                api_token:token,
                code:code
            })
        }        )
    }

    cambiarContrasena(){
        if (this.state.password === this.state.password_confirmation) {
            console.log("entra", )
           sesion.cambio_contrasena(this.state)
        }
        else{
            alert("Contraseñas diferentes")
        }
    }

    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value //el state y la forma de className tienen que ser ifuales
        });
        console.log(this.state) 
    }

    render() {
        return (
            <div className={classes.pages}>
                <SidebarComponent></SidebarComponent>

                <h3>Cambio de contraseña</h3>
                <div>
                    <h4>Nombre:</h4>
                    <h4>{ this.state.name}</h4>
                    <br />
                    <h4>Codigo: </h4>
                    <h4>{this.state.code }</h4>

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

                    <Button variant="contained" size="large" color="success" onClick={this.cambiarContrasena}>
                        Realizar cambio
                    </Button>
                </div>
            </div>
        );
    }
}

export default CambiarContraseña;