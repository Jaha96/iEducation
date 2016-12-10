/**
 * Created by n0m4dz on 4/17/16.
 */
import React, {Component} from 'react'
import ReactDOM from 'react-dom'

class Panel extends Component {

    constructor(){
        super();
        this.state = {
            isOpen: false,
            width: 0
        }
    }

    render() {
        this.state.isOpen = this.props.open;
        if(this.state.isOpen) this.state.width = this.props.width;
        return (
            <div id="panel" style={{width: this.state.width + 'px', right: this.state.isOpen ? 0 : '-'+this.state.width + 'px'}}>
                <h3>It is panel content</h3>
            </div>
        )
    }
}

export default Panel