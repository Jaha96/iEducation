/**
 * Created by n0m4dz on 5/2/16.
 */
import React, {Component} from 'react'


class Member extends Component {

    constructor() {
        super();
    }

    render() {
        return (
            <div className="pointWrapper" id="pointSet">
                <iframe src="/txg/member" frameborder="0" width="100%" scrolling="no" style={{border:0}} height="100%"></iframe>
            </div>
        )
    }
}

export default Member