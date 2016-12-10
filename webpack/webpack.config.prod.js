/**
 * Created by n0m4dz on 3/23/16.
 */
require('babel-register');
var webpack = require('webpack')
var WebpackStrip = require('strip-loader');
var config = require('./webpack.config.dev');

var stripLoader = {
    test: [/\.js$/, /\.es6$/],
    exclude: config.EXCLUDE_DIR,
    loader: WebpackStrip.loader('console.log')
};

config.default.module.loaders.push(stripLoader);

config.default.plugins.push(
    new webpack.BannerPlugin("************************************\n Created by Tseegii Tselmeg \n************************************\n"),
    new webpack.optimize.DedupePlugin(), //deduplicate output files
    new webpack.optimize.UglifyJsPlugin({
        minimize: true,
        compress: {
            warnings: false
        }
    }),
    new webpack.optimize.OccurenceOrderPlugin(), //Optimize imports
    new webpack.optimize.AggressiveMergingPlugin()
);

module.exports = config;
