<template>
     <ion-page>
        <ion-header collapse="fade">
          <div>
              <ion-title>IDrive Mobile</ion-title>
          </div>
        
        </ion-header>
        <ion-tabs>
            <ion-tab-bar slot="bottom">
               <ion-tab-button tab="home" href="/auth/home">
                 <ion-icon :icon="homeOutline"></ion-icon>
                <ion-label>Accueil</ion-label>
              </ion-tab-button>

              <ion-tab-button tab="account" href="/auth/account">
                 <ion-icon :icon="personOutline"></ion-icon>
                <ion-label>Mon compte</ion-label>
              </ion-tab-button>
            </ion-tab-bar>
            <ion-router-outlet></ion-router-outlet>
        </ion-tabs>
      
    </ion-page>
</template>
<script lang="ts">
import {IonTitle, IonPage, IonTabButton, IonTabs,IonTabBar, IonIcon, IonLabel, IonRouterOutlet, IonHeader } from '@ionic/vue';
import { defineComponent, ref } from 'vue';
import { homeOutline, personOutline, documentAttachOutline } from 'ionicons/icons';

export default defineComponent({
  name: 'App',
  components: {
    IonLabel,
    IonTabButton,
    IonTabBar,
    IonTabs,
    IonIcon, 
    IonHeader,
    IonTitle, 
    IonPage,
    IonRouterOutlet, 
  },
  setup() {

    const selectedIndex = ref(0);
    
    return { 
      selectedIndex,
      // appPages, 
      homeOutline,
      personOutline,
      documentAttachOutline
    }
  }
});
</script>

<style scoped>

  ion-tab-bar{
    background-color: #f7f7f7;
     padding: 10px;
     border-radius: 10px;
  }
  ion-tab-button{
    background-color: #f7f7f7;
  }
  ion-tab-button ion-icon{
    color: #0052cc;
  }
  ion-label{
    color: rgb(51, 49, 49);
    font-size: 13px;
    font-weight: bold;
  }
  /* .selected{
    background-color: blue;
  } */
  ion-app{
    background-color: #F2F2F2;
  }
  ion-header{
    background: url('../../public/assets/bg.png');
    padding: 20px;
  }
  ion-title{
    font-size: 18px;
    color: #fff;
  }
  div#header{
    background: #0052cc!important;
  }
  div#subheader ion-title{
    text-align: left;
    font-weight: normal;
    padding-top: 30px;
  }
  
</style>