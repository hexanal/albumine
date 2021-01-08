/**
 * Javascript Shit
 */
const esbuild = require('esbuild')
const chalk = require('chalk')

module.exports = function() {
  const js = esbuild.buildSync({
    entryPoints: [
      './src/js/app.js'
    ],
    bundle: true,
    target: 'es2018',
    minify: process.env === 'production',
    sourcemap: process.env === 'development',
    outfile: './dist/app.js'
  })

  if (!js.warnings.length) {
    console.log( chalk.magenta(`[build] [js] built javascript file`) )
  }
}
