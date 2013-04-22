/**
 * grunt-wp-plugin
 * https://github.com/ericmann/grunt-wp-plugin
 *
 * Copyright (c) 2013 Eric Mann, 10up
 * Licensed under the MIT License
 */

'use strict';

// Basic template description
exports.description = 'Create a WordPress plugin.';

// Template-specific notes to be displayed before question prompts.
exports.notes = '';

// Template-specific notes to be displayed after the question prompts.
exports.after = '';

// Any existing file or directory matching this wildcard will cause a warning.
exports.warnOn = '*';

// The actual init template
exports.template = function( grunt, init, done ) {
	init.process( {}, [
		// Prompt for these values.
		init.prompt( 'name', 'WP Plugin' ),
		init.prompt( 'description', 'The best WordPress extension ever made!' ),
		init.prompt( 'homepage', 'http://wordpress.org/extend/plugins' ),
		init.prompt( 'author_name' ),
		init.prompt( 'author_email' ),
		init.prompt( 'author_url' )
	], function( err, props ) {
		props.keywords = [];
		props.devDependencies = {
			'grunt-contrib-concat': '~0.1.2',
			'grunt-contrib-uglify': '~0.1.1',
			'grunt-contrib-jshint': '~0.1.1',
			'grunt-contrib-nodeunit': '~0.1.2',
			'grunt-contrib-watch': '~0.2.0',
			"grunt-contrib-sass"  : "~0.2.2",
			"grunt-contrib-less"  : "~0.5.0",
		};
		
		// Get the capitalized version of the plugin safe name for PHP constants
		props.js_safe_name_caps = props.js_safe_name.toUpperCase();
		
		// Files to copy and process
		var files = init.filesToCopy( props );
		
		// Actually copy and process files
		init.copyAndProcess( files, props );
		
		// Generate package.json file
		init.writePackageJSON( 'package.json', props );
		
		// Done!
		done();
	});
};