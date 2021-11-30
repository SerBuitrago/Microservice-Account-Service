import api_students from "../../api/student.js";

const student = () => {

    const veamosPuesQueHace = () => {
        console.log(api_students.get_students())
    
    }
    return(
        <div className="student">

            <h3>Hola soy estudiante</h3>
            <button onClick= {() => veamosPuesQueHace()}> </button>
           
        </div>
    );
}

export default student;