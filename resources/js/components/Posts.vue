<template>
<main class="container">
  <div v-if="success" class="container-posts">
    <div v-if="posts">
      <h2>I miei post:</h2>
      <PostItem 
        v-for="post in posts"
        :key="post.id"
        :post="post" />

      <div>
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
    @getPostTag="getPostTag"/>
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
      error_msg: ''
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
            current: res.data.current_page,
            last: res.data.last_page
          }
        })   
    },
    getPostCategory(slug_category){
      this.reset();
      axios.get(this.apiUrl + '/postcategory/' + slug_category)
        .then(res =>{
          this.posts = res.data.category.posts;

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
          
          if(!res.data.success){
            this.error_msg = res.data.error;
            this.success = false;
          }
        })
    },
    reset(){
      this.error_msg = '',
      this.success = true,
      this.posts = null;
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  display: flex;
  .container-posts{
    width: 70%;
  }
  button{
    padding: 5px;
    margin: 5px;
  }
}
</style>