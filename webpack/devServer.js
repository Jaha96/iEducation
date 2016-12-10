/**
 * Created by n0m4dz on 3/23/16.
 */
/**
 * Import dependencies
 */
import webpack from 'webpack'
import WebpackDevServer from 'webpack-dev-server'
import config from './webpack.config.dev'
const compiler = webpack(config)

new WebpackDevServer(compiler, {
    contentBase: config.output.publicPath,
    hot: true,
    historyApiFallback: true,
    headers: {"Access-Control-Allow-Origin": "*"}
}).listen(3000, 'localhost', (err) => {
    if (err) console.log(err)
    console.log('Running at localhost:3000')
});

