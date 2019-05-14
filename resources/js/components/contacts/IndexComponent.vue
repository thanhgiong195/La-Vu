<template>
  <div style="padding: 0 15px">
    <h1>Contact</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Contact</router-link>
      </div>
    </div>
    <br>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Content</th>
          <th>Action</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="contact in contacts" :key="contact.id">
          <td>{{ contact.id }}</td>
          <td><router-link :to="'contact/' + contact.id">{{ contact.name }}</router-link></td>
          <td>{{ contact.email }}</td>
          <td>{{ contact.address }}</td>
          <td>{{ contact.content }}</td>
          <td><router-link :to="{name: 'edit', params: { id: contact.id }}" class="btn btn-primary">Edit</router-link></td>
          <td><button class="btn btn-danger" @click = "deleteContact(contact.id)">Delete</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      contacts: []
    };
  },
  created() {
    let uri = "contacts";
    this.axios.get(uri).then(response => {
      this.contacts = response.data.data;
    });
  },
  methods: {
    deleteContact(id) {
      let uri = `contact/delete/${id}`;
      this.axios.delete(uri).then(response => {
        for (let i = 0; i < this.contacts.length; i++){
          if (this.contacts[i].id === id) {
            this.contacts.splice(i,1);
            break;
          }
        }
      });
    }
  }
};
</script>
