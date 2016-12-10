/**
 * Created by n0m4dz on 5/3/16.
 */
import React, {Component} from 'react'

class Txg extends Component {
    render() {
        return (
            <div id="contentWrapper">
                { this.props.children }
            </div>
        )
    }
}

export default Txg