/**
 * Created by n0m4dz on 4/12/16.
 */
import React from 'react'
import {Route, IndexRoute} from 'react-router'

import Header from '../components/partials/Header'
import Sidebar from '../components/partials/Sidebar'

import Master from './Master'

import MapPage from '../containers/modules/MapPage'
import Dashboard from '../containers/modules/Dashboard'
import Email from '../containers/modules/Email'
import Content from '../containers/modules/Content'
import Media from '../containers/modules/Media'
import User from '../containers/modules/User'

import Setting from '../containers/modules/Setting'

/**
 * Txg modules
 */
import Txg from '../containers/modules/Txg'
import TxgDashboard from '../containers/modules/txg/Dashboard'

import TxgCategory from '../containers/modules/txg/Category'
import TxgSubCategory from '../containers/modules/txg/SubCategory'
import Language from '../containers/modules/txg/Language'
import Translation from '../containers/modules/txg/Translation'

import TxgMember from '../containers/modules/txg/Member'
import TxgProfile from '../containers/modules/txg/Profile'
import TxgSettings from '../containers/modules/txg/Settings'
import TxgContent from '../containers/modules/txg/Content'
import TxgGallery from '../containers/modules/txg/Gallery'
import TxgProfileContent from '../containers/modules/txg/ProfileContent'

const router = (
    <Route path="/" component={Master}>
        <IndexRoute component={Dashboard}/>
        <Route path="dashboard" component={Dashboard}/>
        <Route path="email" component={Email}/>
        <Route path="content" component={Content}/>
        <Route path="media" component={Media}/>

        <Route path="user" component={User}/>

        <Route path="txg" component={Txg}>
            <IndexRoute component={TxgDashboard}/>
            <Route path="members" component={TxgMember}/>
            <Route path="profile" component={TxgProfile}/>
            <Route path="content" component={TxgContent}/>
            <Route path="content/profile" component={TxgProfileContent}/>
            <Route path="gallery" component={TxgGallery}/>
        </Route>

        <Route path="settings" component={Setting}>
            <IndexRoute component={TxgSettings}/>
            <Route path="category" component={TxgCategory}/>
            <Route path="subcategory" component={TxgSubCategory}/>
            <Route path="language" component={Language}/>
            <Route path="translation" component={Translation}/>
        </Route>
        <Route path="help" component={Setting}/>
    </Route>
)

export default router