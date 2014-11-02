'use strict';

// ZIP requires using node's `path` module
var path = require('path');


module.exports = function (grunt) {
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    var config = {};

    config['zip'] = {
      'skip-files': {
        //
        router: function (filepath) {

          // Grab the extension
          var extname = path.extname(filepath);
          var dirname = path.dirname(filepath);
          var basename = path.basename(filepath);
          // SI NO ES un archivo temporal del gedit
          if ( extname.search(/~$/)===-1 ) {
            // Remueve el directorio raiz 'src'
            var archivo = filepath.replace(/^src\//i,"");
            return archivo;
          } else {
            // De otra manera, skip it
            console.log( "--excluding " + basename );
            return null;
          }
        },

        src: [ 'src/**/*' ],
        dest: 'distZip/com_etd.zip'
      }
    }

    grunt.initConfig(config);

    var tasks = [ 'zip' ];

    grunt.registerTask('build', tasks);
};
