import api_students from "../../api/student.js";
import { DataGrid } from '@mui/x-data-grid';
import classes from "../../css/pages.module.css"
import ListaEstudiantes from "../pages/listaEstudiantes.jsx"
import SidebarComponent from"../SidebarComponent.jsx"

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

    return (
        <div className={classes.pages}>
            <h3>Lista de estudiantes</h3>
            <SidebarComponent></SidebarComponent>
            <ListaEstudiantes></ListaEstudiantes>


        </div>
    );
}

export default student;