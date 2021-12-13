import { DataGrid } from '@mui/x-data-grid';
import { Component } from 'react';
import api_students from "../../api/student.js";
import tokenAuth from "../../api/tokenAuth.js"


class ListarRoles extends Component {
    constructor(props){
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
}