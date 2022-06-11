<template>
  <ion-page>
    <ion-content>
      <div id="container">
          <ion-card>
               <div id="img">
                <ion-img src="/assets/user.png"></ion-img>
              </div>
              <ion-card-header>
                <ion-card-title>Information de l'utilisateur</ion-card-title>
              </ion-card-header>
              <ion-list>
                  <ion-item>Nom d'utilisateur : {{userInfo.username}}</ion-item>
                  <ion-item>Email : {{userInfo.email}}</ion-item>
                  <ion-item>Status :
                    <ion-badge v-if="userInfo.blocked == 0" color="success">Activé</ion-badge>
                    <ion-badge v-if="userInfo.blocked == 1" color="danger">Désactivé</ion-badge>
                  </ion-item>
              </ion-list>
              <ion-button @click="logout()">Se déconnecter</ion-button>
            </ion-card>
      </div>
    </ion-content>
  </ion-page>
</template>

<script>

import { defineComponent } from 'vue';
import { IonPage, IonCard, IonCardHeader, IonList, IonItem, IonContent } from '@ionic/vue';
import axios from 'axios';
import config from '../env';


export default defineComponent({
  name: 'AccountPage',
  components: {
    IonPage,
    IonCard,
    IonCardHeader,
    IonList,
    IonItem,
    IonContent
  },
  data(){
    return {
      userInfo:{},
      errorMessage: null,

    }
  },
  methods:{
    logout(){
      localStorage.removeItem("auth-token");
      this.$router.push("/user/login")
    }
  },

  created(){
    let token = localStorage.getItem("auth-token") || "";
    let userId = localStorage.getItem("userId") || "";

    axios.get(config.HOST_URL + '/api/v1/current_user', {headers: {'Access-Control-Allow-Origin': '*', 'userId': userId, 'auth-token': token}})
      .then( (response) => {
        if (response.status == 200){
          this.userInfo = response.data;
        }
      })
      .catch( (error) => {
        if (error.response.status == 400){
          this.errorMessage = error.response.data.message;
        }});
  },
});
</script>

<style scoped>
#container {
  text-align: center;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}
div#img{
  width: 100px;
  height: 100px;
  margin: auto;
}
ion-card{
  padding-top: 30px;
}
ion-button{
  margin-top: 20px;
  margin-bottom: 20px;
}
</style>
