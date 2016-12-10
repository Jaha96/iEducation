/**
 * Created by n0m4dz on 5/2/16.
 */
/**
 * Created by n0m4dz on 4/17/16.
 */
import './tempo.scss'

import React, {Component} from 'react'
import {Link} from 'react-router'


class Settings extends Component {

    constructor() {
        super();
    }

    componentDidMount() {

    }

    render() {
        return (
            <div id="contentWrapper">
                <div className="innerWrapper">
                    <header className="innerHeader">
                        <h1>Ангилал удирлагын хэсэг</h1>
                        <div className="dashTitle">
                            ТХГ Админ: Tseegii Tselmeg
                        </div>
                    </header>
                    <div className="dashboard">
                        <div className="row dash-section">
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/settings/category" className="card">
                                    <i className="icon-list"></i>
                                    <span> Сайтын ерөнхий мэдээлэл </span>
                                </Link>
                            </div>

                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/settings/category" className="card">
                                    <i className="icon-list"></i>
                                    <span> Үндсэн ангилал </span>
                                </Link>
                            </div>
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/settings/subcategory" className="card">
                                    <i className="icon-share"></i>
                                    <span> Дэд ангилал </span>
                                </Link>
                            </div>
                        </div>

                        <div className="row dash-section">
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/settings/language" className="card">
                                    <i className="icon-flag"></i>
                                    <span> Хэл </span>
                                </Link>
                            </div>
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/settings/translation" className="card">
                                    <i className="icon-globe"></i>
                                    <span> Орчуулга </span>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Settings