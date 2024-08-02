const gulp = require('gulp')
const {src, dest, watch} = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const babel = require('gulp-babel')
const webpack = require('webpack-stream')
const browserSync = require('browser-sync')
const uglify = require('gulp-uglify')
const minifyCss = require('gulp-clean-css')
const rename = require("gulp-rename")
const TerserPlugin = require('terser-webpack-plugin')
const imagemin = require('gulp-imagemin');

const pathSrc = './src'
const pathAssets = './assets'
const pathNodeModule = './node_modules'

// server
function server() {
    browserSync.init({
        proxy: "localhost/basicthem",
        open: false,
        cors: true,
        ghostMode: false
    })
}

/*
Task build fontawesome
* */
function buildFontawesomeStyle() {
    return src(`${pathSrc}/scss/vendors/fontawesome.scss`)
        .pipe(sass({
            outputStyle: 'expanded',
            includePaths: ['node_modules']
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathAssets}/libs/fontawesome/css`))
        .pipe(browserSync.stream())
}

function CopyWebFonts() {
    return src([
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.ttf',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.woff2',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-regular-400.ttf',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-regular-400.woff2',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.ttf',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.woff2',
    ], {encoding: false})
        .pipe(dest(`${pathAssets}/libs/fontawesome/webfonts`))
        .pipe(browserSync.stream())
}

exports.CopyWebFonts = CopyWebFonts

/*
Task build Bootstrap
* */

// Task build style bootstrap
function buildStyleBootstrap() {
    return src(`${pathSrc}/scss/vendors/bootstrap.scss`)
        .pipe(sass({
            outputStyle: 'expanded',
            includePaths: ['node_modules']
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathAssets}/libs/bootstrap/`))
        .pipe(browserSync.stream())
}

// Task build js bootstrap
function buildLibsBootstrapJS() {
    return src([
        `${pathNodeModule}/bootstrap/js/dist/collapse.js`
    ])
        .pipe(babel())
        .pipe(webpack({
            mode: 'production',
            output: {
                filename: 'bootstrap.js'
            },
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        exclude: /node_modules/,
                        use: {
                            loader: 'babel-loader'
                        }
                    }
                ]
            },
            optimization: {
                minimize: true,
                minimizer: [
                    new TerserPlugin({
                        terserOptions: {
                            output: {
                                comments: false,
                            },
                        },
                        extractComments: false,
                    }),
                ],
            },
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathAssets}/libs/bootstrap/`))
        .pipe(browserSync.stream())
}

/*
Task build owl carousel
* */
function buildStyleOwlCarousel() {
    return src(`${pathNodeModule}/owl.carousel/dist/assets/owl.carousel.css`)
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathAssets}/libs/owl.carousel/`))
        .pipe(browserSync.stream())
}

function buildJsOwlCarouse() {
    return src([
        `${pathNodeModule}/owl.carousel/dist/owl.carousel.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathAssets}/libs/owl.carousel/`))
        .pipe(browserSync.stream())
}

// Task build style theme
function buildStyleTheme() {
    return src(`${pathSrc}/scss/style-theme.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathAssets}/css/`))
        .pipe(browserSync.stream())
}

function buildJSTheme() {
    return src([
        `${pathSrc}/js/custom.js`,
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathAssets}/js/`))
        .pipe(browserSync.stream())
}

// Task build elementor addons
function buildStyleElementor() {
    return src(`${pathSrc}/scss/elementor-addons/addons.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(dest(`./extension/elementor-addon/css/`))
        .pipe(browserSync.stream())
}

function buildJSElementor() {
    return src([
        `${pathSrc}/js/elementor-addon.js`,
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`./extension/elementor-addon/js/`))
        .pipe(browserSync.stream())
}

// Task build style custom post type
function buildStyleCustomPostType() {
    return src(`${pathSrc}/scss/post-type/*/**.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathAssets}/css/post-type/`))
        .pipe(browserSync.stream())
}

// Task build style page templates
function buildStylePageTemplate() {
    return src(`${pathSrc}/scss/page-templates/*.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathAssets}/css/page-templates/`))
        .pipe(browserSync.stream())
}

// Task optimize images
function optimizeImages() {
    const imgDst = `${pathAssets}/images/`;

    return src([
        `${pathSrc}/images/*`,
        `${pathSrc}/images/*/**`
    ], {encoding: false})
        .pipe(imagemin())
        .pipe(dest(imgDst))
        .pipe(browserSync.stream())
}

/*
Task build project
* */
async function buildProject() {
    await buildStyleBootstrap()
    await buildLibsBootstrapJS()

    await buildFontawesomeStyle()
    await CopyWebFonts()

    await buildStyleOwlCarousel()
    await buildJsOwlCarouse()

    await buildStyleTheme()
    await buildJSTheme()

    await buildStyleElementor()
    await buildJSElementor()

    await buildStyleCustomPostType()

    await buildStylePageTemplate()

    await optimizeImages()
}

exports.buildProject = buildProject

// Task watch
function watchTask() {
    server()

    watch([
        `${pathSrc}/scss/abstracts/*.scss`
    ], gulp.series(
        buildStyleBootstrap,
        buildStyleTheme,
        buildStyleElementor,
        buildStyleCustomPostType
    ))

    watch([
        `${pathSrc}/scss/vendors/bootstrap.scss`
    ], buildStyleBootstrap)

    watch([
        `${pathSrc}/scss/base/*.scss`,
        `${pathSrc}/scss/components/*.scss`,
        `${pathSrc}/scss/layout/*.scss`,
        `${pathSrc}/scss/style-theme.scss`,
    ], buildStyleTheme)
    watch([`${pathSrc}/js/custom.js`], buildJSTheme)

    watch([
        `${pathSrc}/scss/elementor-addon/*.scss`
    ], buildStyleElementor)
    watch([`${pathSrc}/js/elementor-addon.js`], buildJSElementor)

    watch([
        `${pathSrc}/scss/post-type/*/**.scss`
    ], buildStyleCustomPostType)

    watch(`${pathSrc}/images/**/*`, optimizeImages)

    watch([
        './*.php',
        './**/*.php',
        `${pathAssets}/images/**/*`
    ], browserSync.reload);
}

exports.watchTask = watchTask