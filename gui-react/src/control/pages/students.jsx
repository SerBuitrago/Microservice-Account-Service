import api_students from "../../api/student.js";
import { DataGrid } from '@mui/x-data-grid';
import classes from "../../css/pages.module.css"
import ListaEstudiantes from "../pages/listaEstudiantes.jsx"

const student = () => {

    let data = null

    const columns = [
        { field: 'code', headerName: 'Codigo', width: 130 },
        { field: 'name', headerName: 'Nombre', width: 130 },
        { field: 'last_name', headerName: 'Apellido', width: 130 },
        {
            field: 'age',
            headerName: 'Años',
            type: 'number',
            width: 90,
        },
        {
            field: 'email',
            headerName: 'Correo',
            description: 'This column has a value getter and is not sortable.',
            sortable: false,
            width: 160,
        },
    ];

   
    const listaEstudiantes = () => {
        let a = api_students.get_students()
        a.then(response => {
            console.log(response.data.data)
            data = response.data.data
        })
        return (
            <div className="listaEstudiante">
                <div>
                    <div style={{ height: 400, width: '100%' }}>
                        <DataGrid
                            rows={data}
                            columns={columns}
                            pageSize={5}
                            rowsPerPageOptions={[5]}
                            checkboxSelection
                        />
                    </div>
                </div>
            </div>
        )
    }
    return (
        <div className="student">

            <h3>Hola soy estudiante</h3>
            {/* {listaEstudiantes()} */}
            <ListaEstudiantes></ListaEstudiantes>


        </div>
    );
}

export default student;