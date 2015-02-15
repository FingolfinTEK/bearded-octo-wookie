module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bower_concat: {
            all: {
                dest: 'build/bower.js',
                cssDest: 'build/bower.css'
            }
        },
        uglify: {
            my_target: {
                files: {
                    'build/bower.min.js': ['build/bower.js']
                }
            }
        },
        cssmin: {
            //options: {
            //    shorthandCompacting: false,
            //    roundingPrecision: -1
            //},
            target: {
                files: {
                    'build/bower.min.css': ['build/bower.css']
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-bower-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Default task(s).
    grunt.registerTask('default', ['bower_concat', 'uglify', 'cssmin']);

};
