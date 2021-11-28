import { Component } from "react";
import {Grid} from '@material-ui/core'
import '../css/header.css';


const HeaderComponent = (props) =>  {

    
        return (
            <div className="headerComponent">
                <Grid container>
                    <Grid item xs={6} className="acceder">
                        <h3 onClick={()=>props.login()}> Acceder </h3>
                    </Grid>
                    <Grid item xs={6} className="registro">
                        <h3 onClick={()=>props.registro()}> Registro </h3>
                    </Grid>
                </Grid>
                
                
            </div>
        )

}


export default HeaderComponent;