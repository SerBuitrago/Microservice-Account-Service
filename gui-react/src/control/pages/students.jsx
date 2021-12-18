
import classes from "../../css/pages.module.css"
import ListaEstudiantes from "../pages/listaEstudiantes.jsx"
import SidebarComponent from"../SidebarComponent.jsx"

const student = () => {

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
            <SidebarComponent></SidebarComponent>
            <h3>Lista de estudiantes</h3>
            <ListaEstudiantes></ListaEstudiantes>


        </div>
    );
}

export default student;