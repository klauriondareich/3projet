import { uploadFile } from '../controllers/fileController.js';
import { loginUser, registerUser } from '../controllers/authController.js';
// import { authorization } from '../routes/checkToken.js';

const routes = (app) => {

    // Login user

    app.route('/api/v1/login')
    .post(loginUser);

     // register user
    app.route('/api/v1/register')
    .post(registerUser);

    app.route('/api/v1/upload')
    .post(uploadFile);
    //authorization
}

export default routes;