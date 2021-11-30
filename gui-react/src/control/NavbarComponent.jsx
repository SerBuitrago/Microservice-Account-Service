import { Component } from "react";
import classes from '../css/control.module.css'

class NavbarComponent extends Component{
    render(){
        return(
            <nav className={classes.navbar}>

                <img src="https://ww2.ufps.edu.co/public/imagenes/template/header/logo_ufps.png" alt=""/>

                <h3>Sistema de gestión de cuentas</h3>

            </nav>
        );
    }
}

export default NavbarComponent;
