const webpack = require("webpack");
const path = require("path");

module.exports = {
	entry: {
		index: "./src/saligtaran-index.js",
		permalink: "./src/saligtaran-permalink.js"
	},
	output: {
		path: path.resolve(__dirname, "./dist"),
		filename: "[name].js"
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				loader: "babel-loader",
				exclude: /node_modules/
			}
		]
	},
	plugins: [
		new webpack.optimize.ModuleConcatenationPlugin(),
		new webpack.optimize.UglifyJsPlugin({
			sourceMap: true,
			compress: {
				warnings: false
			}
		}),
		new webpack.LoaderOptionsPlugin({
			minimize: true
		}),
	]
};
