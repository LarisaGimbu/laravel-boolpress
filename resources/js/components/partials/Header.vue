<template>
  <header>
    <nav>
      <ul>
        <li>
          <router-link :to="{name:'home'}">Home</router-link>
        </li>
        <li>
          <a href="#">Blog</a>
        </li>
        <li>
          <router-link :to="{name:'about'}">About</router-link>
        </li>
        <li>
          <router-link :to="{name:'contacts'}">Contacts</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style lang="scss" scoped>
header{
  text-align: center;
  background-color: black;
  ul{
    list-style: none;
    li{
      display: inline-block;
      margin: 20px;
      a{
        text-decoration: none;
        color: lightgrey;
        padding-bottom: 18px;
        &:hover{
          color: white;
          border-bottom: 2px solid white;
        }
        &.active{
          color: rgb(255, 68, 68);
          border-bottom: 2px solid rgb(255, 68, 68);
        }
      }
    }
  }
}
</style>