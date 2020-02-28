import React, { Component } from 'react';
import ReactDOM from 'react-dom';
/**
 * Importamos componentes
 */
import TransferForm from './TransferForm';
import TransferList from './TransferList';

export class Example extends Component{

    // Creamos el constructor
    constructor(props){
        super(props)
        // definimos el state
        this.state = {
            money:0.0,
            transfers: [],
            error: null
        }
    }

    async componentDidMount(){
        try {
            // hacemos la peticion por get
            let res = await fetch('http://127.0.0.1:8000/api/wallet')
            // almacenamos la respeusta en data
            let data = await res.json()
            // actualizamos el state
            this.setState({
                money: data.money,
                transfers: data.transfers
            })
            console.log(this.state);
        } catch (error) {
            
        }
    }

    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12-m-t-md">
                        {/* mostramos el valos del state en money */}
                        <p className="title"> $ {this.state.money} </p>
                    </div>
                    <div className="col-md-12">
                        <TransferForm/>
                    </div>
                </div>
                <div className="m-t-md">
                    {/* le pasamos props al componente */}
                    <TransferList transfers={this.state.transfers}/>
                </div>
            </div>
        );
    }
}
/**
 * Si en la vista existe un elemento con id example
 * rendeara el componente.
 */
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
