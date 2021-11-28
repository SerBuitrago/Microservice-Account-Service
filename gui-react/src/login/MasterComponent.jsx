import LoginComponent from './LoginComponent.jsx';
import HeaderComponent from './HeaderComponent.jsx';
import RegistroComponent from './RegistroComponent.jsx';
import { Component } from "react";

class MasterComponent extends Component {

    constructor(props) {
        super(props)

        this.state = {
            'formularioLogin': true
        }

/*         this.cambioDeFormulario = this.cambioDeFormulario.bind(this); */

    }

    cambioDeFormularioLogin=() => {
        console.log()
        this.setState(() => {
            return { 'formularioLogin': true }
        });
        console.log(this.state) 
    }

    cambioDeFormularioRegistro=() => {
        console.log()
        this.setState(() => {
            return { 'formularioLogin': false }
        });
        console.log(this.state) 
    }


    render() {
        return (
            <div className="masterComponentLogin">

                <HeaderComponent className="headerComponent" key={1} login={()=>this.cambioDeFormularioLogin()} registro={()=>this.cambioDeFormularioRegistro()}></HeaderComponent>
                {/* <LoginComponent></LoginComponent>
        <RegistroComponent></RegistroComponent> */ }
                {this.state.formularioLogin === true ? <LoginComponent></LoginComponent> : <RegistroComponent></RegistroComponent>}

                <br />
                
                

            </div>
        );
    }

}

export default MasterComponent;