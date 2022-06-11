import express from 'express';
import bodyParser from 'body-parser';
import routes from './src/routes/appRoutes.js';
import cors from 'cors';
import https from 'https';
import fs from 'fs';
import path from 'path';

const app = express();
const PORT = 3000;

app.use(cors({
  origin: '*'
}));


app.use(cors());



// Body Parser config
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

routes(app);

app.get("/", (req, res) =>
    res.send(`Your server is running in PORT=${PORT}`)
);

// app.listen(PORT, () => console.log("server is running"));

const options ={
  key:fs.readFileSync('C:/Projets/3proj/i-drive-mobile/IDriveMobile/certif/key.pem'),
  cert:fs.readFileSync(path.join('C:/Projets/3proj/i-drive-mobile/IDriveMobile/certif/cert.pem')) 
}


const sslserver =https.createServer(options,app)

sslserver.listen(PORT,()=>{console.log(`Secure Server is listening on port ${PORT}`)});