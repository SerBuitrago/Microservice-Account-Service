import { Routes, Route , BrowserRouter as Router } from "react-router-dom";
import logo from './logo.svg';
import FooterComponent from './tools/FooterComponent.jsx';
import '../src/css/App.css';
import { Component } from 'react';

import ControlComponent from './control/ControlComponente';



import Students from "./control/pages/students"
/* import classes from './css/'; */
import Permisos from "./control/pages/permisos.jsx";
import MasterComponent from "./login/MasterComponent";
import AgregarRol from "./control/pages/agregarRol";
import Roles from "./control/pages/roles";
import VincularRol from "./control/pages/vincularRol";
import AsignarPermisos from "./control/pages/asignarPermisos"
import CambiarContrasena from "./control/pages/cambiarContraseña";
import RecuperarContraseña from "./control/pages/recuperarContraseña";
import AgregarPermiso from "./control/pages/agregarPermiso";


class App extends Component {

  constructor(props){
      super(props);
      this.state = {
      }

  }

  render() {
    return (

      <div className="app">
        <Router>
          <Routes>
            <Route path="/" element={<MasterComponent></MasterComponent>} > </Route>
            <Route path="/dash" element={<ControlComponent></ControlComponent>} > </Route>
            <Route path="/students" element={<Students></Students>} ></Route>
            <Route path="/lista_roles" element={<Roles></Roles>} ></Route>
            <Route path="/permisos" element={<Permisos></Permisos>} ></Route>
            <Route path="/rol" element={<AgregarRol></AgregarRol>} ></Route>
            <Route path="/agregar_permiso" element={<AgregarPermiso></AgregarPermiso>} ></Route>
            <Route path="/cambiar_contrasena" element={<CambiarContrasena></CambiarContrasena>} ></Route>
            <Route path="/recuperar_contrasena" element={<RecuperarContraseña></RecuperarContraseña>} ></Route>
            <Route path="/vincular_rol" element={<VincularRol></VincularRol>} ></Route>
            <Route path="/asignar_permiso" element={<AsignarPermisos></AsignarPermisos>} ></Route>
          </Routes>
        </Router>
          {/*  <MasterComponent></MasterComponent> */}
          {/* <FooterComponent></FooterComponent> */}
      </div>

    );
  }
}

export default App;
