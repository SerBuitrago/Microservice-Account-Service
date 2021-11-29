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
                {/* <LoginComponent></LoginComponent>
        <RegistroComponent></RegistroComponent> */ }

                <HeaderComponent></HeaderComponent>
                {this.state.formularioLogin === true ? <LoginComponent></LoginComponent> : <RegistroComponent></RegistroComponent>}
                <button onClick={this.cambioDeFormulario}> Cambio </button>

                <br />
                

            </div>
        );
    }

}

export default MasterComponent;