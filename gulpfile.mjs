import gulp from "gulp";
import dartSass from 'sass';
import gulpSass  from "gulp-sass";
import sourcemaps from "gulp-sourcemaps"
import babel from "gulp-babel"
import webpack from "webpack-stream"
import browserSync from "browser-sync"
import uglify from "gulp-uglify"
import minifyCss from "gulp-clean-css"
import concatCss from "gulp-concat-css"
import rename from "gulp-rename"
import TerserPlugin from "terser-webpack-plugin"
import gulpIf from 'gulp-if';
import changed from "gulp-changed"
import imagemin, {gifsicle, mozjpeg, optipng, svgo} from "gulp-imagemin"
import path from 'path';

const sass = gulpSass (dartSass)
const isGif = file => path.extname(file.path).toLowerCase() === '.gif';

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
    return gulp.src([
        './node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/solid.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/regular.scss',
        './node_modules/@fortawesome/fontawesome-free/scss/brands.scss',
    ])
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(concatCss('fontawesome.css'))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(`${pathAssets}/libs/fontawesome/css`))
        .pipe(browserSync.stream())
}

function buildFontawesomeWebFonts() {
    return gulp.src([
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.ttf',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.woff2',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-regular-400.ttf',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-regular-400.woff2',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.ttf',
        './node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.woff2',
    ])
        .pipe(gulp.dest(`${pathAssets}/libs/fontawesome/webfonts`))
        .pipe(browserSync.stream())
}

/*
Task build Bootstrap
* */

// Task build style bootstrap
function buildStyleBootstrap() {
    return gulp.src(`${pathSrc}/scss/vendors/bootstrap.scss`)
        .pipe(sass({
            outputStyle: 'expanded',
            includePaths: ['node_modules']
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(`${pathAssets}/libs/bootstrap/`))
        .pipe(browserSync.stream())
}

// Task build js bootstrap
function buildLibsBootstrapJS() {
    return gulp.src([
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
        .pipe(gulp.dest(`${pathAssets}/libs/bootstrap/`))
        .pipe(browserSync.stream())
}

/*
Task build owl carousel
* */
function buildStyleOwlCarousel() {
    return gulp.src(`${pathNodeModule}/owl.carousel/dist/assets/owl.carousel.css`)
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(`${pathAssets}/libs/owl.carousel/`))
        .pipe(browserSync.stream())
}

function buildJsOwlCarouse() {
    return gulp.src([
        `${pathNodeModule}/owl.carousel/dist/owl.carousel.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(`${pathAssets}/libs/owl.carousel/`))
        .pipe(browserSync.stream())
}

// Task build style theme
function buildStyleTheme() {
    return gulp.src(`${pathSrc}/scss/style-theme.scss`)
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(`${pathAssets}/css/`))
        .pipe(browserSync.stream())
}

function buildJSTheme() {
    return gulp.src([
        `${pathAssets}/js/*.js`,
        `!${pathAssets}/js/*.min.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(`${pathAssets}/js/`))
        .pipe(browserSync.stream())
}

// Task build elementor addons
function buildStyleElementor() {
    return gulp.src(`${pathSrc}/scss/elementor-addons/addons.scss`)
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(`./extension/elementor-addon/css/`))
        .pipe(browserSync.stream())
}

function buildJSElementor() {
    return gulp.src([
        `${pathSrc}/js/elementor-addon.js`,
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(`./extension/elementor-addon/js/`))
        .pipe(browserSync.stream())
}

// Task build style custom post type
function buildStyleCustomPostType() {
    return gulp.src(`${pathSrc}/scss/post-type/*/**.scss`)
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(`${pathAssets}/css/post-type/`))
        .pipe(browserSync.stream())
}

// Task build style page templates
function buildStylePageTemplate() {
    return gulp.src(`${pathSrc}/scss/page-templates/*.scss`)
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(`${pathAssets}/css/page-templates/`))
        .pipe(browserSync.stream())
}

// Task optimize images
function optimizeImages() {
    const imgSrc = `${pathSrc}/images/**/*.+(png|jpg|webp|svg|gif)`;
    const imgDst = `${pathAssets}/images/`;

    return gulp.src(imgSrc)
        .pipe(changed(imgDst))
        .pipe(imagemin([
            gifsicle({interlaced: true}),
            mozjpeg({quality: 75, progressive: true}),
            optipng({optimizationLevel: 5}),
            svgo({
                plugins: [
                    {
                        name: 'removeViewBox',
                        active: true
                    },
                    {
                        name: 'cleanupIDs',
                        active: false
                    }
                ]
            })
        ]))
        .pipe(gulp.dest(imgDst))
        .pipe(browserSync.stream())
}


/*
Task build project
* */
export async function buildProject() {
    await buildFontawesomeStyle()
    await buildFontawesomeWebFonts()

    await buildStyleBootstrap()
    await buildLibsBootstrapJS()

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

// Task watch
export function watchTask() {
    server()

    gulp.watch([
        `${pathSrc}/scss/abstracts/*.scss`
    ], gulp.series(
        buildStyleBootstrap,
        buildStyleTheme,
        buildStyleElementor,
        buildStyleCustomPostType
    ))

    gulp.watch([
        `${pathSrc}/scss/vendors/bootstrap.scss`
    ], buildStyleBootstrap)

    gulp.watch([
        `${pathSrc}/scss/base/*.scss`,
        `${pathSrc}/scss/components/*.scss`,
        `${pathSrc}/scss/layout/*.scss`,
        `${pathSrc}/scss/style-theme.scss`,
    ], buildStyleTheme)
    gulp.watch([`${pathSrc}/js/custom.js`], buildJSTheme)

    gulp.watch([
        `${pathSrc}/scss/elementor-addon/*.scss`
    ], buildStyleElementor)
    gulp.watch([`${pathSrc}/js/elementor-addon.js`], buildJSElementor)

    gulp.watch([
        `${pathSrc}/scss/post-type/*/**.scss`
    ], buildStyleCustomPostType)

    gulp.watch(`${pathSrc}/images/**/*`, optimizeImages)

    gulp.watch([
        './*.php',
        './**/*.php',
        `${pathAssets}/images/**/*`
    ], browserSync.reload);
}