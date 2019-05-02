var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var browserSync = require('browser-sync');

gulp.task('reload', function() {
    browserSync.reload();
});

gulp.task('serve', ['sass'], function() {
    // browserSync({server: ''});
    gulp.watch('*.html', ['reload']);
    gulp.watch('public/assets/scss/*.scss', ['sass']);
});

gulp.task('sass', function(){
    return gulp.src('public/assets/scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(concat('main.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('public/assets/css'))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);