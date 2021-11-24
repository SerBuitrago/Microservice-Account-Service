import LoginComponent from './LoginComponent.jsx';
import HeaderComponent from './HeaderComponent.jsx';
import RegistroComponent from './RegistroComponent.jsx';
import { Component } from "react";

class MasterComponent extends Component {

    constructor(props) {
        super(props)

        this.state = {
            'formularioLogin': false
        }

        this.cambioDeFormulario = this.cambioDeFormulario.bind(this);

    }

    cambioDeFormulario() {
        console.log("entra")
        this.setState((prevState, prevProps) => {
            return { 'formularioLogin': !prevState.formularioLogin }
        });
        console.log(this.state) 
    }


    render() {
        return (
            <div className="masterComponentLogin">

                <HeaderComponent></HeaderComponent>
                {/* <LoginComponent></LoginComponent>
        <RegistroComponent></RegistroComponent> */ }
                {this.state.formularioLogin === true ? <LoginComponent></LoginComponent> : <RegistroComponent></RegistroComponent>}

                <br />
                
                <button onClick={this.cambioDeFormulario}> Cambio </button>

            </div>
        );
    }

}

export default MasterComponent;