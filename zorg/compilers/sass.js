/**
 * Scss Shit
 */
const sass = require('sass')
const chalk = require('chalk')
const { write } = require('../helpers/files')

module.exports = function() {
  const compiledCSS = sass.renderSync({
    file: './src/scss/styles.scss',
    outputStyle: 'compressed',
    sourceMap: process.env === 'development',
    outFile: './dist/styles.css'
  })

  const cssTimeElapsed = compiledCSS.stats.duration / 1000

  return write('./dist', 'styles.css', compiledCSS.css)
    .then( () => {
      console.log( chalk.magenta(`[build] [sass] built css (in ${cssTimeElapsed} seconds)`) )
    })
}
