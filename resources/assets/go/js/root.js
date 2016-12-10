/**
 * Created by n0m4dz on 4/8/16.
 */
if (module.hot) {
    module.hot.accept();
}

import '../sass/app.scss'

import React, {Component} from 'react'
import {render} from 'react-dom'
import { Router, hashHistory } from 'react-router'
import routes from './containers/routes'
import {Provider} from 'react-redux'
import configureStore from './redux/store'
import initialState from './redux/init'

let store = configureStore(initialState)

render(
    <Provider store={store}>
        <Router history={hashHistory} routes={routes}/>
    </Provider>,
    document.getElementById('root')
)