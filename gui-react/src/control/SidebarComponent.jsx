import { Button, ListItem } from "@material-ui/core";
import { Component } from "react";
import { Link } from 'react-router-dom';
import classes from '../css/control.module.css';



class SidebarComponent extends Component {



    render() {
        return (
            <div className={classes.sidebar}>

                <ListItem component="nav">
                    <Button variant="contained" color="error" >
                        Cuentas
                    </Button>

                    <Link to="/">
                        <Button variant="contained" color="success" >
                            Cuentas
                        </Button>
                    </Link>


                    <Link to="/usuarios">
                        <Button variant="contained" color="success" >
                            Usuarios
                        </Button>
                    </Link>



                    <Link to="/permisos">
                        <Button variant="contained" color="success" >
                            Permisos
                        </Button>
                    </Link>

                </ListItem>

              

            </div>
        );
    }
}

export default SidebarComponent;