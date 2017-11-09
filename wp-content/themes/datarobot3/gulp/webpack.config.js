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
	devtool: 'source-map'
};