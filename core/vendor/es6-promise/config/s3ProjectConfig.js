/*
 * Using wildcard because es6-promise does not currently have a
 * channel system in place.
 */
module.exports = function(revision,tag,date){
  return {
    'es6-promise.js':
      { contentType: 'text/javascript',
        destinations: {
          wildcard: [
            'es6-promise-latest.js',
            'es6-promise-' + revision + '.js'
          ]
        }
      },
    'es6-promise.min.js':
      { contentType: 'text/javascript',
        destinations: {
          wildcard: [
            'es6-promise-latest.min.js',
            'es6-promise-' + revision + '.min.js'
          ]
        }
      }
  }
}
