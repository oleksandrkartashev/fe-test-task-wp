const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const env = process.env.NODE_ENV;

module.exports = {
  entry: "./src/js/index.js",

  mode: env,

  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "./js/[name].min.js",
    pathinfo: false,
    clean: true,
  },

  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: "babel-loader",
      },
      {
        test: /\.(scss|css)$/i,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
      },
      {
        test: /.(ttf|otf|eot|woff(2)?)(\?[a-z0-9]+)?$/,
        type: 'asset/resource',
      },
      {
        test: /\.(png|jpg|jpeg|gif|svg)$/,
        type: 'asset/resource',
        generator: {
          filename: 'images/[name][hash][ext][query]',
        },
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      chunkFilename: "[id].min.css",
      filename: "./css/[name].min.css",
    }),
  ],
};
