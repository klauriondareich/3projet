<template>
  <ion-page  id="container">
    <ion-content>
      <div id="img">
          <ion-img src="/assets/new-message.png"></ion-img>
      </div>
      <div>
        <p class="error-msg">{{errorMessage}}</p>
         <p class="success-msg">{{successMessage}}</p>
      </div>
       <ion-item class="form-marg">
        <ion-label position="floating">Nom d'utilisateur</ion-label>
        <ion-input type="text" v-model="username"></ion-input>
      </ion-item>
      <ion-item class="form-marg">
        <ion-label position="floating">Adresse email</ion-label>
        <ion-input type="email" v-model="email"></ion-input>
      </ion-item>
      <ion-item class="form-marg">
        <ion-label position="floating">Mot de passe</ion-label>
        <ion-input type="password" v-model="password"></ion-input>
      </ion-item>
       <ion-button shape="round" expand="block" type="submit" id="register" @click="registerUser()">S'inscrire</ion-button>
       <ion-button id="login" href="/user/login">Se connecter</ion-button>
    </ion-content>
  </ion-page>
</template>

<script>
/* eslint-disable */
import { defineComponent } from 'vue';
import { IonPage, IonImg, IonContent, IonButton, IonLabel, IonInput, IonItem } from '@ionic/vue';
import axios from 'axios';
import config from '../env';


export default defineComponent({
  name: 'RegisterPage',
  components: {
    IonPage,
    IonImg,
    IonContent,
    IonButton,
    IonLabel,
    IonInput, 
    IonItem
  },
  data(){
    return {
      username: null,
      email: null,
      password: null,
      errorMessage: "",
      successMessage: ""
    }
  },

  methods:{

    // This func register user in db
    registerUser(){

     axios.post(config.HOST_URL + '/api/v1/register', {
        username: this.username,
        email: this.email,
        password: this.password,
        size_of_all_docs: 0,
        blocked: false
    }, {headers: {'Access-Control-Allow-Origin': '*'}})
    .then( (response) => {
    
      if (response.status == 200){
        this.successMessage = response.data.message;
        this.errorMessage = "";
        return;
      }
      this.errorMessage = response.data.message;
    })
    .catch( (error) => {
      if (error.response.status == 400){
        this.errorMessage = error.response.data.message;
      }});

    }
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
ion-button#register{
  margin: 50px 20px;
  --background:#0052cc;
  --padding-top: 25px;
  --padding-bottom: 20px;
}
ion-button#login{
  --background:transparent;
  --color: #0455BF;
  margin: 0px 140px;
  margin-bottom: 30px;
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
.error-msg{
  color: red;
  padding-left: 30px;
}
.success-msg{
  color: green;
  padding-left: 30px;
}
</style>
