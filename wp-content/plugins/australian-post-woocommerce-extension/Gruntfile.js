module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    wp_deploy: {
      deploy: {
          options: {
              plugin_slug: 'australian-post-woocommerce-extension',
              svn_user: 'waseem_senjer',
              build_dir: 'build', //relative path to your build directory,
              plugin_main_file: 'australian-post.php',
          },
      },
    },
  });
  grunt.loadNpmTasks('grunt-wp-deploy');

  grunt.registerTask('default', ['wp_deploy']);


};
