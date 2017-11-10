const webpack = require("webpack");
const failPlugin = require('webpack-fail-plugin');
const isExitOnError = process.env.BUILD_NOEXIT && process.env.BUILD_NOEXIT == '1';

var plugins = [new webpack.optimize.UglifyJsPlugin({
    output: {
        comments: false,
        semicolons: true
    },
    minimize: true,
    sourceMap: true,
    compress: {
        warnings: false
    }
})];
if (!isExitOnError) {
    plugins.push(failPlugin);
}

module.exports = {
    output: {
        path: require("path").resolve("assets/built/javascripts"),
        filename: 'common.min.js',
        sourceMapFilename: "common.min.js.map"
    },
    externals: {
        jquery: "jQuery"
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel',
                query: {
                    presets: ['es2015']
                }
            }
        ]
    },
    plugins: plugins,
    devtool: 'source-map'
};