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
                <div className={classes.controlComponent}>

                    <Routes>
                        <Route path="/" component={ControlComponent} > </Route>
                        <Route path="/Students" element={<Students />} ></Route>
                        <Route path="/Permisos" element={<Permisos />} ></Route>
                    </Routes>
                    <SidebarComponent></SidebarComponent>
                </div>
            </Router>
        );
    }
}

export default ControlComponent;