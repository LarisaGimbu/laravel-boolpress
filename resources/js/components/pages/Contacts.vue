<template>
  <div class="container">
    <h1>Contacts</h1>
    <div class="form">
      <form action="">
        <div class="field">
          <label for="">Nome</label>
          <input type="text">
        </div>
        <div class="field">
          <label for="">Email</label>
          <input type="email">
        </div>
        <div class="field">
          <label for="">Messaggio</label>
          <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="invia">Invia</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home'
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