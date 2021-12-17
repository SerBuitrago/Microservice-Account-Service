import { Component } from "react";
import SidebarComponent from '../SidebarComponent.jsx'
import { DataGrid } from '@mui/x-data-grid';

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
            <div className="permisos">
                <SidebarComponent></SidebarComponent>
                <div style={{ height: 550, width: '70%', paddingTop: '7%'}}>
                    <DataGrid
                        rows={this.state.rows}
                        columns={this.state.columns}
                        pageSize={8}
                        rowsPerPageOptions={[8]}
                        checkboxSelection
                    />
                </div>
            </div>
        );
    }
}

export default permisos;