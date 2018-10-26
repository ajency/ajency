
var gulp = require('gulp'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    csso = require('gulp-csso'),
    prefix = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    // browserSync = require('browser-sync').create(),
    minify = require('gulp-minify');

// Minifies JS
gulp.task('scripts', function(){
    return gulp.src(['./wp-content/themes/ajency-portfolio/js/bootstrap.min.js',
        './wp-content/themes/ajency-portfolio/js/lazysizes.min.js',
        './wp-content/themes/ajency-portfolio/js/slick.min.js'])
    .pipe(uglify())
    .pipe(concat('combine.js'))
    .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/js'))
});

gulp.task('compress', function() {
    return gulp.src('./wp-content/themes/ajency-portfolio/js/custom.js')
    .pipe(uglify())
    .pipe(concat('custom.min.js'))
    .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/js'))
});

/*==========  Minify and concat different styles files  ==========*/

// SASS Version
gulp.task('sass', function() {
    return gulp.src('./wp-content/themes/ajency-portfolio/scss/custom.scss')
        .pipe(sass())
        // Minify the file
        .pipe(csso())
        .pipe(gulp.dest("./wp-content/themes/ajency-portfolio/css"))
        // .pipe(browserSync.stream());
});


// SCSS Version
//gulp.task('styles', function(){
    //return gulp.src('src/scss/**/*.scss')
    //.pipe(sass())
    //.pipe(prefix('last 2 versions'))
    //.pipe(concat('main.css'))
    //.pipe(minifyCSS())
    //.pipe(gulp.dest('public/css'))
//});


// CSS Version

gulp.task('css', function(){
    // return gulp.src('./themes/kss/static/css/*.css')
    return gulp.src(['./wp-content/themes/ajency-portfolio/css/custom.css'])
     .pipe(csso())
     .pipe(concat('combine.css'))
   .pipe(gulp.dest('./wp-content/themes/ajency-portfolio/css'))
});

gulp.task('default', function() {
    gulp.run('scripts')
    gulp.run('compress')
    gulp.run('css')

});

gulp.task('watch', ['sass'], function() {
    gulp.watch(['./wp-content/themes/ajency-portfolio/scss/*.scss'], ['sass']);
});
