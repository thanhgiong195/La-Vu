<template>
  <div>
    <h1>Edit contact</h1>
    <form @submit.prevent="updateContact">
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
        <button class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</template>

<script>
    export default {
      data() {
        return {
          contact: {}
        }
      },
      created() {
        let uri = `contact/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.contact = response.data;
        });
      },
      methods: {
        updateContact() {
          let uri = `contact/update/${this.$route.params.id}`;
          this.axios.post(uri, this.contact).then((response) => {
            this.$router.push({ path: `/contact/${this.$route.params.id}` });
          });
        }
      }
    }
</script>
