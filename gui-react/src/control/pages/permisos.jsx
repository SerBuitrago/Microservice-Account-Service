import { Component } from "react";
import SidebarComponent from '../SidebarComponent.jsx'
import { DataGrid } from '@mui/x-data-grid';
import ListarPermisos from "./listarPermisos.jsx";
import classes from "../../css/pages.module.css"


class permisos extends Component {

    constructor(props) {
        super(props);

        }
    render() {
        return (
            <div className={classes.pages}>
                <SidebarComponent></SidebarComponent>
                <ListarPermisos></ListarPermisos>
            </div>
        );
    }
}

export default permisos;