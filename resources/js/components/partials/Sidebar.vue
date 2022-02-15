<template>
  <div class="sidebar">
    <div class="box category">
      <h3>Categorie</h3>
      <div>
        <span 
        @click="$emit('getPostCategory', category.slug)"
        v-for="category in categories"
        :key="`category${category.id}`">{{category.name}}</span>
      </div>
    </div>
    <div class="box tag">
      <h3>Tags</h3>
      <div>
        <span 
        @click="$emit('getPostTag', tag.slug)"
        v-for="tag in tags"
        :key="`tag${tag.id}`">{{tag.name}}</span>
      </div>
    </div>

    <button class="reset"
    @click="$emit('getAllPosts')">Reset</button>
  </div>
</template>

<script>
export default {
  name:'Sidebar',
  props:{
    tags: Array,
    categories: Array
  }
}
</script>

<style lang='scss' scoped>
.sidebar{
  max-width: 30%;
  margin-top: 20px;
  .box{
    border: 2px solid grey;
    border-radius: 10px;
    padding: 20px 15px;
    margin-bottom: 20px;
    h3{
      margin-bottom: 15px;
    }
    span{
      display: inline-block;
      margin: 5px 5px 10px 0;
      padding: 4px 8px;
      color: white;
      border-radius: 6px;
      cursor: pointer;
    }
    &.category{
      span{
        background-color: rgb(118, 158, 37);
        &:hover{
          background-color: rgb(158, 201, 72);
        }
      }
    }
    &.tag{
      span{
        background-color: rgb(85, 136, 138);
        &:hover{
          background-color: rgb(113, 174, 175);
        }
      }
    }
  }
  .reset{
    position: relative;
    left: 50%;
    transform: translate(-50%);
    padding: 5px 7px;
    background-color: rgb(85, 85, 85);
    color: white;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    &:hover{
      background-color:  rgb(126, 126, 126);
    }
  }
}
</style>