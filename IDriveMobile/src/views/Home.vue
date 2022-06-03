<template>
  <ion-page>
    <ion-content>
       <ion-fab vertical="bottom" horizontal="center" slot="fixed">
          <ion-fab-button>
            <ion-icon :icon="addOutline"></ion-icon>
          </ion-fab-button>
         

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

import { defineComponent } from 'vue';
import { IonPage, IonIcon, IonFab } from '@ionic/vue';
import { homeOutline, personOutline, addOutline, documentAttachOutline } from 'ionicons/icons';

export default defineComponent({
  name: 'FolderPage',
  components: {
    IonPage,
    IonIcon, 
    IonFab
  },
   setup() {
     const folders = [
       {title: "Dossier 1"},
       {title: "Dossier 2"},
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
</style>
