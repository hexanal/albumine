const compileJS = require('./compilers/javascript')
const compileSass = require('./compilers/sass')
const compileAssets = require('./compilers/assets')

compileJS()
compileSass()
compileAssets()
