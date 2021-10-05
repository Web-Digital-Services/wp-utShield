const gulp = require('gulp');
const fileinclude = require('gulp-file-include');
const imagemin = require('gulp-imagemin');
const server = require('browser-sync').create();
const { watch, series } = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');

sass.compiler = require('node-sass');

// Reload Server
async function reload() {
  server.reload();
}

// Sass compiler
async function compileSass() {
  gulp.src('./assets/_src/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assets/css'));
}

// JS concatenate
async function buildJS() {
  return gulp.src('./assets/_src/js/vendor/*.js')
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('./assets/js'));
}

// Copy site JS
async function copyJS() {
  gulp.src(['assets/_src/js/*.js'])
    .pipe(gulp.dest('./assets/js'));
}

// Image Minification
async function imgMin() {
  gulp.src('./assets/_src/img/**/*')
    .pipe(imagemin())
    .pipe(gulp.dest('./assets/img'))
}

// Compile HTML Includes
async function includeHTML(){
  return gulp.src([
    'assets/_src/views/*.html',
    '!assets/_src/views/includes/*.html' // ignore
    ])
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(gulp.dest('./static/'));
}

// Build files html and reload server
async function buildAndReload() {
  await includeHTML();
  await compileSass();
  await copyJS();
  await imgMin();
  reload();
}

exports.includeHTML = includeHTML;
exports.imgMin = imgMin;
exports.buildJS = buildJS;
exports.copyJS = copyJS;

exports.default = async function() {
  // Init serve files from the build folder
  server.init({
    server: {
      baseDir: './'
    }
  });
  
  // Build and reload at the first time
  buildAndReload();
  
  // Watch tasks
  watch(["assets/_src/**/*"], series(buildAndReload));
};