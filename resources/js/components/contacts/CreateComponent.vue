<template>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="text-center">Create A Contact</h1>
      <form @submit.prevent="addContact">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" v-model="contact.name">
        </div>
        <div class="form-group">
          <label for="price">Email:</label>
          <input type="text" class="form-control" v-model="contact.email">
        </div>
        <div class="form-group">
          <label for="quantity">Address:</label>
          <input type="text" class="form-control" v-model="contact.address">
        </div>
        <div class="form-group">
          <label for="quantity">Create by:</label>
          <input type="text" class="form-control" v-model="contact.create_by">
        </div>
        <div class="form-group">
          <label for="quantity">Content:</label>
          <input type="text" class="form-control" v-model="contact.content">
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      contact: {}
    };
  },
  methods: {
    addContact() {
      let uri = "contact/create";
      this.axios.post(uri, this.contact).then(response => {
        this.$router.push({ name: "contacts" });
      });
    }
  }
};
</script>
