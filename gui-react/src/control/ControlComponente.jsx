import { Component } from "react";
import { Routes, Route, BrowserRouter as Router } from "react-router-dom";
import NavbarComponent from "./NavbarComponent";
import SidebarComponent from "./SidebarComponent";
import Students from "./pages/students"
import classes from '../css/control.module.css';
import LoginComponent from "../login/LoginComponent";
import Permisos from "./pages/permisos.jsx";

class ControlComponent extends Component {

    render() {
        return (
            <Router>
                <div className="controlComponent">

                    <NavbarComponent></NavbarComponent>
                    <div className="uno">
                        <SidebarComponent></SidebarComponent>
                    </div>

                    <Routes>
                        <Route path="/" exact={true} component={ControlComponent} > </Route>
                        <Route path="/usuarios" exact={true} element={<Students />} ></Route>
                        <Route path="/permisos" element={<Permisos />} ></Route>
                    </Routes>




                </div>
            </Router>
        );
    }
}

export default ControlComponent;