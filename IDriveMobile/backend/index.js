import express from 'express';
import bodyParser from 'body-parser';
import routes from './src/routes/appRoutes.js';
import cors from 'cors';

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

app.listen(PORT, () => console.log("server is running"));