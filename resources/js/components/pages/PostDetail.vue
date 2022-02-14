<template>
  <div class="container">
    <h1> {{post.title}} </h1>
    <p>  {{post.content}} </p>
  </div>
</template>

<script>
export default {
  name: 'PostDetail',
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts/',
      post: {
        title: '',
        content: '',
      }
    }
  
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
        .then(res =>{
          this.post = res.data;
          console.log(this.post );
        })
    }
  },
  mounted(){
    this.getApi();
    console.log(this.$route.params.slug);
  }

}
</script>

<style>

</style>