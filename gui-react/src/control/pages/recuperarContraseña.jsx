import { Component } from "react";
import SidebarComponent from "../SidebarComponent.jsx";


class RecuperarContraseña extends Component{

    constructor(props){
        super(props);
        this.state = {

        }
    }

    render(){
        return(
            <div className="">
                <SidebarComponent></SidebarComponent>
            </div>
        );
    }
}

export default RecuperarContraseña;