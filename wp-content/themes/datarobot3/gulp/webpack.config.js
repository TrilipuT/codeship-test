var failPlugin = require('webpack-fail-plugin');
const isExitOnError = process.env.BUILD_NOEXIT && process.env.BUILD_NOEXIT == '1';
var plugins = [];

if (!isExitOnError) {
    plugins.push(failPlugin);
}
console.log(isExitOnError);

module.exports = {
    output: {
        path: require("path").resolve("../assets/built/javascripts"),
        filename: 'common.js',
        sourceMapFilename: "common.js.map",
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