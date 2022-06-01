<template>
  <ion-page  id="container">
    <ion-content>
      <div id="img">
          <ion-img src="/assets/welcome.png"></ion-img>
      </div>
      <ion-item class="form-marg">
        <ion-label position="floating">Adresse email</ion-label>
        <ion-input type="email"></ion-input>
      </ion-item>
      <ion-item class="form-marg">
        <ion-label position="floating">Mot de passe</ion-label>
        <ion-input type="password"></ion-input>
      </ion-item>
       <ion-button shape="round" expand="block" type="submit" id="login">Se connecter</ion-button>
       <ion-button id="register" href="/user/register">S'inscrire</ion-button>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">

import { defineComponent } from 'vue';
import { IonPage, IonImg, IonContent, IonButton, IonLabel, IonInput, IonItem } from '@ionic/vue';

export default defineComponent({
  name: 'LoginPage',
  components: {
    IonPage,
    IonImg,
    IonContent,
    IonButton,
    IonLabel,
    IonInput, 
    IonItem
  }
});
</script>

<style scoped>
#container {
  padding-top: 20%;
}
.form-marg{
  margin: 20px;
}
ion-button#login{
  margin: 50px 20px;
  --background:#3dc2ff;
  --padding-top: 25px;
  --padding-bottom: 20px;
}
ion-button#register{
  --background:transparent;
  --color: #0455BF;
  margin: 0px 140px;
}

ion-label{
  font-weight: bold;
  color: #7d7e80!important;
}
div#img{
  width: 250px;
  height: 250px;
  margin: auto;
}
</style>
