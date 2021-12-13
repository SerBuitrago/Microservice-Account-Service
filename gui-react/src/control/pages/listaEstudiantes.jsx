
import { DataGrid } from '@mui/x-data-grid';
import { Component } from 'react';
import api_students from "../../api/student.js";
import tokenAuth from "../../api/tokenAuth.js";

import algoritmos from "../../tools/algoritmos.js"

class ListaEstudiantes extends Component {

  constructor(props) {
    super(props);
    this.state = {
      rows: [],
      columns: [
        { field: 'code', headerName: 'CODIGO', width: 100 },
        { field: 'name', headerName: 'Nombres', width: 130 },
        { field: 'last_name', headerName: 'Apellidos', width: 130 },
        { field: 'created_at', headerName: 'Creado', width: 130 },
        { field: 'phone', headerName: 'Telefono', width: 130 },
        { field: 'semester', headerName: 'Semestre', width: 130 },
        { field: 'university_career', headerName: 'Programa', width: 130 },
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
          width: 250
        },
        { field: 'update_at', headerName: 'Ultima vez', width: 130 },
      ]
    }
  }

  componentDidMount(){
    this.data()
    
}

  data() {
    let aux = []
    let a
    let token = algoritmos.obtenerToken(tokenAuth.getItem())
    console.log(token)
    api_students.get_students(token[1]).then(response => {

      /* this.setState({
        rows: response.data.data
      }); */

      let borde = response.data.data.length

      for (let index = 0; index < borde; index++) {
        a = {
          id: response.data.data[index].code,
          address: response.data.data[index].address,
          age: response.data.data[index].age,
          code: response.data.data[index].code,
          created_at: response.data.data[index].created_at,
          email: response.data.data[index].email,
          last_name: response.data.data[index].last_name,
          name: response.data.data[index].name,
          phone: response.data.data[index].phone,
          semester: response.data.data[index].semester,
          university_career: response.data.data[index].university_career,
          updated_at: response.data.data[index].updated_at
        }
        aux.push(a)
        console.log(response.data.data)
        console.log(borde)
      }

      this.setState({
        rows: aux
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
        <DataGrid
          rows={this.state.rows}
          columns={this.state.columns}
          pageSize={5}
          rowsPerPageOptions={[5]}
          checkboxSelection
        />
      </div>
    );
  }
}

export default ListaEstudiantes
