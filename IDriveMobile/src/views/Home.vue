<template>
  <ion-page>
    <ion-content>
       <ion-fab vertical="bottom" horizontal="center" slot="fixed">
          <ion-fab-button type="submit" ref="form" @click="toOpen()">
            <ion-icon :icon="addOutline"></ion-icon>
          </ion-fab-button>
           <input type="file" name="file" @change="uploadFile($event)" >
          <!-- <form method="post" enctype="multipart/form-data" action="http://localhost:3000/api/v1/upload">
           
            <input type="submit" id="submit">
          </form> -->
         
        </ion-fab>
        <div id="container">
          <ion-list>
            <ion-title id="title">Tous vos documents</ion-title>
            <ion-item v-for="item in folders" :key="item.title">
              <ion-img src="/assets/pdf.png"></ion-img>
              <ion-label class="folder-title">
              {{item.title}}
              </ion-label>
              <ion-button size="small" type="upload" color="medium">Voir</ion-button>
            </ion-item>
          </ion-list>
        </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">

import { defineComponent, ref } from 'vue';
import { IonPage, IonIcon, IonFab, IonFabButton, IonContent, IonList, IonTitle, IonItem, IonLabel, IonButton, IonImg} from '@ionic/vue';
import { homeOutline, personOutline, addOutline, documentAttachOutline } from 'ionicons/icons';
import axios from 'axios';

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
    IonImg
  },
  data(){
    return{
      file: ""
    }
  },
  methods:{

    toOpen(){
      let input = document.getElementById("input-file");
      input?.click();
    },

    uploadFile(event:any){

      this.file = event.target.files[0];
      let fileName = event.target.files[0].name;
      let type =  event.target.files[0].type;
      let lastModified = event.target.files[0].lastModified;
      let lastModifiedDate = event.target.files[0].lastModifiedDate;
      let size = event.target.files[0].size;

      //Sending file in backend api
      axios.post('http://localhost:3000/api/v1/upload', {
          file: this.file,
          fileName: fileName,
          type: type,
          size: size,
          lastModifiedDate: lastModifiedDate,
          lastModified: lastModified
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
  top: 20%;
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
</style>
