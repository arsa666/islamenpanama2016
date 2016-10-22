'use strict';

module.exports = function(grunt){
    grunt.initConfig({
        pkg     : grunt.file.readJSON('package.json'),
        banner  : '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
                  '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>',
        uglify  : {
            js: {
                src : [
                    'www/scripts/jquery.js',
                    'www/scripts/demo.js',
                    'www/scripts/custom.js',
                    'www/scripts/plugins.js'
                ],
                dest: 'www/app.js'
            }
        },
        compress: {
            main: {
                options: {
                    mode: 'gzip'
                },
                expand : false,
                files  : [
                    {src: ['www/app.js'], dest: 'www/app.js.gz'}
                ]
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'www/libs.css': ['www/styles/*.css'
                    ]
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Default task(s).
    grunt.registerTask('default', ['uglify', 'compress', 'cssmin']);
};