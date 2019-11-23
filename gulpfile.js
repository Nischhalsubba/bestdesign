var gulp = require("gulp");
var sass = require("gulp-sass");
var csso = require("gulp-csso");
var uglify = require("gulp-uglify");
var watch = require("gulp-watch");
var autoprefixer = require("gulp-autoprefixer");
var rename = require('gulp-rename');
var image = require('gulp-imagemin');


//Style paths
var scssfiles = './src/scss/*.scss';
var cssdest = "./css/";

// Set the browser that you want to support
const AUTOPREFIXER_BROWSERS = [
    "ie >= 10",
    "ie_mob >= 10",
    "ff >= 30",
    "chrome >= 34",
    "safari >= 7",
    "opera >= 23",
    "ios >= 7",
    "android >= 4.4",
    "bb >= 10"
];

//gulp task to minify css files
gulp.task('styles', function () {
    return gulp.src(scssfiles)
        //Compiling scss file
        .pipe(sass({
            outputStyle: 'expanded',
            onError: console.error.bind(console, 'Sass error:')
        }))
        // Auto-prefix css styles for cross browser compatibility
        .pipe(autoprefixer({
            browsers: AUTOPREFIXER_BROWSERS
        }))
        //without minifying
        .pipe(gulp.dest(cssdest))

        // Minify the file
        .pipe(csso())
        // Output
        .pipe(rename({
            suffix: "-min"
        }))
        .pipe(gulp.dest(cssdest));

});

//Scripts
var jsfiles = "./src/scripts/**/*.js";
var jsdest = "./js/";

//Gulp task to minify
gulp.task("scripts", function () {
    return gulp.src(jsfiles)

        //Minifying the files
        .pipe(uglify())

        //Output
        .pipe(gulp.dest(jsdest))

});

//Images path
var imgfiles="./src/images/*";
var imgdest="./images/";

//Minifying the images
gulp.task('images', function () {
    return gulp.src(imgfiles)
        .pipe(image({
            interlaced: true,
            progressive: true,
            optimizationLevel: 15,
            svgoPlugins: [{
                removeViewBox: true
            }]
        }))

        .pipe(gulp.dest(imgdest))
});

//Watching
gulp.task('default', function () {
    gulp.watch(scssfiles, gulp.series('styles'));
    gulp.watch(jsfiles, gulp.series('scripts'));
    gulp.watch(imgfiles,gulp.series('images'))
});
