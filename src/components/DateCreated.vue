<template>
  <div>
    {{ dateCreated }}
  </div>
</template>

<script>
export default {
  name: "DateCreated",

  props: ['date'],

  computed: {
    dateCreated: function () {
      let date = new Date(this.date);
      date = new Intl.DateTimeFormat('ru', {
        day: 'numeric', month: 'numeric', year: 'numeric',
        hour: 'numeric', minute: 'numeric', second: 'numeric',
        hour12: false
      }).format(date);
      return date;
    }
  },

}
</script>

<style scoped>

</style>