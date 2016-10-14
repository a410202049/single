var gulp = require('gulp'),
  rename = require('gulp-rename'),
  uglify = require('gulp-uglify'),
  clean = require('gulp-clean'),
  sourcemaps = require('gulp-sourcemaps'),
  cssmin = require('gulp-clean-css'),
  rev = require('gulp-rev'),
  revCollector = require("gulp-rev-collector");
gulp.task('default', function() {
  gulp.start('watch');
});
gulp.task('compressJS',['cleanCompJs'], function() {
  return gulp.src('public/static/js/!(*.min).js')
    .pipe(rename({suffix: '.min'})) 
    .pipe(uglify())
    .pipe(gulp.dest('public/static/js/dist/'));
});
gulp.task('compressCSS',['cleanCompCSS'],function(){
  return gulp.src('public/static/css/!(*.min).css')
      .pipe(rename({suffix:'.min'}))
      .pipe(cssmin())
      .pipe(gulp.dest('public/static/css/dist/'));
})
gulp.task('watch', function() {
  // 看守所有.js档
  gulp.watch('public/static/js/*.js', ['revHtml']);
  gulp.watch('public/static/css/*.css', ['revHtml']);

});
gulp.task('cleanCompJs', function() {  
  return gulp.src('public/static/js/dist/*.js')
    .pipe(clean());
});
gulp.task('cleanCompCSS', function() {  
  return gulp.src('public/static/css/dist/*.js')
    .pipe(clean());
});
gulp.task('cleanAll', function() {  
  return gulp.src(['./compressed/*.js'])
    .pipe(clean());
});
gulp.task('revJs',['compressJS'], function(){
    return gulp.src('public/static/js/**/*.js')
        .pipe(rev())
        .pipe(rev.manifest())
        .pipe(gulp.dest('public/static/rev/js'));
});

gulp.task('revCss',['compressCSS'], function(){
    return gulp.src('public/static/css/**/*.css')
        .pipe(rev())
        .pipe(rev.manifest())
        .pipe(gulp.dest('public/static/rev/css'));
});
//Html替换css、js文件版本
gulp.task('revHtml',['revJs','revCss'], function () {
    return gulp.src(['public/static/rev/**/*.json', 'templates/*.html'])
        .pipe(revCollector())
        .pipe(gulp.dest('templates'));
});
//监测保存