import logo from './logo.svg';
import FooterComponent from './tools/FooterComponent.jsx';
import '../src/css/App.css';
import React from 'react';
import { Component } from 'react';

import MasterComponentLogin from './login/MasterComponent';
import ControlComponent from './control/ControlComponente';

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
       {/*  <MasterComponentLogin></MasterComponentLogin>
 */}
         <ControlComponent></ControlComponent>


        <FooterComponent></FooterComponent>
      </div>
    );
  }
}

export default App;
