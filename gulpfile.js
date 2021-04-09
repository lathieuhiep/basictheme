'use strict';

const gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifyCss = require('gulp-clean-css'),
    concatCss = require('gulp-concat-css');

sass.compiler = require('node-sass');

// Task sass
gulp.task('sass', function () {
    return gulp.src('./scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'));
});

// Task compress mini css
gulp.task('compress-css', function () {
    return gulp.src('/css/library/*.css')
        .pipe(concatCss("library.min.css"))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(gulp.dest('/css/library/minify'));
});

// Task compress mini js
gulp.task('compress-js', function () {
    return gulp.src([
        '/js/library/popper.js',
        '/js/library/bootstrap.js',
        '/js/library/owl.carousel.js',
        // '/js/library/jquery.sticky.js',
        // '/js/library/lity.js',
        // '/js/library/jquery.easypiechart.js'
    ])
        .pipe(concat('library.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('/js/library/minify'));
});