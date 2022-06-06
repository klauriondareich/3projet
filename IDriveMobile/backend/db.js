import mysql from 'mysql';

// Database connection
const DB_HOST = 'localhost'
const DB_USER = 'root'
const DB_DATABASE = 'projdb'

let initCon = mysql.createConnection({
    host: DB_HOST,
    user: DB_USER,
    database: DB_DATABASE
  });

  export default initCon;