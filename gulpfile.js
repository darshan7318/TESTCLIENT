const gulp = require('gulp');
const postcss = require('gulp-postcss');
const postcssImport = require('postcss-import');
const rename = require('gulp-rename');
const fileInclude = require('gulp-file-include');
const replace = require('gulp-replace');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const browserSync = require('browser-sync').create();
const fs = require('fs');
const path = require('path');

// Paths configuration
const paths = {
  css: {
    src: 'src/css/main.css',
    watch: ['src/css/**/*.css', 'tailwind.config.js'],
    dest: 'assets/css',
    distDest: 'dist/assets/css'
  },
  html: {
    srcRoot: 'src/pages/*.html',
    srcCaseStudies: 'src/pages/case-studies/*.html',
    components: 'src/components/**/*.html',
    destRoot: '.',
    destCaseStudies: 'case-studies',
    distRoot: 'dist',
    distCaseStudies: 'dist/case-studies'
  },
  assets: {
    img: 'assets/img/**/*',
    imgDest: 'dist/assets/img',
    js: 'assets/js/**/*',
    jsDest: 'dist/assets/js',
    css: ['assets/css/about.css', 'assets/css/footer.css'],
    cssDest: 'dist/assets/css',
    meta: ['robots.txt', 'sitemap.xml', '_redirects', '_headers', 'netlify.toml'],
    metaDest: 'dist'
  }
};

// 1. Clean dist directory
function cleanDist(done) {
  if (fs.existsSync('dist')) {
    fs.rmSync('dist', { recursive: true, force: true });
  }
  done();
}

// 2. Compile Tailwind CSS (Both unminified & minified)
function buildCss() {
  const pluginsDev = [
    postcssImport(),
    tailwindcss(),
    autoprefixer()
  ];

  const pluginsProd = [
    cssnano({
      preset: ['default', { discardComments: { removeAll: true } }]
    })
  ];

  return gulp.src(paths.css.src)
    .pipe(postcss(pluginsDev))
    .pipe(rename('trendz.css'))
    .pipe(gulp.dest(paths.css.dest))
    .pipe(gulp.dest(paths.css.distDest))
    .pipe(postcss(pluginsProd))
    .pipe(rename('trendz.min.css'))
    .pipe(gulp.dest(paths.css.dest))
    .pipe(gulp.dest(paths.css.distDest))
    .pipe(browserSync.stream());
}

// 3. Compile Modular HTML Components
function compileRootHtml() {
  return gulp.src(paths.html.srcRoot)
    .pipe(fileInclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(gulp.dest(paths.html.destRoot))
    .pipe(gulp.dest(paths.html.distRoot));
}

function compileCaseStudiesHtml() {
  return gulp.src(paths.html.srcCaseStudies)
    .pipe(fileInclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(gulp.dest(paths.html.destCaseStudies))
    .pipe(gulp.dest(paths.html.distCaseStudies));
}

function compileSharedFooterPartial() {
  return gulp.src('src/components/footer.html')
    .pipe(replace(/@@base/g, ''))
    .pipe(rename('footer.html'))
    .pipe(gulp.dest('.'))
    .pipe(gulp.dest('dist'));
}

// 4. Copy static assets to dist
function copyImages() {
  return gulp.src(paths.assets.img, { encoding: false })
    .pipe(gulp.dest(paths.assets.imgDest));
}

function copyJs() {
  return gulp.src(paths.assets.js)
    .pipe(gulp.dest(paths.assets.jsDest));
}

function copyAdditionalCss() {
  return gulp.src(paths.assets.css)
    .pipe(gulp.dest(paths.assets.cssDest));
}

function copyMeta() {
  return gulp.src(paths.assets.meta, { allowEmpty: true })
    .pipe(gulp.dest(paths.assets.metaDest));
}

// 5. BrowserSync Dev Server & Watch
function serve(done) {
  browserSync.init({
    server: {
      baseDir: '.'
    },
    port: 3000,
    notify: false,
    open: false
  });

  // Watch CSS
  gulp.watch(paths.css.watch, buildCss);

  // Watch HTML & Components
  gulp.watch([
    paths.html.srcRoot,
    paths.html.srcCaseStudies,
    paths.html.components
  ], gulp.series(
    gulp.parallel(compileRootHtml, compileCaseStudiesHtml, compileSharedFooterPartial),
    buildCss,
    (reloadDone) => {
      browserSync.reload();
      reloadDone();
    }
  ));

  // Watch JS
  gulp.watch('assets/js/**/*.js').on('change', browserSync.reload);

  done();
}

// Composite tasks
const compileHtml = gulp.parallel(compileRootHtml, compileCaseStudiesHtml, compileSharedFooterPartial);
const copyAssets = gulp.parallel(copyImages, copyJs, copyAdditionalCss, copyMeta);
const build = gulp.series(cleanDist, compileHtml, buildCss, copyAssets);
const dev = gulp.series(build, serve);

// Exports
exports.clean = cleanDist;
exports.css = buildCss;
exports.html = compileHtml;
exports.assets = copyAssets;
exports.build = build;
exports.serve = dev;
exports.dev = dev;
exports.watch = dev;
exports.default = build;
