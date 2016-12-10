
/**
 * Created by n0m4dz on 4/17/16.
 */
import React, {Component} from 'react'

class Gallery extends Component {
    render() {
        return (
            <div className="pointWrapper" id="pointSet">
                <iframe src="/txg/gallery" frameborder="0" width="100%"  style={{border:0}} height="100%"></iframe>
            </div>
        )
    }
}

export default Gallery