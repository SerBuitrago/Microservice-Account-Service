import { Component } from "react";

import ListaRoles  from "./listaRoles.jsx";
import SidebarComponent from "../SidebarComponent.jsx";

import classes from "../../css/pages.module.css"


class Roles extends Component {

    constructor(props) {
        super(props);
        this.state = {

        }
    }

    render() {
        return (
            <div className={classes.pages}>

                <h3>Lista de roles</h3>
                <SidebarComponent></SidebarComponent>
                <ListaRoles></ListaRoles>

            </div>
        );
    }

}


export default Roles;