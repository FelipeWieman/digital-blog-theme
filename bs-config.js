const browserSync = require("browser-sync").create();
const { exec } = require("child_process");

// Initialize BrowserSync
browserSync.init({
    proxy: "localhost:8080",  // Your local server address
    files: ["views/**/*.ejs", "public/css/tailwind.css"],  // Files to watch
    port: 3000,  // Port for BrowserSync server
    open: false,  // Disable automatic opening of browser
});

// Watch CSS and EJS files
browserSync.watch("views/**/*.ejs").on("change", browserSync.reload);
browserSync.watch("public/css/tailwind.css").on("change", browserSync.reload);

// Watch JS files and restart server on change
browserSync.watch("server.js").on("change", () => {
    exec("npm run build:css && npm run start", (err, stdout, stderr) => {
        if (err) {
            console.error(`exec error: ${err}`);
            return;
        }
        console.log(stdout);
        console.error(stderr);
        browserSync.reload();
    });
});
