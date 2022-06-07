import { createNewUser, deleteUser, getUserById, getUsers, updateUser } from '../controllers/usersController.js';
import { createNewRover, deleteRover, getRoverById, getRovers, updateRover } from '../controllers/roverController.js';
import { createNewMission, deleteMission, getMissionById, getMissions, updateMission } from '../controllers/missionController.js';
import { loginUser, registerUser } from '../controllers/authController.js';
import { authorization } from '../routes/checkToken.js';

const routes = (app) => {

    // Login user

    app.route('/api/v1/login')
    .post(loginUser);

    app.route('/api/v1/register')
    .post(registerUser);

    // User management routes
    
    app.route('/user/all')
    .get((req, res, next) =>
     {
        // Middleware
        
        next();
    }, getUsers);

    
    app.route('/user/create')
    .post(authorization, createNewUser);

    app.route('/user/view/:id')
    .get(getUserById);

    app.route('/user/update/:id')
    .put(authorization, updateUser);

    app.route('/user/delete/:id')
    .delete(authorization, deleteUser);


    // Rover CRUD

    app.route('/rover/all/:sortBy/:sortType/:limit')
    .get((req, res, next) =>
    {
        // Middleware
        console.log(`Request : ${req.originalUrl}`)
        console.log(`Request : ${req.method}`);
        next();
    }, getRovers);

    app.route('/rover/create')
    .post(authorization, createNewRover);

    app.route('/rover/view/:roverId')
    .get(getRoverById);

    app.route('/rover/update/:roverId')
    .put(authorization, updateRover);

    app.route('/rover/delete/:roverId')
    .delete(authorization, deleteRover);


    // Mission CRUD

    app.route('/mission/all/:sortBy/:sortType')
    .get((req, res, next) =>
    {
        // Middleware
        console.log(`Request : ${req.originalUrl}`)
        console.log(`Request : ${req.method}`);
        next();
    }, getMissions);

    app.route('/mission/create')
    .post(authorization, createNewMission);

    app.route('/mission/view/:missionId')
    .get(getMissionById);

    app.route('/mission/update/:missionId')
    .put(authorization, updateMission);

    app.route('/mission/delete/:missionId')
    .delete(authorization, deleteMission);

}

export default routes;