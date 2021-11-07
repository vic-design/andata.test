<template>
  <div class="container pt-5 m-auto">
    <div class="row mt-5 ml-0" v-for="comment in list">
      <div class="row bg-light text-dark col-12 py-2">
        <div class="col-8 font-weight-bold">
          <a :href="'mailto@' + comment.email">{{ comment.name }}</a>
        </div>
        <div class="col-4 text-right">
          <date-created :date="comment.created_at"></date-created>
        </div>
      </div>
      <div class="col-12 my-1">
        <strong>{{ comment.title }}</strong>
      </div>
      <div class="col-12">
        {{ comment.text }}
      </div>
    </div>
  </div>
</template>

<script>
import DateCreated from "./DateCreated";

export default {
  name: "CommentList",

  props: ['list'],

  components: {
    'date-created': DateCreated
  },

}
</script>

<style scoped>

</style>