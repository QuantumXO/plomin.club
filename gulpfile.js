'use strict';

const gulp           		 = require('gulp'),
	  gulpLoadPlugins		 = require('gulp-load-plugins'),
	  browserSync    		 = require("browser-sync"),
	  argv           		 = require('yargs').argv,
	  imageminJpegRecompress = require('imagemin-jpeg-recompress'),
	  imageminPngquant 		 = require('imagemin-pngquant'),
	  plugin                 = gulpLoadPlugins();
	
// Paths
const dest = 'dist/',
	  clearDir = 'dist',
	  src = '',
	  path = {
		build: {
			page:   dest,
			styles: dest + 'css',
			fonts:  dest + 'css/fonts',
			img:    dest + 'img',
			js:     dest + 'js',
			jsMin:  dest + 'js'
		},
		watch: {
			page:   'modules/**/*.+(html|php)',
			sass:   'css/*.sass',
			fonts:  'css/fonts/*',
			img:    'img/**/*',
			js:     'js/**/*.js',
			jsMin:  'js/**/*.min.js'
		},
		assets: {
			page:   'modules/**/*.+(html|php)',
			style:  'css/*.sass',
			fonts:  'css/fonts/*',
			img:    'img/**/*',
			js:     'js/**/*.js',
			jsMin:  'js/**/*.min.js'
		}
	};

// PAGE 
function page() {
  return gulp.src([path.assets.page, '!modules/blocks/*.+(html|php)'])
	//.pipe(plugin.newer(path.build.page, {ext: '.(html|php)'}))
	.pipe(plugin.fileInclude({
		prefix: '@@',
		basepath: '@file'
	}))
	.pipe(gulp.dest(dest))
	.pipe(browserSync.reload({stream:true}));
}

// Стили
function styles() {
    return gulp.src(path.assets.style)
		.pipe(plugin.changed(path.build.styles))
		//.pipe(sourcemaps.init())
		.pipe(plugin.sass().on( 'error', plugin.notify.onError(
			{message: "<%= error.message %>",
				title  : "Sass Error!"})))
		.pipe(plugin.autoprefixer({ browsers: ['last 16 versions'], cascade: false }))
		.pipe(gulp.dest(path.build.styles))
		.pipe(plugin.if(argv.prod, plugin.cleancss()))
		//.pipe(sourcemaps.write())
		.pipe(plugin.if(argv.prod, plugin.criticalCss()))
		.pipe(plugin.if(argv.prod, plugin.rename({suffix: '.min'})))
		.pipe(plugin.if(argv.prod, gulp.dest(path.build.styles)))
		.pipe(browserSync.reload({stream:true}));
}

// Конвертируем шрифты в base64
function fc() {
	return gulp.src([path.assets.fonts + '*.(ttf)'])
		.pipe(plugin.if(argv.prod, plugin.cssfont64()))
		.pipe(plugin.if(argv.prod, gulp.dest(path.build.styles)))
}

// fonts
function fonts() {
	return gulp.src(path.assets.fonts)
		.pipe(plugin.newer(path.build.fonts))
		.pipe(gulp.dest(path.build.fonts));
}

// Скрипты js
function js() {
	return gulp.src([path.assets.js, '!js/**/*.min.js'])
		.pipe(plugin.changed(path.build.js, {extension: '.js'}))
		//.pipe(concat('main.js'))
		//.pipe(plugin.rename({ suffix: '.min' }))
		.pipe(gulp.dest(path.build.js))
		.pipe(plugin.if(argv.prod, plugin.uglify().on( 'error', plugin.notify.onError(
		  { message: "<%= error.message %>", title  : "JS Error!" }))))
		.pipe(plugin.if(argv.prod, plugin.rename({ suffix: '.min' })))
		.pipe(plugin.if(argv.prod, gulp.dest(path.build.js)))
		.pipe(browserSync.reload({stream:true}));
}

// Скрипты jsMin
function jsMin() {
	return gulp.src(path.assets.jsMin)
		.pipe(plugin.changed(path.build.jsMin, {extension: '.js'}))
		.pipe(gulp.dest(path.build.jsMin));
}

// Img
function img() {
	return gulp.src(path.assets.img)
		//.pipe(plugin.changed(path.build.img))
		.pipe(plugin.newer(path.build.img))
		//.pipe(plugin.if(argv.prod, plugin.cache(plugin.imagemin({optimizationLevel:5,progressive:true,interlaced:true}))))
		.pipe(plugin.if(argv.prod, plugin.cache(plugin.imagemin([
				plugin.imagemin.gifsicle({interlaced:true}),
				imageminJpegRecompress({progressive:true,max:80,min:75}),
				imageminPngquant({quality: '75-85'}),
				plugin.imagemin.svgo({plugins: [{removeViewBox:false}]})
			]))))
		.pipe(gulp.dest(path.build.img));
}

// Очистка
function clear() {
	return gulp.src(clearDir, {read: false})
		.pipe(plugin.clean());
}

// zip
function zipFunc() {
    return gulp.src(dest)
        .pipe(plugin.zip('archive.zip'))
        .pipe(gulp.dest(dest));
}

// Proxy connect
function browserSyncFunc(){
	browserSync.init({
		proxy: "Plomin.dev",
		notify: true,
		open: false
	});
}

/*// Server connect
function browserSyncFunc() {
	browserSync.init({
    });
};*/

// Наблюдение Watch
function watch() {
	// Наблюдение за .sass файлами
	gulp.watch(path.watch.sass, styles)
	// Наблюдение за .js файлами
	gulp.watch(path.watch.js, js)
	// Наблюдение за .min.js файлами
	gulp.watch(path.watch.jsMin, jsMin)
	// Наблюдение за img файлами
	gulp.watch(path.watch.img, img)
	// Наблюдение за fonts файлами
	gulp.watch(path.watch.fonts, fonts)
	// Наблюдение за fonts файлами
	gulp.watch(path.watch.page, page);
};

// Задача по-умолчанию
gulp.task('default', gulp.parallel(styles, fonts, img, js, jsMin, page, fc, browserSyncFunc, watch));
gulp.task('clear', clear);
