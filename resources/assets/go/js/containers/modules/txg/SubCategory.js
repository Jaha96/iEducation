/**
 * Created by n0m4dz on 5/2/16.
 */
import React, {Component} from 'react'


class SubCategory extends Component {

    constructor() {
        super();
    }

    render() {
        return (
            <div className="pointWrapper" id="pointSet">
                <iframe src="/system/subcategory" frameborder="0" width="100%" scrolling="no" style={{border:0}} height="1000"></iframe>
            </div>
        )
    }
}

export default SubCategory