import { Component } from "react";
import SidebarComponent from '../SidebarComponent.jsx'
import { DataGrid } from '@mui/x-data-grid';
import ListarPermisos from "./listarPermisos.jsx";
import classes from "../../css/pages.module.css"


class permisos extends Component {

    constructor(props) {
        super(props);

        this.state = {
            rows: [],
            columns: [
                { field: 'id', headerName: 'ID', width: 70 },
                { field: 'name', headerName: 'Nombre', width: 130 },
                { field: 'guard_name', headerName: 'Guardia', width: 130 },
                { field: 'created_at', headerName: 'Creado', width: 250 },
                { field: 'updated_at', headerName: 'Ult. Modificacion', width: 250 },

            ]
        }
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