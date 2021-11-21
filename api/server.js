//Initiate required packages
const express = require('express');
const mysql = require('mysql2');
require('dotenv').config();

//Create database connection
const connection = mysql.createConnection(
    {
        host: process.env.DB_HOST,
        user: process.env.DB_USER,
        database: process.env.DB_DATABASE
    }
);

connection.query(
    'SELECT * FROM test',
    function(err, results, fields) {
      console.log(results[0].Name);
    }
  );

const api = express();
const port = 3000;

api.get('/', (req, res) => 
{
    res.send('Hello World!');
});

api.get('/home', (req, res) => 
{
    res.send('yea, Im home');
});

api.post('/test', (req, res) => 
{
    res.send('This is a test');
});

api.listen(port, () => 
{
    console.log(`Example app listening at http://localhost:${port}`);
});