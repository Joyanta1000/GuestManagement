module.exports = function(grunt) {

    grunt.initConfig({
      pkg: grunt.file.readJSON('package.json'),
      sass: {                              // Task
        dist: {                            // Target
          files: {                         // Dictionary of files
            'stylesheets/main.css': 'scss/main.scss',       // 'destination': 'source'
          }
        }
      },
      watch: {
        scripts: {
          files: ['**/*.scss'],
          tasks: ['sass'],
        },
      },
    });
  
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
  
    grunt.registerTask('default', ['sass']);
  
  };