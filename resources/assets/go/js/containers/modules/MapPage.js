/**
 * Created by n0m4dz on 4/16/16.
 */
import React, {Component} from 'react'

//import dump components
import PaperMap from '../../components/map/PaperMap'
import Panel from '../../components/map/Panel'

class MapPage extends Component {
    constructor() {
        super();
    }

    componentDidMount() {

    }

    render() {
        return (
            <div>
                <div id="wrapper">
                    <div id="mapView" className="maximized">
                        <PaperMap />
                    </div>
                    <a id="togglePanel" className="closed" href="javascript:void(0)">
                        <i className="fa fa-bars"></i>
                    </a>
                    <Panel />
                    <div className="clearfix"></div>
                </div>
            </div>
        )
    }
}
export default MapPage