const mix = require('laravel-mix');


// const CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');
//     var webpackConfig = {
//         plugins: [
//             new CaseSensitivePathsPlugin()
//         ]
//     }

// mix.webpackConfig( webpackConfig );

// mix.override(config => {
//     config.modules.rules.push({
//         test: /\.s(c|a)ss$/,
//         use: [
//           'vue-style-loader',
//           'css-loader',
//           {
//             loader: 'sass-loader',
//             // Requires sass-loader@^7.0.0
//             options: {
//               implementation: require('sass'),
//               indentedSyntax: true // optional
//             },
//             // Requires >= sass-loader@^8.0.0
//             options: {
//               implementation: require('sass'),
//               sassOptions: {
//                 indentedSyntax: true // optional
//               },
//             },
//           },
//         ],
//     })
// })

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
    
    //.sass('resources/sass/app.scss', 'public/css2');
// const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')

// module.exports = {
//   plugins: [
//     new VuetifyLoaderPlugin()
//   ],
// }
    

module.exports = {
  module: {
    rules: [
      { 
        test: /\.s(c|a)ss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          {
            loader: 'sass-loader',
            // Requires sass-loader@^7.0.0
            options: {
              implementation: require('sass'),
              indentedSyntax: true // optional
            },
            // Requires >= sass-loader@^8.0.0
            options: {
              implementation: require('sass'),
              sassOptions: {
                indentedSyntax: true // optional
              },
            },
          },
        ],
      },
    ],
  }
}
