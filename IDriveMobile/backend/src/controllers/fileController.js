
import initCon from '../../db.js';
import uploadMiddleware from '../middleware/fileUpload.js'

export const  uploadFile = async (req, res) =>{

    try {
        await uploadMiddleware(req, res);
      
        if (req.file == undefined) {
            return res.status(400).send({ message: "Mauvais fichier" });
        }

        
        let fileName = req.body.fileName;
        let type =  req.body.type;
        let lastModifiedDate = req.body.lastModifiedDate;
        let size = req.body.size;
        //Modified filename
        let file_path = req.file.filename;
        let userId =  req.body.userId;

        initCon.connect(function() {

            var sql = `INSERT INTO docs (nom, user_id, upload_date, size, file_type, file_path) VALUES ('${fileName}','${userId}','${lastModifiedDate}', '${size}', '${type}', '${file_path}')`;
            initCon.query(sql, function (err) {
                if (err) throw err;
                return res.status(200).send({ message: "Fichier ajouté" })
            });
    
          });
    } catch (err) {
        res.status(500).send({
            message: `Erreur lors de l'upload de : ${req.file.originalname}. ${err}`,
        });
    }
    
};

