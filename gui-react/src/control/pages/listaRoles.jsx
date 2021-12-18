import { ButtonGroup } from '@mui/material';
import Button from '@mui/material/Button';
import { DataGrid } from '@mui/x-data-grid';
import { Component } from 'react';
import Swal from 'sweetalert2';
import api_rol from "../../api/rol.js";
import tokenAuth from "../../api/tokenAuth.js"
import algoritmos from '../../tools/algoritmos.js';




class ListarRoles extends Component {
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
        {
          field: 'accion', headerName: 'Acciones', width: 250,
          renderCell: (params) => (
           
            <ButtonGroup variant="contained" aria-label="outlined button group">
              <Button color="error"  onClick={ () => this.eliminarRol(params.value)}>Eliminar</Button>
              <Button color="primary" disabled={true} onClick={ () => this.editar(params.value)}>Editar</Button>
            </ButtonGroup>
              
          )
        }

      ]
    }
  }

  componentDidMount() {
    this.data()
  }

  data() {
    let a
    let aux = []

    api_rol.get_lista_roles(algoritmos.obtenerToken()).then(
      response => {
        for (let index = 0; index < response.data.message.length; index++) {
          a = {
            id: response.data.message[index].id,
            name: response.data.message[index].name,
            guard_name: response.data.message[index].guard_name,
            created_at: response.data.message[index].created_at,
            updated_at: response.data.message[index].updated_at,
            accion: response.data.message[index].id
          };
          aux.push(a)
          
        }
        this.setState({
          rows: aux
        })
      }
    )
  }

  eliminarRol = (index) => {
    let api_token = algoritmos.obtenerToken( tokenAuth.getItem())
    let json = {
      api_token
    }
    
    
    api_rol.delete_rol(index, api_token).then(response => {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Rol elimado correctamente',
        showConfirmButton: false,
        timer: 2000
    })
    this.componentDidMount()
    }).catch(error => {
      Swal.fire({
        icon: 'error',
        title: 'Algo salió mal...',
        text: 'vuelva a intentar.',
    })
    })
  }

  render() {
    return (
      <div style={{ height: 550, width: '100%' }}>
        <DataGrid
          rows={this.state.rows}
          columns={this.state.columns}
          pageSize={8}
          rowsPerPageOptions={[8]}
          renderCell
        />
      </div>
    );
  }
}

export default ListarRoles;