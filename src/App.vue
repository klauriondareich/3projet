<template>
  <ion-app>
     <ion-page>
        <ion-tabs>
            <ion-tab-bar slot="bottom">
               <ion-tab-button tab="home" href="/auth/home" :class="isSelected">
                 <ion-icon :icon="homeSharp"></ion-icon>
                <ion-label>Accueil</ion-label>
              </ion-tab-button>

              <ion-tab-button tab="documents" href="/auth/documents">
                 <ion-icon :icon="documentSharp"></ion-icon>
                <ion-label>Mes Documents</ion-label>
              </ion-tab-button>

              <ion-tab-button tab="account" href="/auth/account">
                 <ion-icon :icon="personSharp"></ion-icon>
                <ion-label>Mon compte</ion-label>
              </ion-tab-button>
            </ion-tab-bar>
            <ion-router-outlet></ion-router-outlet>
        </ion-tabs>
      
    </ion-page>
  </ion-app>
</template>

<script lang="ts">
import { IonApp, IonTabButton, IonTabs,IonTabBar, IonIcon, IonLabel, IonRouterOutlet } from '@ionic/vue';
import { defineComponent, ref } from 'vue';
import { useRoute } from 'vue-router';
import { calendar, homeSharp, personSharp, documentSharp } from 'ionicons/icons';

export default defineComponent({
  name: 'App',
  components: {
    IonApp, 
    IonLabel,
    IonTabButton,
    IonTabBar,
    IonTabs,
    IonIcon, 
    IonRouterOutlet, 
  },
  setup() {
    const selectedIndex = ref(0);
    const appPages = [
      {
        title: 'Accueil',
        url: '/auth/home',
        iosIcon: homeSharp,
        mdIcon: homeSharp
      },
      {
        title: 'Mes documents',
        url: '/auth/documents',
        iosIcon: documentSharp,
        mdIcon: documentSharp
      },
      {
        title: 'Mon compte',
        url: '/auth/account',
        iosIcon: personSharp,
        mdIcon: personSharp
      }
    ];
    
    const route = useRoute();
    
    return { 
      selectedIndex,
      appPages, 
      homeSharp,
      personSharp,
      documentSharp
    }
  }
});
</script>

<style scoped>

  ion-tab-bar{
    background-color: red;
     padding: 10px;
  }
  ion-tab-button{
    background-color: red;
  }
  ion-icon{
    color: #fff;
  }
  ion-label{
    color: #fff;
    font-size: 15px;
  }
  .selected{
    background-color: blue;
  }
</style>
