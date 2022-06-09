<template>
  <ion-page  id="container">
    <ion-content>
      <div id="img">
          <ion-img src="/assets/welcome.png"></ion-img>
      </div>
       <div>
        <p class="error-msg">{{errorMessage}}</p>
      </div>
      <ion-item class="form-marg">
        <ion-label position="floating">Adresse email</ion-label>
        <ion-input type="email" v-model="email"></ion-input>
      </ion-item>
      <ion-item class="form-marg">
        <ion-label position="floating">Mot de passe</ion-label>
        <ion-input type="password" v-model="password"></ion-input>
      </ion-item>
       <ion-button shape="round" expand="block" id="login" @click="loginUser()">Se connecter</ion-button>
       <ion-button id="register" type="submit" href="/user/register">S'inscrire</ion-button>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">

import { defineComponent } from 'vue';
import { IonPage, IonImg, IonContent, IonButton, IonLabel, IonInput, IonItem } from '@ionic/vue';
import axios from 'axios';

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
  },

  data(){
    return {
      email: null,
      password: null,
      errorMessage: "",
    }
  },
  
  methods:{

    // This func register user in db
    loginUser(){

      axios.post('http://localhost:3000/api/v1/login', {
        email: this.email,
        password: this.password,
      }, {headers: {'Access-Control-Allow-Origin': '*'}})
      .then( (response) => {
        if (response.status == 200){
          localStorage.setItem('auth-token', response.data.myToken);
          localStorage.setItem('userId', response.data.userId);
          let authToken = localStorage.getItem('auth-token');
          if (authToken != "" || authToken != null){
            this.$router.push("/auth/home")
          }
          return;
        }
        this.errorMessage = response.data;
      })
      .catch( (error) => {
        if (error.response.status == 400){
          this.errorMessage = error.response.data;
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
ion-button#login{
  margin: 50px 20px;
  --background:#0052cc;
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
.error-msg{
  color: red;
  padding-left: 30px;
}
</style>
