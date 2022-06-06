import mongoose from "mongoose";

const Schema = mongoose.Schema;

export const UsersSchema = new Schema({

    username:{
        type: String,
        required: "a user must have a pseudo"
    },
    email:{
        type: String,
        required: "a user must have an email address"
    },
    password:{
        type: String,
        required: "a user must have a password"
    },
    size_of_all_docs:{type: Number},
    blocked:{type: Boolean},
    // created_at:{
    //     type: Date,
    //     default: Date.now
    // }
})