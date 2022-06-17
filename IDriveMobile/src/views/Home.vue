<template>
  <ion-page>
    <ion-content>
    
       <ion-fab vertical="bottom" horizontal="center" slot="fixed">
          <ion-fab-button type="submit" ref="form" @click="toOpen()">
            <ion-icon :icon="addOutline"></ion-icon>
          </ion-fab-button>
           <input type="file" name="file" @change="uploadFile($event)" id="input-file">
         
        </ion-fab>
        <div id="container">
          
            <ion-card >
                <ion-card-header>
                  <ion-card-title>Espace de stockage : {{getSpaceUsed()}}% utilisé</ion-card-title>
                </ion-card-header>
                <ion-progress-bar color="primary" :value="getSpaceUsed()"></ion-progress-bar>
            </ion-card>
          <ion-list>
            <ion-title id="title">Tous vos fichiers</ion-title>

             <p class="error-msg">{{errorMessage}}</p>
             <p v-if="allFiles.length == 0" class="error-msg">Aucun fichier pour l'instant</p>
            <!-- Modal -->

            <ion-modal :is-open="isOpen">
              <ion-content>
                  <ion-button size="small" style="float:right;" @click="isCloseFunc()" color="medium">Fermer</ion-button>

                  <!-- /PDF Viewer -->
                  <pdf v-if="fileInfo.file_type == 'application/pdf'" style="margin-top: 50px" :src="'/uploads/' + fileInfo.file_path">
                    <template slot="loading">
                      loading content here...
                    </template>
                   </pdf>

                   <!-- Vido player -->
                    <video style="margin-top: 20px" width="320" height="240" controls autoplay v-if="getFileType(fileInfo.file_type) == 'video'">
                        <source :src="'/uploads/' + fileInfo.file_path" type="video/mp4">
                    </video>

                  <ion-img style="margin-top: 20px" v-if="getFileType(fileInfo.file_type) == 'image'" :src="'/uploads/' + fileInfo.file_path"></ion-img>
                  <ion-item>Fichier : {{fileInfo.nom}}</ion-item>
                  <ion-item>Type : {{fileInfo.file_type}}</ion-item>
                  <ion-item>Taille : <ion-badge color="secondary">{{Math.round(fileInfo.size/1000)}} Ko</ion-badge></ion-item>
                  <ion-item>Date d'ajout : {{new Date(fileInfo.upload_date)}}</ion-item>
                  
              </ion-content>
            </ion-modal>

             <!-- Modal end-->
            <!-- <ion-img style="margin-top: 20px" src=" /uploads/haruo.webp"></ion-img> -->

            <ion-item v-for="item in allFiles" :key="item.id">
              <ion-thumbnail slot="start">
                <ion-img v-if="getFileType(item.file_type) == 'application'" src="/assets/doc.png"></ion-img>
                <ion-img v-if="getFileType(item.file_type) == 'image'" :src="'/uploads/' + item.file_path"></ion-img>
                <ion-img v-if="getFileType(item.file_type) == 'video'" src="/assets/video.png"></ion-img>
              </ion-thumbnail>
              <ion-badge color="secondary">{{Math.round(item.size/1000)}} Ko</ion-badge>
              <ion-label class="folder-title">
              {{item.nom}}
              </ion-label>
              <ion-button size="small" @click="previewFile(item)" color="medium">Voir</ion-button>
            </ion-item>

                     
          </ion-list>
        </div>
    </ion-content>
  </ion-page>
</template>

<script>

import { defineComponent } from 'vue';
import { IonPage, IonModal, IonIcon, IonFab, IonFabButton, IonCardHeader,
    IonCardTitle, IonCard,IonContent, IonList, IonTitle, IonItem, IonLabel, IonButton, IonImg, IonThumbnail} from '@ionic/vue';
import { homeOutline, personOutline, addOutline, documentAttachOutline } from 'ionicons/icons';
import axios from 'axios';
import config from '../env';
import pdf from 'pdfvuer'
import 'pdfjs-dist/build/pdf.worker.entry'

