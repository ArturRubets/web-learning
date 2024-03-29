const gulp = require("gulp");

// Tasks
require("./gulp/dev.js");
require("./gulp/docs.js");

gulp.task(
  "default",
  gulp.series(
    "clean:dev",
    gulp.parallel(
      "html:dev",
      "sass:dev",
      "images:dev",
      "assets:dev",
      "fonts:dev",
      "files:dev",
      "js:dev",
      "libs:dev"
    ),
    gulp.parallel("server:dev", "watch:dev")
  )
);

gulp.task(
  "docs",
  gulp.series(
    "clean:docs",
    gulp.parallel(
      "html:docs",
      "sass:docs",
      "images:docs",
      "assets:docs",
      "fonts:docs",
      "files:docs",
      "js:docs",
      "libs:docs"
    ),
    gulp.parallel("server:docs")
  )
);
