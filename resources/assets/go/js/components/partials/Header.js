/**
 * Created by n0m4dz on 4/16/16.
 */

import React, {Component} from 'react'

class Header extends Component {

    constructor() {
        super();
    }

    render() {
        return (
            <div id="header">
                <div className="logo">
                    <a href="/">
                        <strong><img src="/images/small-logo.png" height="48" style={{marginTop:-6}}/></strong>
                        <span className="logoText"><img src="/images/small-logo.png" height="48" style={{marginTop:-6}}/> ТХГ</span>
                    </a>
                </div>

                <a href="javascript:void(0)" className="navHandler">
                    <span className="fa fa-bars"></span>
                </a>
                <div className="search">
                    <span className="searchIcon icon-magnifier"></span>
                    <input type="text" placeholder="Хайх утгаа оруулна уу"/>
                </div>
                <div className="headerUserWraper">

                    <a href="#" className="headerUser dropdown-toggle" data-toggle="dropdown">
                        <img className="avatar headerAvatar pull-left" src="/images/avatar-1.png" alt="avatar"/>
                        <div className="userTop pull-left">
                            <span className="headerUserName">Админ</span>
                            <span className="fa fa-angle-down"></span>
                        </div>
                        <div className="clearfix"></div>
                    </a>

                    <div className="dropdown-menu pull-right userMenu" role="menu">
                        <div className="mobAvatar">
                            <img className="avatar mobAvatarImg" src="/images/avatar-1.png" alt="avatar"/>
                            <div className="mobAvatarName">Админ</div>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <span className="icon-settings"></span>
                                    Үндсэн тохиргоо
                                </a>
                            </li>
                            <li>
                                <a href="#/settings">
                                    <span className="icon-user"></span>
                                    Хувийн тохиргоо
                                </a>
                            </li>
                            <li className="divider"></li>
                            <li><a href="/logout"><span className="icon-power"></span>Гарах</a></li>
                        </ul>
                    </div>
                </div>
                {/*<div className="headerNotifyWraper">
                    <a href="javascript:void(0)" className="headerNotify dropdown-toggle" data-toggle="dropdown">
                        <span className="notifyIcon icon-bell"></span>
                        <span className="counter">5</span>
                    </a>
                    <div className="dropdown-menu pull-right notifyMenu" role="menu">
                        <div className="notifyHeader">
                            <span>Notifications</span>
                            <a href="#" className="notifySettings icon-settings"></a>
                            <div className="clearfix"></div>
                        </div>
                        <ul className="notifyList">
                            <li>
                                <a href="#">
                                    <img className="avatar pull-left" src="/images/avatar-1.png" alt="avatar"/>
                                    <div className="pulse border-grey"></div>
                                    <div className="notify pull-left">
                                        <div className="notifyName">Sed ut perspiciatis unde</div>
                                        <div className="notifyTime">5 minutes ago</div>
                                    </div>
                                    <div className="clearfix"></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div className="notifyRound notifyRound-red fa fa-envelope-o"></div>
                                    <div className="pulse border-red"></div>
                                    <div className="notify pull-left">
                                        <div className="notifyName">Lorem Ipsum is simply dummy text</div>
                                        <div className="notifyTime">20 minutes ago</div>
                                    </div>
                                    <div className="clearfix"></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div className="notifyRound notifyRound-yellow fa fa-heart-o"></div>
                                    <div className="pulse border-yellow"></div>
                                    <div className="notify pull-left">
                                        <div className="notifyName">It is a long established fact</div>
                                        <div className="notifyTime">2 hours ago</div>
                                    </div>
                                    <div className="clearfix"></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div className="notifyRound notifyRound-magenta fa fa-paper-plane-o"></div>
                                    <div className="pulse border-magenta"></div>
                                    <div className="notify pull-left">
                                        <div className="notifyName">There are many variations</div>
                                        <div className="notifyTime">1 day ago</div>
                                    </div>
                                    <div className="clearfix"></div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" className="notifyAll">See All</a>
                    </div>
                </div>*/}
                <a href="javascript:void(0)" className="mapHandler"><span className="icon-map"></span></a>
                <div className="clearfix"></div>
            </div>
        )
    }
}

export default Header