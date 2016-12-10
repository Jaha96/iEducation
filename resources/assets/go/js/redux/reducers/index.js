/**
 * Created by n0m4dz on 4/17/16.
 */
import {combineReducers} from 'redux'
import UserReducer from './UserReducer'

const RootReducer = combineReducers({
    user: UserReducer
})

export default RootReducer

