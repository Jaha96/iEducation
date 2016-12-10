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
                    <a href="#" className="handleFilter"><span className="icon-equalizer"></span></a>
                    <div className="clearfix"></div>
                    <form className="filterForm">
                        <div className="row">
                            <div className="col-xs-12 col-sm-12 col-md-12 col-lg-12 formItem">
                                <div className="formField">
                                    <label>Төрөл</label>
                                    <a href="#" data-toggle="dropdown"
                                       className="btn btn-gray dropdown-btn dropdown-toggle propTypeSelect">
                                        <span className="dropdown-label">All</span>
                                        <span className="fa fa-angle-down dsArrow"></span>
                                    </a>
                                    <ul className="dropdown-menu dropdown-select full" role="menu">
                                        <li className="active">
                                            <input type="radio" name="pType" checked="checked"/>
                                            <a href="#">All</a>
                                        </li>
                                        <li><input type="radio" onChange="" name="pType"/><a href="#">Company A</a></li>
                                        <li><input type="radio" onChange="" name="pType"/><a href="#">Company B</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div className="row"></div>
                    //</form>
                </div>

                <div className="resultsList">
                    <div className="row">
                        <div className="col-sm-12">
                            <input type="text" className="form-control" placeholder="Хайх утгаа оруулна уу"/>
                        </div>
                        <hr />

                        <div className="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div className="list-group" id="accordion">
                                <div className="list-group-item">
                                    <a href="#ddPanel-1" className="collapsed list-header"
                                       data-toggle="collapse"
                                       data-parent="#accordion">
                                        <span className="fa fa-star text-blue"></span>
                                        Enkh
                                                <span className="pull-right info-badge">
                                                    <span className="badge">18 devices</span>
                                                    <span className="fa fa-angle-right arrow"></span>
                                                </span>
                                    </a>
                                    <div id="ddPanel-1" className="collapse" style="height: 0;">
                                        <ul className="device-list">
                                            <li>
                                                        <span className="lstatus">
                                                        <i className="fa fa-flag text-danger"></i>
                                                        </span>
                                                        <span className="lnumber">
                                                        22-64 УБА
                                                        </span>
                                                        <span className="ldate">
                                                        2016-03-08
                                                        </span>
                                            </li>
                                            <li>
                                                        <span className="lstatus">
                                                        <i className="fa fa-flag text-danger"></i>
                                                        </span>
                                                        <span className="lnumber">
                                                        22-64 УБА
                                                        </span>
                                                        <span className="ldate">
                                                        2016-03-08
                                                        </span>
                                            </li>
                                            <li>
                                                        <span className="lstatus">
                                                        <i className="fa fa-flag text-danger"></i>
                                                        </span>
                                                        <span className="lnumber">
                                                        22-64 УБА
                                                        </span>
                                                        <span className="ldate">
                                                        2016-03-08
                                                        </span>
                                            </li>
                                            <li>
                                                        <span className="lstatus">
                                                        <i className="fa fa-flag text-danger"></i>
                                                        </span>
                                                        <span className="lnumber">
                                                        22-64 УБА
                                                        </span>
                                                        <span className="ldate">
                                                        2016-03-08
                                                        </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Panel