/**
 * Created by n0m4dz on 4/16/16.
 */
import React, {Component} from 'react'

//import dump components
import Header from '../components/partials/Header'
import Sidebar from '../components/partials/Sidebar'

class Master extends Component {
    constructor() {
        super();
    }

    componentDidMount() {

    }

    render() {
        return (
            <div>
                <div id="wrapper">
                    { this.props.children }
                </div>
            </div>
        )
    }
}
export default Master