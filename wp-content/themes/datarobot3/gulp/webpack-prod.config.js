const webpack = require("webpack");
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
	plugins: [
		new webpack.optimize.UglifyJsPlugin({
            output: {
                comments: false,
                semicolons: true,
            },
			minimize: true,
            sourceMap: true,
			compress: {
		    	warnings: false
		    }
		})
	],
    devtool: 'source-map'
};