'use strict';

const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const minifyCss = require('gulp-clean-css');
const concatCss = require('gulp-concat-css');

const pathRoot = './';

// Task build styles
function buildStyles() {
    return src(`${pathRoot}assets/scss/style.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(dest('./'));
}
exports.buildStyles = buildStyles;

// Task compress mini library css theme
function compressLibraryCssMin() {
    return src([
        './node_modules/bootstrap/dist/css/bootstrap.css',
        './node_modules/owl.carousel/dist/assets/owl.carousel.css',
    ]).pipe(concatCss("library.min.css"))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(dest(`${pathRoot}assets/css/`));
}
exports.compressLibraryCssMin = compressLibraryCssMin

// Task compress lib js & mini file
function compressLibraryJsMin() {
    return src([
        './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        './node_modules/owl.carousel/dist/owl.carousel.js',
    ], {allowEmpty: true})
        .pipe(concat('library.min.js'))
        .pipe(uglify())
        .pipe(dest(`${pathRoot}assets/js/`));
}
exports.compressLibraryJsMin = compressLibraryJsMin

// Task watch
function watchTask() {
    watch(`${pathRoot}assets/scss/**/*.scss`, buildStyles)
}
exports.watchTask = watchTask