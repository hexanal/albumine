const chokidar = require('chokidar')
const chalk = require('chalk')

const compileJS = require('./compilers/javascript')
const compileSass = require('./compilers/sass')
const compileAssets = require('./compilers/assets')

const addWatcher = function({ glob, type, callback }) {
  const watcher = chokidar.watch(glob, {
    ignored: /(^|[\/\\])\../, // ignore dotfiles
    persistent: true
  })

  return watcher
    .on('ready', () => console.log( chalk.yellow(`[watch] [${type}]`)) )
    .on('change', path => {
      console.log( chalk.yellow(`[watch] [${type}] ${path}`) )
      callback()
    })
}

const watchJavascript = function() {
  addWatcher({
    glob: [
      './src/js/**/*.js'
    ],
    type: 'js',
    callback: compileJS
  })
}

const watchSass = function() {
  addWatcher({
    glob: [
      './src/**/*.scss' // anywhere there's scss!!
    ],
    type: 'sass',
    callback: compileSass
  })
}

const watchAssets = function() {
  addWatcher({
    glob: [
      './src/assets/**/*'
    ],
    type: 'assets',
    callback: compileAssets
  })
}


/**
 * ... now watch everything
 */
watchJavascript()
watchSass()
watchAssets()
