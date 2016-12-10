/**
 * Created by n0m4dz on 4/20/16.
 */
import React, {Component} from 'react'

//importing dumps
import Header from '../../components/user/Header'

class User extends Component {
    render() {
        return (
            <div id="contentWrapper">
                <div className="innerWrapper">
                    <Header />
                    <div>
                        <iframe src="/user/user" frameborder="0" width="100%" scrolling="no" style={{border:0}} height="1000"></iframe>
                    </div>
                </div>
            </div>
        )
    }
}

export default User