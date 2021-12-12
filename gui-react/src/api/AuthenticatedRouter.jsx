import React, { Component } from 'react';
import { Navigate, Route } from 'react-router';
import tokenAuth from './tokenAuth';

class AuthenticatedRoute extends Component{
    render(){
        if (tokenAuth.getAuthenticated()) {
            return <Route {...this.props}></Route>
        }
        else{
            return <Navigate to="/login"></Navigate>
        }
    }
}
export default AuthenticatedRoute;