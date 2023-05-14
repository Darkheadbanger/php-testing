// Generated using webpack-cli https://github.com/webpack/webpack-cli

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const HtmlWebpackPlugin = require("html-webpack-plugin");

const isProduction = process.env.NODE_ENV == "production";

const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

const stylesHandler = isProduction
  ? MiniCssExtractPlugin.loader
  : "style-loader";

const config = {
  entry: "./src/index.js",
  output: {
    filename: "bundle.js",
    path: path.resolve(__dirname, "dist"),
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/i,
        loader: "babel-loader",
      },
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
      {
        test: /\.s[ac]ss$/i,
        use: ["style-loader", "css-loader", "sass-loader"],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|svg|jpg|jpeg|gif))$/i,
        type: "asset/resource",
        generator: {
          // If you want to keep the same file name
          // filename: 'assets/images/[name][ext]',
          filename: "assets/images/[name].[contenthash][ext]",
          publicPath: "/",
        },
      },
      // Add your rules for custom modules here
      // Learn more about loaders from https://webpack.js.org/loaders/
    ],
  },
  plugins: [
    // Add your plugins here
    // Learn more about plugins from https://webpack.js.org/configuration/plugins/
  ],
};

module.exports = () => {
  if (isProduction) {
    config.mode = "production";

    config.plugins.push(new MiniCssExtractPlugin());
  } else {
    config.mode = "development";
  }
  config.plugins.push(
    new BrowserSyncPlugin({
      server: {
        baseDir: "./dist",
      },
      port: 3000,
      files: ["./dist/index.php"], // Indiquez les fichiers PHP à surveiller
      reloadDelay: 0,
      open: true,
    }),
    new HtmlWebpackPlugin({
      template: "./index.php",
      filename: "index.php",
      inject: "body",
    })
  );
  return config;
};

// files: