const getFilenameFromPath = function( filepath ) {
  const route = filepath
    .replace('./content/', '')
    .split('/')
  const filename = route[route.length - 1]

  return filename
}

const pipe = fns => x => fns.reduce((v, f) => f(v), x)

module.exports = {
  getFilenameFromPath,
  getItemByURL,
  pipe
}
