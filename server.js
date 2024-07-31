var express = require('express');
var app = express();

// set the view engine to ejs
app.set('view engine', 'ejs');

// use res.render to load up an ejs view file

app.use(express.static('public'));

// index page
app.get('/', function (req, res) {
    res.render('pages/index');
});

// blog page
app.get('/blog', function (req, res) {
    res.render('pages/blog');
});

// single blog-post page
app.get('/blog-single', function (req, res) {
    res.render('pages/blog-single');
});

// about page
app.get('/about', function (req, res) {
    res.render('pages/about');
});

// what-we-do
app.get('/what-we-do', function (req, res) {
    res.render('pages/what-we-do');
});

app.listen(7070);
console.log('Server is listening on port 7070');