<template>
    <ion-router-outlet></ion-router-outlet>   
</template>

<script lang="ts">
import { IonRouterOutlet } from '@ionic/vue';
import { defineComponent, ref } from 'vue';
// import { useRoute } from 'vue-router';

export default defineComponent({
  name: 'App',
  components: {
    IonRouterOutlet, 
  },
  setup() {
    return { 
      
    }
  }
});
</script>

<style scoped>
  
</style>
