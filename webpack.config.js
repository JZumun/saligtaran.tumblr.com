const webpack = require("webpack");
const path = require("path");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const extractCSS = new ExtractTextPlugin({ filename: "saligtaran.css" });

module.exports = {
  entry: {
    index: "./src/index.js",
    permalink: "./src/permalink.js"
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
      },
      {
        test: /\.css$/,
        use: extractCSS.extract({
          // Instance 1
          fallback: "style-loader",
          use: ["css-loader"]
        })
      },
      {
        test: /\.styl(us)?$/,
        use: extractCSS.extract({
          use: ["css-loader", "stylus-loader"],
          fallback: "style-loader"
        })
      }
    ]
  },
  plugins: [
    extractCSS,
    new webpack.optimize.ModuleConcatenationPlugin(),
    new webpack.optimize.UglifyJsPlugin({
      sourceMap: true,
      compress: {
        warnings: false
      }
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: true
    })
  ]
};
