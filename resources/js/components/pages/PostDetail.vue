<template>
  <div class="container">
    <h1> {{post.title}} </h1>
    <h3 v-if="post.category"> {{post.category.name}} </h3>
    <div v-if="post.tags">
      <span class="tag"
        v-for="(tag, index) in post.tags"
        :key="`tag${index}`"> {{tag.name}} </span>
    </div>
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

<style lang='scss' scoped>
h1{
  margin-top: 20px;
}
h3{
  margin: 5px 0;
  color: rgb(97, 97, 97);
}
.tag{
    display: inline-block;
    margin: 5px 5px 10px 0;
    padding: 4px 8px;
    font-size: 10px;
    background-color: rgb(85, 136, 138);
    color: white;
    border-radius: 6px;
}
</style>