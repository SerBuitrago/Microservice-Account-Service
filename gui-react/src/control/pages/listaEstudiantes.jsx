
import { DataGrid } from '@mui/x-data-grid';
import { Component } from 'react';
import api_students from "../../api/student.js";

class ListaEstudiantes extends Component {

  constructor(props) {
    super(props);
    this.state = {
      rows: [],
      columns: [
        { field: 'code', headerName: 'co', width: 130 },
        { field: 'id', headerName: 'ID', width: 130 },
        { field: 'name', headerName: 'First name', width: 130 },
        { field: 'last_name', headerName: 'Last name', width: 130 },
        { field: 'created_at', headerName: 'Creado', width: 130 },
        { field: 'phone', headerName: 'Phone', width: 130 },
        { field: 'semester', headerName: 'First name', width: 130 },
        { field: 'university_career', headerName: 'Last name', width: 130 },
        { field: 'update_at', headerName: 'First name', width: 130 },
        {
          field: 'age',
          headerName: 'Age',
          type: 'number',
          width: 90,
        },
        {
          field: 'email',
          headerName: 'Full email',
          description: 'This column has a value getter and is not sortable.',
          sortable: false,
          width: 160
        },
      ]
    }
  }


  data() {
    let aux = []
    let a
    api_students.get_students().then(response => {

      /* this.setState({
        rows: response.data.data
      }); */
      console.log(response.data.data)

      for (let index = 0; index < response.data.data.length; index++) {
        a = {
          id: response.data.data[index].code,
          code: response.data.data[index].code,
          name: response.data.data[index].name,
          last_name: response.data.data[index].last_name,
          email: response.data.data[index].email,
          phone: response.data.data[index].phone,
          age: response.data.data[index].age

        }
        aux.push(a)
      }

      this.setState({
        rows : aux
      })
      console.log(a)
      console.log(aux)
    });

    /* this.setState({
      rows: aux
    }) */


  }


  render() {

    return (

      <div style={{ height: 400, width: '100%' }}>
        <button onClick={() => this.data()}>Actualizar</button>
        <DataGrid
          rows={this.state.rows}
          columns={this.state.columns}
          pageSize={5}
          rowsPerPageOptions={[5]}
          checkboxSelection
        />

        {this.state.rows.length == 1 ? <button></button> : <input></input>}
      </div>
    );
  }
}

export default ListaEstudiantes
