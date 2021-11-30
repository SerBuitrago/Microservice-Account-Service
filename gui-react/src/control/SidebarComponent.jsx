import { Component } from "react";
import {Link} from 'react-router-dom';
import classes from '../css/control.module.css';

class SidebarComponent extends Component{
    render(){
        return(
            <div className={classes.sidebar}>
            
                <ul>
                    <li>
                        <Link to="/"> Cuentas </Link>
                    </li>
                    <li>
                        <Link to="/usuarios"> Usuarios </Link>
                    </li>
                    <li>
                        <Link to="/permisos"> Permisos </Link>
                    </li>
                </ul>

            </div>
        );
    }
}

export default SidebarComponent;