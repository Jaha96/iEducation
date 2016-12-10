/**
 * Created by n0m4dz on 4/20/16.
 */
import React, {Component} from 'react'

class Header extends Component {
    render() {
        return (
            <header className="innerHeader">
                <h1>Гишүүдийн модуль</h1>
                <div className="headerTitle">
                    Админ: Цээгий Цэлмэг
                </div>
                {/*
                <button className="headerBtn">
                    +
                </button>
                */}
            </header>
        )
    }
}

export default Header