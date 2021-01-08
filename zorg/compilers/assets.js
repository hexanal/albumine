/**
 * Assets shite
 */
const fse = require('fs-extra')
const chalk = require('chalk')

module.exports = function() {
  return fse.copy('./src/assets', './dist/assets')
    .then(() => {
      console.log( chalk.magenta(`[build] [assets] assets folder updated`) )
    })
    .catch(err => {
      console.log( chalk.red(`[error] [assets] Zorg fucked up the copying of the assets folder again!`) )
      console.error( err )
    })
}
