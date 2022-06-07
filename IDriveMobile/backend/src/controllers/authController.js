import Joi from "joi"
import bcrypt from 'bcryptjs';
import jwt from 'jsonwebtoken';
import initCon from '../../db.js';

// const User = mysql.model('Users', UsersSchema);

initCon.connect(function(err) {
    if (err) {
        return console.error('error: ' + err.message);
      }
  console.log("Connected!");
});

const schema = Joi.object({ 

    username: Joi.string().required(),
    email: Joi.string().
        email({ minDomainSegments: 2, tlds: { allow: ['com', 'net', 'fr'] } }).required(),
    password: Joi.string().pattern(new RegExp('^[a-zA-Z0-9]{3,30}$')).required(),
    size_of_all_docs: Joi.number().required(),
    blocked: Joi.boolean().required()

})

// Register user
export const registerUser = async (req, res) =>{

    const result = schema.validate(req.body);
    if (result.error) return res.status(400).send(result.error.details[0].message);

    const gen = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(req.body.password, gen);

    let username = req.body.username;
    let email = req.body.email;
    let password = hashedPassword;
    let doc_size = req.body.size_of_all_docs;
    let blocked = req.body.blocked;

    //console.log("user response : ", req.body);

    initCon.connect(function() {
        // add func to Check if user already exist
        var sql = `INSERT INTO users (username, email, mdp, size_of_all_docs, blocked) VALUES ('${username}', '${email}', '${password}', '${doc_size}', '${blocked}')`;
        initCon.query(sql, function (err) {
          if (err) throw err;
          res.send("Registration validated")
        });
      });
};

// Login user 
export const loginUser = async (req, res) =>{

    initCon.connect(function(err) {

        var sql = `SELECT * FROM users WHERE email="${req.body.email}"`;
        initCon.query(sql, function (err, result) {
          if (err) throw err;
          console.log("result", result);
          if (result.length == 0) return res.status(404).send("l'utilisateur n'existe pas");
          else if (result.length != 0) {
            const validPassword = bcrypt.compare(req.body.password, result[0].mdp);
            if (!validPassword) return res.status(400).send("Mot de passe incorrect");
            
            // Generate token
            const myToken = jwt.sign({id: result[0].id}, "kld1SGSAHJLZHZZ");
            return res.status(200).send(myToken);
          }
          
        });
      });
 
    // const user = await User.findOne({email: req.body.email});
    // if (!user) return res.status(400).send("Email is not found");

    // const validPassword = await bcrypt.compare(req.body.password, user.password);
    // if (!validPassword) return res.status(400).send("Invalid password");



    // const myToken = jwt.sign({ _id: user._id}, "kld1SGSAHJLZHZZ");
    // res.header('auth-token', myToken).send(myToken);

};
