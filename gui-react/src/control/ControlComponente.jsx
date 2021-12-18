import { Component } from "react";
import { Routes, Route, BrowserRouter as Router } from "react-router-dom";

import SidebarComponent from "./SidebarComponent";
import Students from "./pages/students"
import classes from '../css/control.module.css';
import Permisos from "./pages/permisos.jsx";
import MasterComponent from "../login/MasterComponent.jsx";

class ControlComponent extends Component {

    render() {
        return (
            <SidebarComponent></SidebarComponent>            
        );
    }
}

export default ControlComponent;