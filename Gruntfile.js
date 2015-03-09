'use strict';

// ZIP requires using node's `path` module
var path = require('path');

// GIT OBJECT
// El objeto GitObj contiene la informacion del ultimo tagname del repo git.
function GitObj( lastTag ) {
  this.lastTag = lastTag;
}

module.exports = function (grunt) {
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    var config = {};

    config['exec'] = {
      
      test: {
        cmd: "git describe --abbrev=0",

        stdout: false,
        stderr: false,
        
        callback: function (error, stdout, stderr) {
          // recupera la salida del shell y lo guarda en el GitObj
          // Como el stdout contiene una nueva linea se la elimina del string
          GitObj = new GitObj ( stdout.replace( /\r?\n|\r/g, "" ) );
          
          //grunt.log.write( 'Current GIT TAG: ' + GitObj.lastTag );
          //grunt.log.write( 'stderr: ' + stderr );
        
          if (error !== null) {
            grunt.log.error('exec error: ' + error);
          }
        }
      },
      
    }

    // CONFIG GRUNT-XMLPOKE
    config['xmlpoke'] = {
      updateVersion: {
        options: {
          xpath: '/version',
          value: GitObj.lastTag
        },
        files: {
          'dest/etd.xml': 'src/etd.xml'
        },
      }
    }

    // Config para contrib-compress
    config['compress'] = {
      main: {
        options: {
          archive: function () {
            // The global value GitObj.lastTag is set by another task
            return 'distZip/com_etd-' + GitObj.lastTag + '.zip';
          }
        },
        // La configuracion siguiente es:
        // cwd: 'src/' -> esto indica que todos los archivos son relativos a ese directorio y por lo tanto
        // no se debe agregar dichi directorio al archivo comrpimido
        // src: ['**/*'] -> busca todos los archivos y todos los subdirectorios
        // dest: -> no se agrego porque lo que hace es crear un directorio raiz dentro del archivo comprimido con ese nombre
        // Para agregar el directorio de destino se lo hace en options: { archive: 'distZip/<nombre-archivo>.zip' }
        files: [
          {expand: true, cwd: 'src/', src: ['**/*']}
        ]
      }
    }
    

    grunt.initConfig(config);

    var tasks = [ 'exec', ,'xmlpoke', 'compress' ];

    grunt.registerTask('build', tasks);
};
