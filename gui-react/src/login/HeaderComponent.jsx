import { Component } from "react";
import {Grid} from '@material-ui/core'
import '../css/header.css';


const HeaderComponent = (props) =>  {

    
        return (
            <div className="headerComponent">
                <Grid container>
                    <Grid onClick={()=>props.login()} item xs={6} className="acceder">
                        <h3> Acceder </h3>
                    </Grid>
                    <Grid onClick={()=>props.registro()} item xs={6} className="registro">
                        <h3> Registro </h3>
                    </Grid>
                </Grid>
                
                
            </div>
        )

}


export default HeaderComponent;