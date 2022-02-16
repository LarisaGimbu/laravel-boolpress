<template>
  <article>
    <div>
      <img :src="post.cover" :alt="post.title">
    </div>
    <div>
      <h3> <router-link :to="{name: 'detail', params:{slug: post.slug}}">{{post.title}}</router-link> </h3>
      <p class="category" v-if="post.category"> {{post.category.name}} </p>
      <div v-if="post.tags">
        <span v-for="(tag, index) in post.tags"
          :key="`tag${index}`"> {{tag.name}} </span>
      </div>
      <p class="date"> {{formatDate}}</p>
      <p class="text"> {{troncateText}} </p>
    </div>
  </article>
</template>

<script>
export default {
  name:'PostItem',
  props:{
    'post': Object
  },
  computed:{
    troncateText(){
      return this.post.content.substr(0, 50) + '...';
    },
    formatDate(){
      const d = new Date(this.post.created_at);
      let day = d.getDay();
      let month = d.getMonth();
      const year = d.getFullYear();

      if(day < 10) day = '0'+day;
      if(month < 10) month = '0'+month;
      
      return `${day}/${month}/${year}`;
    }
  }
}
</script>

<style lang="scss" scoped>
article{
  display: flex;
  width: 90%;
  border: 1px solid grey;
  border-radius: 5px;
  margin: 20px 0;
  a{
    text-decoration: none;
    color: black;
    &:hover{
      color: rgb(255, 68, 68);
    }
  }
  .category{
    margin: 5px 0;
    color: rgb(97, 97, 97);
  }
  span{
    display: inline-block;
    margin: 5px 5px 10px 0;
    padding: 4px 8px;
    font-size: 10px;
    background-color: rgb(85, 136, 138);
    color: white;
    border-radius: 6px;
  }
  .date{
    font-size: 0.8rem;
    font-style: italic;
  }
  .text{
    padding: 5px 0;
  }
}

</style>