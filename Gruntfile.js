'use strict';

module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
          '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>',
        uglify: {
            js: {
                src: [
                    'www/scripts/*.js',
                ],
                dest: 'www/app.js'
            }
        },
        compress: {
            main: {
                options: {
                    mode: 'gzip'
                },
                expand: false,
                files: [
                    {src: ['www/app.js'], dest: 'www/app.js.gz'}
                ]
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compress');



    // Default task(s).
    grunt.registerTask('default', ['uglify', 'compress']);
};