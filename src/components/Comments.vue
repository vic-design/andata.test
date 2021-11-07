<template>
  <div class="mx-2 mb-5">
    <h6>Добавить комментарий</h6>
    <form class="mb-5">
      <div class="form-row my-3">
        <div class="col">
          <input name="name" type="text" class="form-control"
                 placeholder="Имя" v-model="name" required aria-describedby="nameError"
                 v-bind:class="{'border-danger': errors.name}">
          <small id="nameError" class="form-text text-danger" v-if="errors.name" v-text="errors.name.text"></small>
        </div>
        <div class="col">
          <input name="email" type="email" class="form-control"
                 placeholder="email@example.com" v-model="email" required aria-describedby="emailError"
                 v-bind:class="{'border-danger': errors.email}">
          <small id="emailError" class="form-text text-danger" v-if="errors.email" v-text="errors.email.text"></small>
        </div>
      </div>
      <div class="form-group">
        <label for="title">Заголовок</label>
        <input name="title" type="text" class="form-control" id="title"
               v-model="title" required aria-describedby="titleError"
               v-bind:class="{'border-danger': errors.title}">
        <small id="titleError" class="form-text text-danger" v-if="errors.title" v-text="errors.title.text"></small>
      </div>
      <div class="form-group">
        <label for="text">Текст</label>
        <textarea name="text" class="form-control" id="text" rows="3"
                  v-model="text" required aria-describedby="textError"
                  v-bind:class="{'border-danger': errors.text}"></textarea>
        <small id="textError" class="form-text text-danger" v-if="errors.text" v-text="errors.text.text"></small>
      </div>
      <button type="button" class="btn btn-success float-right" @click="addComment">Добавить</button>
    </form>

    <comment-list :list="commentsList"></comment-list>

  </div>
</template>

<script>
const axios = require('axios');
import CommentList from "./CommentList";

export default {
  name: "Comments",

  components: {
    'comment-list': CommentList
  },

  data: function () {
    return {
      commentsList: [],
      errors: {
        name: null,
        email: null,
        title: null,
        text: null,
      },
      // name: null,
      // email: null,
      // title: null,
      // text: null,
      name: 'Name',
      email: 'email@some.com',
      title: 'title',
      text: 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
    }
  },

  mounted() {
    axios.get('/comments').then((data) => {
      this.commentsList = data.data;
    });
  },

  methods: {
    addComment: function () {
      if (this.validateForm()) {
        let data = new FormData();
        data.append('name', this.name);
        data.append('email', this.email);
        data.append('title', this.title);
        data.append('text', this.text);
        axios.post('/comments', data).then((data) => {
          this.commentsList = data.data;
          console.log(data)
        });
      }
    },

    validateForm: function () {
      if (!this.name) {
        this.isRequired('name')
      } else {
        this.errors.name = null;
      }
      if (!this.email) {
        this.isRequired('email')
      } else if (!this.validEmail(this.email)) {
        this.errors.email = {text: "Формат Email неверный!"}
      } else {
        this.errors.email = null;
      }
      if (!this.title) {
        this.isRequired('title')
      } else {
        this.errors.title = null;
      }
      if (!this.text) {
        this.isRequired('text')
      } else {
        this.errors.text = null;
      }

      let noErrors = true;
      for (let item in this.errors) {
        if (this.errors[item]) {
          noErrors = false;
          break;
        }
      }

      return noErrors;
    },

    isRequired: function (object) {
      this.errors[object] = {
        text: 'Поле не может быть пустым!'
      };
    },

    validEmail: function (email) {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

  },

}
</script>

<style scoped>

</style>