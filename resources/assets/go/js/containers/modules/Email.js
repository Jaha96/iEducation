/**
 * Created by n0m4dz on 4/17/16.
 */
import React, {Component} from 'react'

//import dumbs
import Panel from '../../components/partials/Panel'

class Email extends Component {

    constructor() {
        super();
        this.state = {
            panel: {
                open: false,
                width: 700,
                component: 'email'
            }
        }
    }

    togglePanel(e) {
        this.setState({
            panel: {...this.state.panel, open: !this.state.panel.open}
        });
    }

    render() {
        return (
            <div>
                <div id="mailWrapper" style={{right: this.state.panel.open ? this.state.panel.width + 'px' : 0}}>
                    <h1>Email Page here</h1>

                    <Panel open={this.state.panel.open} width={this.state.panel.width}
                           component={this.state.panel.component}/>
                    <a id="togglePanel" onClick={this.togglePanel.bind(this)} href="javascript:void(0)">
                        <i className="icon-menu"></i>
                    </a>
                </div>
            </div>
        )
    }
}

export default Email