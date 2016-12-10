/**
 * Created by n0m4dz on 5/2/16.
 */
/**
 * Created by n0m4dz on 4/17/16.
 */
import './tempo.scss'

import React, {Component} from 'react'
import {Link} from 'react-router'


class Dashboard extends Component {

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
                        <h1>Удирдлагын хэсэг</h1>
                        <div className="dashTitle">
                            ТХГ Админ
                        </div>
                    </header>
                    <div className="dashboard">
                        <div className="row dash-section">
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/profile" className="card">
                                    <i className="icon-user-following"></i>
                                    <span> Хувийн тохиргоо </span>
                                </Link>
                            </div>
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/members" className="card">
                                    <i className="icon-share"></i>
                                    <span> Гишүүнчлэл </span>
                                </Link>
                            </div>
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/map" className="card">
                                    <i className="icon-location-pin"></i>
                                    <span> Газарзүйн модуль </span>
                                </Link>
                            </div>
                        </div>

                        <div className="row dash-section">
                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/content/profile" className="card">
                                    <i className="icon-directions"></i>
                                    <span> Газрын мэдээлэл </span>
                                </Link>
                            </div>

                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/content" className="card">
                                    <i className="icon-globe"></i>
                                    <span> Мэдээ мэдээлэл </span>
                                </Link>
                            </div>

                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/gallery" className="card">
                                    <i className="icon-picture"></i>
                                    <span> Зургийн цомог </span>
                                </Link>
                            </div>

                            <div className="dashItem col-sm-6 col-md-3 col-lg-2">
                                <Link to="/txg/banner" className="card">
                                    <i className="icon-mustache"></i>
                                    <span> Баннер </span>
                                </Link>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        )
    }
}

export default Dashboard