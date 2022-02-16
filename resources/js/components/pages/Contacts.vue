<template>
  <div class="container">
    <h1>Contacts</h1>
    <h3 class="success" v-if="success">Email inviata correttamente.</h3>

    <div class="form">
      <form @submit.prevent="sendForm">
        <div class="field">
          <label for="name">Nome</label>
          <input type="text" id="name" v-model="name">
          <p class="errors" v-if="errors.name"> {{errors.name[0]}} </p>
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" v-model="email">
          <p class="errors" v-if="errors.name"> {{errors.email[0]}} </p>
        </div>
        <div class="field">
          <label for="message">Messaggio</label>
          <textarea name="" id="message" v-model="message" cols="30" rows="10"></textarea>
          <p class="errors" v-if="errors.name"> {{errors.message[0]}} </p>
        </div>
        <button type="submit" :disabled="sending" class="invia">{{sending ? "invio in corso" : "Invia"}}</button>
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
      message: '',
      errors: {},
      sending: false,
      success: false
    }
  },
  methods:{
    sendForm(){
      this.sending = true;
      this.success = false;
      axios.post('api/contacts', {
        'name' : this.name,
        'email' : this.email,
        'message' : this.message
      }).then(res =>{
        this.sending = false;
        if(!res.data.success){
          this.errors = res.data.errors;
        }else{
          this.errors = {};
          this.success = true;
          this.name = '';
          this.email = '';
          this.message = '';
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.success{
  color: green;
}
.form{
  .field{
    label{
      display: block;
      padding: 10px 0;
    }
    .errors{
      color: red;
      font-size: 10px;
    }
  }
  .invia{
    padding: 5px 7px;
    margin: 10px 0;
  }
}

</style>