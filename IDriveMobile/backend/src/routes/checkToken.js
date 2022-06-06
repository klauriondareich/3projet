import jwt from 'jsonwebtoken';

export const  authorization = (req, res, next) => {

    const token = req.header('auth-token');
    if (!token) return res.status(401).send("No token found. ACCESS DENIED!");

    try{
        const checked = jwt.verify(token, "kld1SGSAHJLZHZZ");
        req.user = checked;
        next();
    }
    catch (err){
        res.status(400).send("Token is invalid");
    }
}