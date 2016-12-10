/**
 * Created by n0m4dz on 4/16/16.
 */
import React, {Component} from 'react'

class Panel extends Component {
    render() {
        return (
            <div id="content" className="minimized">
                <div className="filter">
                    <h1 className="osLight">Харагдац тохируулах</h1>
                    <a href="#" className="handleFilter">
                        <span className="icon-equalizer"></span>
                    </a>
                    <div className="clearfix"></div>

                </div>

                <div className="resultsList">
                    <div className="row">
                        <div className="col-sm-12">
                            <input type="text" className="form-control" placeholder="Хайх утгаа оруулна уу"/>
                        </div>
                        <hr />

                        <div className="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div className="list-group" id="accordion">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Panel