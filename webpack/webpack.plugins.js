/**
 * Created by n0m4dz on 4/13/16.
 */
import yargs from 'yargs'
import webpack from 'webpack'
import ExtractTextPlugin from 'extract-text-webpack-plugin'

let argv = yargs.boolean("p").alias("p", "optimize-minimize").boolean("h").alias("h", "hot").argv
process.env.NODE_ENV = JSON.stringify(argv.p ? "production" : "development")

var plugins = []

plugins = [
    ...plugins,
    new webpack.DefinePlugin({
        "process.env.NODE_ENV": process.env.NODE_ENV,  // This has effect on the react lib size in production mode
        "__DEV__": !argv.p
    }),
    new ExtractTextPlugin('css/[name].css', {
        allChunks: true
    }),
    new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: "jquery",
        "window.jQuery": "jquery"
    }),
    new webpack.optimize.CommonsChunkPlugin({
        name: 'vendor',
        chunks: ['vendor'],
        filename: 'js/vendor.js',
        minChunks: Infinity
    })
]

//if hot module
if (argv.h) {
    plugins.push(new webpack.HotModuleReplacementPlugin()) //HMR
    plugins.push(new webpack.NoErrorsPlugin()) //doesn't accept any error
}

//console.log(plugins)
export default plugins