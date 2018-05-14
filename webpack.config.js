const path = require("path");
const UglifyJSPlugin = require("uglifyjs-webpack-plugin");

// variable d'environnement permettant de définir si l'on est en dev ou prod
const dev = process.env.NODE_ENV === "dev";

// extraction du css en assets
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const ManifestPlugin = require("webpack-manifest-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const webpack = require("webpack");
const HtmlWebpackPlugin = require("html-webpack-plugin");

// config css
let cssLoaders = [
  { loader: "css-loader", options: { importLoaders: 1, minimize: !dev } }
];

// on enregistre la config dans une variable pour pouvoir la modifier si besoin
let config = {
  // point d'entrée
  entry: {
    // servira de nommage pour le css
    // par défaut main.css
    app: ["./src/assets/js/app.js", "./src/assets/scss/style.scss"]
  },

  // fichier de sortie
  output: {
    // absolute path !!
    path: path.resolve("./dist"),
    // récupère le nom donné en entrée, par défaut bundle.js
    // @TODO : mettre en place une fonction php qui mappera les hash à leur source
    // via le manifest
    // filename: dev ? "[name].js" : "[name].[chunkhash].js",
    filename: "[name].js"
    //publicPath: "dist/"
  },

  resolve: {
    alias: {
      "@css": path.resolve("./src/assets/scss/"),
      "@js": path.resolve("./src/assets/js/"),
      "@img": path.resolve("./src/assets/images/")
    }
  },

  // lance le watch uniquement en mode dev
  watch: dev,

  // loaders
  module: {
    rules: [
      {
        enforce: "pre",
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        loader: "eslint-loader",
        options: {
          fix: true
        }
      },
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: ["babel-loader"]
      },
      {
        test: /\.css$/,
        exclude: /(node_modules|bower_components)/,
        // loader de droite chargé en premier !!
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: cssLoaders
        })
      },
      {
        test: /\.scss$/,
        exclude: /(node_modules|bower_components)/,
        // loader de droite chargé en premier !!
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: [...cssLoaders, "sass-loader"]
        })
      },
      {
        test: /\.(woff2?|eot|ttf|otf|wav)(\?.*)?$/,
        loader: "file-loader",
        options: {
          publicPath: "./"
        }
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]"
            }
          },
          {
            loader: "img-loader",
            options: {
              enabled: !dev
            }
          }
        ]
      }
    ]
  },

  // plugins
  plugins: [
    new ExtractTextPlugin({
      // filename: dev ? "[name].css" : "[name].[contenthash:8].css",
      filename: "[name].css",
      disable: dev
    }),
    new HtmlWebpackPlugin()
  ],

  // devtools : source map
  // premier cas, uniquement en mode dev
  //  devtool: dev ? "cheap-module-eval-source-map" : false
  // deuxième cas : en mode dev & prod, à combiner avec l'option sourceMap du module uglify
  // sinon il vire les commentaires du source-map
  devtool: dev ? "cheap-module-eval-source-map" : "source-map",
  devServer: {
    // affiche les erreurs en overlay dans le navigateur
    overlay: true
    // contentBase: path.resolve('./dist')
  }
};

// prod : minification
if (!dev) {
  config.plugins.push(
    ...[
      new UglifyJSPlugin({
        // si l'on veut les source map en prod
        sourceMap: true
      }),
      new ManifestPlugin(),
      new CleanWebpackPlugin(["dist"], {
        root: path.resolve("./"),
        verbose: true,
        dry: false
      })
    ]
  );

  cssLoaders.push({
    loader: "postcss-loader",
    options: {
      plugins: loader => [
        require("autoprefixer")({
          // options telles que les navigateurs à supporter
        })
      ]
    }
  });
} else {
  config.plugins.push(
    ...[
      new webpack.HotModuleReplacementPlugin({
        // Options...
      })
    ]
  );
}

module.exports = config;
