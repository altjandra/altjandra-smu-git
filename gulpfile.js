const gulp = require('gulp');
const	sass = require('gulp-sass');
const	concatCss = require('gulp-concat-css');

// compile scss into css
function style() {
	// sources
	return gulp.src('./assets/sass/**/*.scss')
	// compile
	.pipe(sass())
	// path
	.pipe(gulp.dest('./public/css'))
}

 function watch () {
	gulp.watch('./assets/sass/**/*.scss', style);
	gulp.watch('./public/**/**/*.html', style);
	gulp.watch('./public/js/**/*.js', style);
 }

exports.style = style;
exports.watch = watch;