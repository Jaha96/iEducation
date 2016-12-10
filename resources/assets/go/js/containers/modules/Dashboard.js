/**
 * Created by n0m4dz on 4/17/16.
 */
import '../../components/dashboard/dashboard.scss'

import React, {Component} from 'react'

//import dumbs
import Header from '../../components/dashboard/Header'
import GoTab from '../../components/dashboard/GoTab'
import RightPanel from '../../components/dashboard/RightPanel'

class Dashboard extends Component {
    render() {
        return (
            <div id="contentWrapper">
                <div className="innerWrapper-250">
                    <Header />

                    <div className="card" id="analytics" style={{ margin: 20}}></div>
                </div>
                <div className="rightPanel">
                    <RightPanel />
                </div>
            </div>
        )
    }
}

export default Dashboard