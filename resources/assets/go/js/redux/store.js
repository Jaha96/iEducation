/**
 * Created by n0m4dz on 4/17/16.
 */

import {applyMiddleware, compose, createStore} from 'redux'
import rootReducer from './reducers/index'
import logger from 'redux-logger'
import thunk from 'redux-thunk'

let middleCreateStore = compose(
    applyMiddleware(thunk, logger())
)(createStore)

export default function configureStore(initialState  = {todos: [], user:{}}){
    return middleCreateStore(rootReducer, initialState)
}