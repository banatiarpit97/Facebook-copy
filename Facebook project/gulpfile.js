
var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    del = require('gulp-del'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    browserSync = require('browser-sync'),
     reload = browserSync.reload,
    plumber = require('gulp-plumber'),
    imagemin = require('gulp-imagemin'),
    changed = require('gulp-changed'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer');

 //CONFIG
 var config = {
 	 jsConcatFiles: [
        './app/js/module1.js',
        './app/js/main.js'
 	     ]
 } ;  

 //LOG ERRORS
 function errorlog(err){
 	   console.log(err.message);
 	   this.emit('end');
 } 

 //CSS FILES
  gulp.task(cssfiles, function(){
     gulp.src('app/css/**/*.css')
     .on('error', errorlog)
     .pipe(concat('all.css'))
     .pipe(minifycss())
     .pipe(rename({suffix:'.min'}))
     .pipe(autoprefixer('last 2 versions'))
     .pipe(gulp.dest('app/css-min/'))
     .pipe(reload({stream:true}));
  });

 //IMAGE MINIFICATION  
  gulp.task('imagemin',function(){
      gulp.src('app/images/**/*.+(png|jpg|gif|jpeg')
      .on('error', errorlog)
      .pipe(changed('app/images-min/'))
      .pipe(imagemin())
      .pipe(rename({suffix:'.min'}))
      .pipe(autoprefixer('last 2 versions'))
      .pipe(gulp.dest('app/images-min/'))
      .pipe(reload({stream:true}));
  });

 // JAVA SCRIPT FILES
 gulp.task('scripts', function(){
 	gulp.src('app/js/**/*.js')
 	.on('error', errorlog)
 	.pipe(concat('all.js'))
 	//.pipe(plumber())
 	.pipe(uglify())
 	.pipe(rename({suffix:'.min'}))
 	.pipe(autoprefixer('last 2 versions'))
 	.pipe(gulp.dest('app/js-min/'))
    .pipe(reload({stream:true}));
 });

 //HTML TASK
 gulp.task('html', function(){
 	gulp.src('app/**/*.html')
   .pipe(reload({stream:true}));

 });

 //BROWSER-SYNC TASK
 gulp.task('browser-sync', function(){
    browserSync({
    	server:{
    		baseDir : "./app/"
    	}
    });
 });

 //BUILD TASKS

   //CLEAR PREVIOUS BUILD FOLDER(IF ANY)
   gulp.task('build:cleanfolder', function(cb) {
   	  del([
   	  	    'build/**'
   	  	], cb);
   });

   //CREATE NEW BUILD FOLDER
   gulp.task('build:copy', ['build:cleanfolder'], function(){
   	   return gulp.src('app/**/*/')
   	   .pipe(gulp.dest('build/'));
   });

   //REMOVE UNWANTED FILES
   gulp.task('build:remove', ['build:copy'], function(cb) {
   	del([
   		 'build/css/',
   		 'build/js/',
   		 'build/bower.json',
   		 'build/bower_components/'
   		 'build/maps'
   	], cb);
   });

   //MAIN BUILD TASK(WRITE gulp build in cmd to run this and apparantly all the build tasks)
   gulp.task('build', ['build:copy','build:remove']);

 //WATCH TASK
 gulp.task('watch',function(){
 	gulp.watch('app/js/**/*.js', ['scripts']);
 	gulp.watch('app/css/**/*.css', ['cssfiles']);
 	gulp.watch('app/**/*.html',['html']);

 });



// DEFAULT TASK
gulp.task('default', ['scripts','cssfiles', 'html','imagemin', 'browser-sync', 'watch']);