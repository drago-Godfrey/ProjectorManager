/*
var mysql = require('mysql');
var express = require('express');
var bdp = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({ extended: true }); 

app = express();

app.listen(8080, function(){
    console.log("Server Running ..")
});

app.use(bdp, json());
app.use(express.static('public'));
app.set("view engine","pug");

app.get('/',function(req, res){
    res.render('index');
});
*/

const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const pug = require('pug');
const path = require('path');  // Add this line

const app = express();
const port = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Set up view engine
app.set('view engine', 'pug');
app.set('views', path.join(__dirname, 'views'));

// MySQL Connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'projector'
});

db.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
  } else {
    console.log('Connected to MySQL database');
  }
});

// Routes
app.get('/', (req, res) => {
  res.render('index');
});

app.get('/loginsuper', (req, res) => {
    res.render('loginsuper');
  });

app.get('/dashsuper', (req, res) => {
    res.render('dashsuper');
  });

app.get('/empFormsuper', (req, res) => {
    res.render('empFormsuper');
  });

  app.get('/projectorFormsuper', (req, res) => {
    res.render('projectorFormsuper');
  });

  app.get('/borrowFormsuper', (req, res) => {
    res.render('borrowFormsuper');
  });

  app.get('/returnFormsuper', (req, res) => {
    res.render('returnFormsuper');
  });

// Handle other routes...

// Start server
app.listen(port, () => {
  console.log(`Server Running on port ${port}`);
});
