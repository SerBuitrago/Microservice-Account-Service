import { DataGrid } from '@mui/x-data-grid';
import { Component } from 'react';
import api_rol from "../../api/rol.js";
import tokenAuth from "../../api/tokenAuth.js"
import algoritmos from '../../tools/algoritmos.js';



class ListarPermisos extends Component {
    constructor(props){
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

    componentDidMount(){
      this.data()
    }

    data(){
      console.log(algoritmos.obtenerToken())
      api_rol.get_lista_roles(algoritmos.obtenerToken()).then(
      response => {
        this.setState({
          rows:response.data.message
        })
      }
      )
    }

    render(){
      return (
        <div style={{height: 550, width: '100%'}}>
        <DataGrid
          rows={this.state.rows}
          columns={this.state.columns}
          pageSize={8}
          rowsPerPageOptions={[8]}
          checkboxSelection
        />
      </div>
      );
    }
}

export default ListarPermisos;