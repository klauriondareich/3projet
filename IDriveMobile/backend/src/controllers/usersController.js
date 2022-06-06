import mongoose from 'mongoose';
import { UsersSchema } from '../models/userModel.js';
import Joi from "joi"
import bcrypt from 'bcryptjs';

const User = mongoose.model('Users', UsersSchema);

const schema = Joi.object({
    
    username: Joi.string().required(),
    email: Joi.string().
        email({ minDomainSegments: 2, tlds: { allow: ['com', 'net'] } }).required(),
    password: Joi.string().pattern(new RegExp('^[a-zA-Z0-9]{3,30}$')).required(),
    size_of_all_docs: Joi.number().required(),
    blocked: Joi.boolean().required(),
})

// Add a new user 
export const createNewUser = async (req, res) =>{

    const result = schema.validate(req.body);
    if (result.error) return res.status(400).send(result.error.details[0].message);

    const gen = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(req.body.password, gen);
 
    let newUser = new User({
        username: req.body.pseudo,
        email: req.body.email,
        password: hashedPassword,
        size_of_all_docs: req.body.size_of_all_docs,
        blocked: req.body.blocked
    });

    try{
        const saveUser =  await newUser.save();
        res.json(saveUser)
    }
    catch(err){res.status(400).send(err)}
};

// Get all users
export const getUsers = (req, res) =>{

    User.find({}, (err, user) =>{
        if (err){
            res.send(err);
        }
        res.json(user);
    });
};

// Get a user by id
export const getUserById = (req, res) =>{

    User.findById(req.params.id, (err, user) =>{
        if (err){
            res.send(err);
        }
        res.json(user);
    });
};

// Update a user
export const updateUser = (req, res) =>{

    User.findOneAndUpdate({_id: req.params.id}, req.body, { new: true }, (err, user) =>{
        if (err){
            res.send(err);
        }
        res.json(user);
    });
};

// Delete a user
export const deleteUser = (req, res) =>{

    User.remove({_id: req.params.id}, (err, user) =>{
        if (err){
            res.send(err);
        }
        res.json({ message: 'User deleted successfully'});
    });
};


