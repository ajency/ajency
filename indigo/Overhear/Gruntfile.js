
   module.exports = function(grunt) {
         grunt.initConfig({

             less: {
              production: {
                     options: {
                         paths: ["assets/css"],
                         cleancss: true
                     },
                     files: {
                        "dist/home.css": "./less/homepage.less",
                        "dist/artist-home.css": "./less/artist-homepage.less",
                         "dist/main.css": "./less/commen.less",
                         "dist/signup.css": "./less/signup.less",
                         "dist/createproject.css": "./less/createproject.less",
                         "dist/provider-single.css": "./less/provider-single.less",
                         "dist/faq.css": "./less/faq.less",
                         "dist/blog.css": "./less/blog.less",
                         "dist/inbox.css": "./less/inbox.less",
                     },
                 }
             }
         });
         grunt.loadNpmTasks('grunt-contrib-less');
         grunt.loadNpmTasks('grunt-contrib-watch');
         grunt.registerTask('default', ['less']);
     };