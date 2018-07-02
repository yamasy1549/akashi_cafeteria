'use strict';

import autoprefixer from "gulp-autoprefixer";
import concat       from "gulp-concat";
import gulp         from "gulp";
import loadPlugins  from "gulp-load-plugins";
import minimist     from "minimist";
import path         from "path";
import plumber      from "gulp-plumber";
import sass         from "gulp-sass";
import sassGlob     from "gulp-sass-glob";

const $ = loadPlugins();

const argv = minimist(process.argv.slice(2));

const SRC_DIR  = argv.src;
const DEST_DIR = argv.dest;

const SASS_OPTIONS = {
    outputStyle: "compressed"
};

gulp.task("scss", () => {
    return gulp.src(path.join(SRC_DIR, "**/*.{scss,css}"))
        .pipe(plumber({
            errorHandler: function(err) {
                console.log(err.messageFormatted);
                this.emit('end');
            }
        }))
        .pipe(sassGlob())
        .pipe(sass(SASS_OPTIONS))
        .pipe(autoprefixer())
        .pipe(gulp.dest(path.join(DEST_DIR, "styles")));
});

gulp.task("compile", ["scss"]);

gulp.task("watch", ["compile"], () => {
    gulp.watch([path.join(SRC_DIR, "**/*.{scss,css}")], ["scss"]);
});
