const express = require('express');
const app = express();
const path = require('path');
const mysql = require('mysql');

app.set('view engine', 'pug');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'projector'
});

app.use(express.static(path.join(__dirname, 'views')));

app.get('/borrowviewsuper', (req, res) => {
  connection.query('SELECT * FROM borrowed_projectors', (error, result) => {
    if (error) throw error;

    res.render('borrowviewsuper', {
      result: result,
      adminID: req.session.adminID // Make sure to set adminID in the session
    });
  });
});

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
