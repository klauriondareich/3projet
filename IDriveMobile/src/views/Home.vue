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
            <div>

            </div>
            <ion-card >
                <ion-card-header>
                  <ion-card-title>Espace de stockage : {{getSpaceUsed()}}% utilisé</ion-card-title>
                </ion-card-header>
                <ion-progress-bar color="primary" :value="getSpaceUsed()"></ion-progress-bar>
            </ion-card>
          <ion-list>
            <ion-title id="title">Tous vos documents</ion-title>
            <ion-item v-for="item in allFiles" :key="item.id">
              <ion-thumbnail slot="start">
                <ion-img v-if="getFileType(item.file_type) == 'application'" src="/assets/pdf.png"></ion-img>
                <ion-img v-if="getFileType(item.file_type) == 'image'" :src="'/uploads/' + item.file_path"></ion-img>
              </ion-thumbnail>
              <ion-badge color="primary">{{Math.round(item.size/1000)}} Ko</ion-badge>
              <ion-label class="folder-title">
              {{item.nom}}
              </ion-label>
              <ion-button size="small" :href="'/uploads/' + item.file_path" type="upload" color="medium">Voir</ion-button>
            </ion-item>
          </ion-list>
        </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">

import { defineComponent, ref } from 'vue';
import { IonPage, IonIcon, IonFab, IonFabButton, IonCardHeader,
    IonCardTitle, IonCard,IonContent, IonList, IonTitle, IonItem, IonLabel, IonButton, IonImg, IonThumbnail} from '@ionic/vue';
import { homeOutline, personOutline, addOutline, documentAttachOutline } from 'ionicons/icons';
import axios from 'axios';'../.'

export default defineComponent({
  name: 'HomePage',
  components: {
    IonPage,
    IonIcon, 
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
    IonCard
  },
  data(){
    return {
      file: "", 
      allFiles: [
        {id: null, file_type: "", size: 0, nom: "", file_path: ""}
      ]
    }
  },
  methods:{

    toOpen(){
      let input = document.getElementById("input-file");
      input?.click();
    },

    getFileType(file:any){
      return file.split("/")[0];
    },

    getSpaceUsed(){
      return (this.allFiles.length/100).toFixed(2);
    },

    uploadFile(event:any){

      this.file = event.target.files[0];
      let fileName = event.target.files[0].name;
      let type =  event.target.files[0].type;
      let lastModified = event.target.files[0].lastModified;
      let lastModifiedDate = event.target.files[0].lastModifiedDate;
      let size = event.target.files[0].size;
      let userId =  localStorage.getItem('userId');

      //Sending file in backend api
      axios.post('http://localhost:3000/api/v1/upload', {
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
          console.log("response", response)
        }
        // this.errorMessage = response.data;
      })
      .catch( (error) => {
        if (error.response.status == 400){
         console.log(error.response.data);
        }});
    }
    
  },
  created(){
    let token = localStorage.getItem("auth-token") || "";
    let userId = localStorage.getItem("userId") || "";

    axios.get('http://localhost:3000/api/v1/files/all', {headers: {'Access-Control-Allow-Origin': '*', 'userId': userId, 'auth-token': token}})
      .then( (response) => {
        if (response.status == 200){
          this.allFiles = response.data;
          console.log("response", response)
        }
        // this.errorMessage = response.data;
      })
      // .catch( (error) => {
      //   if (error.response.status == 400){
      //     this.errorMessage = error.response.data;
      //   }});
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
  position: absolute;
  left: 0;
  right: 0;
  top: 40%;
  transform: translateY(-50%);
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
</style>
