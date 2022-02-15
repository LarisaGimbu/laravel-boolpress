<template>
<main class="container">
  <div v-if="success" class="container-posts">
    <div v-if="posts">
      <h2> {{title}} </h2>
      <PostItem 
        v-for="post in posts"
        :key="post.id"
        :post="post" />

      <div v-if="globalPosts">
        <button
        @click="getPosts(pagination.current -1)"
        :disabled="pagination.current === 1">
          <<
        </button>

        <button
        v-for="i in pagination.last"
        :key="i"
        @click="getPosts(i)"
        :disabled="pagination.current === i">
          {{i}}
        </button>

        <button
        @click="getPosts(pagination.current +1)"
        :disabled="pagination.current === pagination.last">
          >>
        </button>
      </div>
    </div>
    <div v-else><h3>LOADING...</h3></div>
  </div>
  <div v-else> {{error_msg}} </div>

  <Sidebar 
    :tags="tags"
    :categories="categories"
    @getPostCategory="getPostCategory"
    @getPostTag="getPostTag"
    @getAllPosts="getPosts"/>
</main>
  
</template>

<script>
import PostItem from './partials/PostItem.vue'
import Sidebar from './partials/Sidebar.vue'

export default {
  name: 'Posts',
  components:{
    PostItem,
    Sidebar
  },
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts',
      posts: null,
      pagination: {},
      tags:[],
      categories: [],
      success: true,
      error_msg: '',
      title: 'I miei post:',
      globalPosts: true
    }
  },
  mounted(){
    this.getPosts();
  },
  methods:{
    getPosts(page = 1){
      this.reset(),
      axios.get(this.apiUrl + '?page=' + page)
        .then(res => {
          this.posts = res.data.posts.data;
          this.categories = res.data.categories;
          this.tags = res.data.tags;

          this.pagination = {
            current: res.data.posts.current_page,
            last: res.data.posts.last_page
          }
        })   
    },
    getPostCategory(slug_category){
      this.reset();
      axios.get(this.apiUrl + '/postcategory/' + slug_category)
        .then(res =>{
          this.posts = res.data.category.posts;
          this.title = 'I miei post per la categoria: ' + res.data.category.name;
          this.globalPosts = false;

          if(!res.data.success){
            this.error_msg = res.data.error;
            this.success = false;
          }
        })

      
    },
    getPostTag(slug_tag){
      this.reset();
      axios.get(this.apiUrl + '/posttag/' + slug_tag)
        .then(res =>{
          this.posts = res.data.tag.posts;
          this.title = 'I miei post con il tag: ' + res.data.tag.name;
          this.globalPosts = false;
          
          if(!res.data.success){
            this.error_msg = res.data.error;
            this.success = false;
          }
        })
    },
    reset(){
      this.error_msg = '';
      this.success = true;
      this.posts = null;
      this.title = 'I miei post:';
      this.globalPosts = true;
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  display: flex;
  .container-posts{
    width: 70%;
    h2{
      margin-top: 15px;
    }
  }
  button{
    padding: 3px 5px;
    margin: 0 5px 50px 0;
  }
}
</style>