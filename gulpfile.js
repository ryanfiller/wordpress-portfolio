'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    browserSync = require('browser-sync');


gulp.task('default', ['sass', 'sass:watch', 'browser-sync']);

gulp.task('sass', function() {
   return gulp.src('sass/**/*.scss')
       .pipe(sass().on('error', sass.logError))
       .pipe(autoprefixer())
       .pipe(gulp.dest('./'))
       .pipe(browserSync.stream());
});

gulp.task('sass:watch', function () {
    gulp.watch(['sass/**/*.scss', 'sass/*.scss'], ['sass']);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: 'portfolio.dev'
    });
});
