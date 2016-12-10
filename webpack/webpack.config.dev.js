/**
 * Created by n0m4dz on 3/23/16.
 */
/**
 * Importing dependencies
 */
import * as polyfill from 'babel-polyfill'
import Path from 'path'
import yargs from 'yargs'
import printMessage from 'print-message'
import webpack from 'webpack'
import precss from 'precss'
import autoprefixer from 'autoprefixer'
import ExtractTextPlugin from 'extract-text-webpack-plugin'


import plugins from './webpack.plugins'

const CONTEXT_DIR = Path.resolve(__dirname, '../resources/assets')
const PATH_DIR = Path.resolve(__dirname, '../public')
const SASS_DIR = Path.resolve(__dirname, '../resources/assets/go/sass')
const NODE_DIR = Path.resolve(__dirname, '../node_modules')
const EXCLUDE_DIR = [/(node_modules|tests)/]

//Environment with yargs
const argv = yargs.boolean("p").alias("p", "optimize-minimize").boolean("h").alias("h", "hot").argv
process.env.NODE_ENV = JSON.stringify(argv.p ? "production" : "development")

if (argv.p) printMessage(['Production mode'])
if (argv.h) printMessage(['Development mode && Hot module enabled'])

export default{
    cache: !argv.p,
    debug: !argv.p,
    devtool: !argv.p ? 'source-map' : false,
    context: CONTEXT_DIR,
    entry: {
        vendor: ['./go/js/vendor'],
        go: !argv.p ? [
            'babel-polyfill',
            './go/js/root',
            'webpack/hot/only-dev-server',
            'webpack-dev-server/client?http://localhost:3000/'
        ] : ['babel-polyfill', './go/js/root']
    },
    output: {
        path: PATH_DIR,
        filename: 'js/[name].js',
        chunkFilename: 'js/[name].[hash].js',
        publicPath: !argv.p ? 'http://localhost:3000/' : '../'
    },

    stats: {
        colors: true,
        reasons: !argv.p
    },
    plugins: plugins,

    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: EXCLUDE_DIR,
            },
            {
                test: /(\.js)$/,
                loader: "eslint-loader",
                exclude: EXCLUDE_DIR
            },

            //STYLESHEET
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract('style-loader', 'css-loader')
            },
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('style-loader', 'css-loader!postcss-loader!sass-loader')
            },

            // IMAGES
            {
                test: /\.png($|\?)|\.jpg($|\?)|\.gif($|\?)|\.bmp($|\?)|\.svg($|\?)/,
                loader: 'url-loader?limit=10000&name=images/[name].[ext]'
            },

            // FONTS
            {
                test: /\.woff($|\?)|\.woff2($|\?)|\.ttf($|\?)|\.eot($|\?)|\.svg($|\?)/,
                loader: 'url-loader?limit=10000&name=fonts/[name].[ext]'
            }
        ]
    },
    postcss: function () {
        return [precss, autoprefixer];
    },
    sassLoader: {
        includePaths: SASS_DIR
    },
    resolve: {
        root: [PATH_DIR],
        alias: {},
        extensions: ['', '.js', '.scss', '.css', '.html']
    }
}