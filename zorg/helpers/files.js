const fs = require('fs')

// TODO make it sturdy, catch errors, etc.
const createDir = function(dir) {
  return new Promise((resolve, reject) => {
    fs.mkdir(dir, { recursive: true }, (err) => {
      if (err) reject(err)
      resolve(dir)
    })
  })
}

const writeFile = function(dir, contents) {
  return new Promise((resolve, reject) => {
    fs.writeFile(dir, contents, (err) => {
      if (err) reject(err)
      resolve({ dir, contents })
    })
  })
}

const write = function(destination, fileName, contents, verbose = false ) {
  return createDir( destination )
    .then(() => writeFile(`${destination}/${fileName}`, contents) )
}

module.exports = {
  createDir,
  writeFile,
  write
}
