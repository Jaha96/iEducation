/**
 * Created by n0m4dz on 4/16/16.
 */
import React, {Component} from 'react'
import {Link} from 'react-router'

class SideBar extends Component {
    render() {
        return (
            <div>
                <div id="leftSide">
                    <nav className="leftNav scrollable">
                        <ul>
                            <li className="active">
                                <Link to="/">
                                    <span className="navIcon icon-screen-desktop"></span>
                                    <span className="navLabel">Самбар</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/content">
                                    <span className="navIcon icon-envelope"></span>
                                    <span className="navLabel">И-мэйл</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/content">
                                    <span className="navIcon icon-control-play"></span>
                                    <span className="navLabel">Медиа</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/content">
                                    <span className="navIcon icon-plus"></span>
                                    <span className="navLabel">Контент</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="/user">
                                    <span className="navIcon icon-user"></span>
                                    <span className="navLabel">Хэрэглэгч</span>
                                </Link>
                            </li>

                            <li className="divider"></li>

                            <li>
                                <Link to="/txg">
                                    <span className="navIcon icon-map"></span>
                                    <span className="navLabel">ТХГ модуль</span>
                                </Link>
                            </li>
                        </ul>
                    </nav>

                    <div className="sidebar-bottom">
                        <ul>
                            <li className="divider"></li>
                            <li>
                                <Link to="/settings" title="тохиргоо">
                                    <span className="navIcon icon-settings"></span>
                                    <span className="navLabel">Тохиргоо</span>
                                </Link>
                            </li>
                            <li>
                                <Link to="help" title="тусламж">
                                    <span className="navIcon icon-info"></span>
                                    <span className="navLabel">Тусламж</span>
                                </Link>
                            </li>
                            <li className="divider"></li>
                            <li className="power">
                                <a href="/logout" title="гарах">
                                    <span className="navIcon icon-power"></span>
                                    <span className="navLabel">Гарах</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="closeLeftSide"></div>
            </div>
        )
    }
}

export default SideBar