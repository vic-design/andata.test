<template>
  <div class="m-auto col-11 py-5">
    <h3 class="bg-dark text-light p-1">Комментарии</h3>
    <comments></comments>
  </div>
</template>

<script>
import Comments from "./components/Comments";

export default {
  name: "App",
  components: {
    'comments': Comments
  },
}
</script>

<style scoped>

</style>
