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

class App extends Component {

  /* constructor(props){
      super(props);
      this.state = {
       formularioLogin: true
      }

  } */

  render() {
    return (

      <div className="app">
        <Router>
          <Routes>
            <Route path="/" element={<MasterComponent></MasterComponent>} > </Route>
            <Route path="/dash" element={<ControlComponent></ControlComponent>} > </Route>
            <Route path="/Students" element={<Students></Students>} ></Route>
            <Route path="/Permisos" element={<Permisos></Permisos>} ></Route>
          </Routes>
        </Router>
          {/*  <MasterComponent></MasterComponent> */}
          {/* <FooterComponent></FooterComponent> */}
      </div>

    );
  }
}

export default App;
