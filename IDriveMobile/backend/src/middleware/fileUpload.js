import util from 'util';
import multer from 'multer';

let __basedir = "C:/Projets/3proj/i-drive-mobile/IDriveMobile/public";

let storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, __basedir + "/uploads");
  },
  filename: (req, file, cb) => {
    cb(null,  Date.now() + '-'+ file.originalname );
  },
});
let uploadFile = multer({
  storage: storage,
}).single("file");
let uploadFileMiddleware = util.promisify(uploadFile);

export default uploadFileMiddleware;