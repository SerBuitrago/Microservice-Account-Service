import { Component } from "react";
import {Grid} from '@material-ui/core'
import '../css/header.css';


class HeaderComponent extends Component {

    render() {
        return (
            <div className="headerComponent">
                <Grid container>
                    <Grid item xs={6} className="acceder">
                        <h3> Acceder </h3>
                    </Grid>
                    <Grid item xs={6} className="registro">
                        <h3> Registro </h3>
                    </Grid>
                </Grid>
                
                
            </div>
        )
    }
}


export default HeaderComponent;