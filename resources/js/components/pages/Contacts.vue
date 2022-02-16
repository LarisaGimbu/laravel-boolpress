<template>
  <div class="container">
    <h1>Contacts</h1>
    <div class="form">
      <form @submit.prevent="sendForm">
        <div class="field">
          <label for="name">Nome</label>
          <input type="text" id="name" v-model="name">
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" v-model="email">
        </div>
        <div class="field">
          <label for="message">Messaggio</label>
          <textarea name="" id="message" v-model="message" cols="30" rows="10"></textarea>
        </div>
        <button class="invia">Invia</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data(){
    return{
      name: '',
      email: '',
      message: ''
    }
  },
  methods:{
    sendForm(){
      console.log('inviato');
    }
  }
}
</script>

<style lang="scss" scoped>
.form{
  .field{
    label{
      display: block;
      padding: 10px 0;
    }
  }
  .invia{
    padding: 5px 7px;
    margin: 10px 0;
  }
}

</style>