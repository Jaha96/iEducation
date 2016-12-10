
/**
 * Created by n0m4dz on 4/17/16.
 */
import React, {Component} from 'react'

class Setting extends Component {
    render() {
        return (
            <div id="contentWrapper">
                { this.props.children }
            </div>
        )
    }
}

export default Setting