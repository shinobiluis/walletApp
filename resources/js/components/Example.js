import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-12-m-t-md">
                    <p className="title"> $ 1000 </p>
                </div>
                <div className="col-md-12">
                <form className="form-inline justify-content-center">
                    <div className="form-goup mb-2">
                        <input 
                            type="text"
                            className="form-control"
                            placeholder="Description"
                            name="description"
                        />
                    </div>
                    <div className="input-group ms-sm-2 mb-2">
                        <div className="input-group-prepend">
                            <div className="input-group-text">$</div>
                        </div>
                        <input 
                            type="text"
                            className="form-control"
                            name="amount"
                        />
                    </div>
                    <button
                        type="submit"
                        className="btn btn-primary mb-2"
                    >
                        Add
                    </button>
                    
                </form>
                </div>
            </div>
            <div className="m-t-md">
                <table className="table">
                    <tbody>
                        <tr>
                            <td>Ejemplo</td>
                            <td>1200.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    );
}

export default Example;
/**
 * Si en la vista existe un elemento con id example
 * rendeara el componente.
 */
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