export default defineComponent({
  name: 'HomePage',
  components: {
    IonPage,
    IonIcon, 
    IonModal,
    IonFab,
    IonFabButton,
    IonContent,
    IonList,
    IonTitle,
    IonItem,
    IonLabel,
    IonButton,
    IonImg,
    IonThumbnail,
    IonCardHeader,
    IonCardTitle,
    IonCard,
    pdf,
  },
  data(){
    return {
      file: "", 
      isOpen: false,
      fileInfo: {},
      errorMessage: null,
      allFiles: [
        {id: null, file_type: "", size: 0, nom: "", file_path: ""}
      ]
    }
  },
  methods:{

    // open modal
    isOpenFunc(){
      this.isOpen = true;
    },

    // Close modal
    isCloseFunc(){
      this.isOpen = false;
    },
    
    // preview file
    previewFile(data){
      this.fileInfo = data;
      this.isOpenFunc()
    },

    openPdf(filePath){
      let fullPath = this.file.applicationDirectory + '/uploads/' + filePath;
      console.log("fullpath", fullPath)
      // this.document.viewDocument(fullPath, `application/pdf`);
    },

    toOpen(){
      let input = document.getElementById("input-file");
      input?.click();
    },

    getFileType(file){
      return file.split("/")[0];
    },

    getSpaceUsed(){
      return (this.allFiles.length/100).toFixed(2);
    },

    uploadFile(event){

      this.file = event.target.files[0];
      let fileName = event.target.files[0].name;
      let type =  event.target.files[0].type;
      let lastModified = event.target.files[0].lastModified;
      let lastModifiedDate = event.target.files[0].lastModifiedDate;
      let size = event.target.files[0].size;
      let userId =  localStorage.getItem('userId');

      //Sending file in backend api
      axios.post(config.HOST_URL + '/api/v1/upload', {
          file: this.file,
          fileName: fileName,
          type: type,
          size: size,
          lastModifiedDate: lastModifiedDate,
          lastModified: lastModified,
          userId: userId
        }, {headers: {
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'multipart/form-data'
        }})
      .then( (response) => {
        if (response.status == 200){
           let token = localStorage.getItem("auth-token") || "";
           let userId = localStorage.getItem("userId") || "";
           this.getAllFiles(token, userId);
        }
      })
      .catch( (error) => {
        if (error.response.status == 400){
         console.log(error.response.data);
        }});
    },


    // Getting all files from the api
    
    getAllFiles(token, userId){
      axios.get(config.HOST_URL + '/api/v1/files/all', {headers: {'Access-Control-Allow-Origin': '*', 'userId': userId, 'auth-token': token}})
      .then( (response) => {
        if (response.status == 200){
          this.allFiles = response.data;
          console.log("All files retrieved")
        }
        this.errorMessage = response.data.message;
      })
      .catch( (error) => {
        if (error.response.status == 400){
          this.errorMessage = error.response.data.message;
        }});
    }
    
  },
  created(){
    let token = localStorage.getItem("auth-token") || "";
    let userId = localStorage.getItem("userId") || "";

    this.getAllFiles(token, userId);
  },
  setup() {

     const folders = [
       {title: "fichier 1"},
       {title: "fichier 2"},
     ]

    const changeListener = ()=>{
     console.log("called")
    }
    return {  
      folders,
      changeListener,
      homeOutline,
      personOutline,
      addOutline,
      documentAttachOutline
    }
  },
});
</script>

<style scoped>
.folder-title{
  padding-left: 20px;
  font-weight: bold;
  color: rgb(51, 49, 49);
}
#add{
  margin-top: 25px;
}
#container {
  text-align: center;
  padding-top: 100px;
}
#title{
  font-weight: bold;
  text-align: left;
  margin-bottom: 30px;
  padding-left: 10px;
  border-left: 2px solid #111;
  margin-left: 20px;
  margin-top: 25px;
}
ion-fab-button{
  --background:#0052cc;
}
#input-file{
  visibility: hidden;
}
#form-hide{
  visibility: hidden;
}
image{
  height: 10px;
}
ion-card{
  --background: #fff;
}
.error-msg{
  color: red;
  padding-left: 30px;
}
</style>
