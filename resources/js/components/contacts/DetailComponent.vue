<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">{{ contact.name }}</div>

              <div class="card-body">
                  <p>Email: {{ contact.email}}</p> 
                  <p>Content: {{ contact.content}}</p> 
              </div>
          </div>
      </div>
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
      this.showDetail();
    },
    methods: {
      showDetail() {
        let uri = `contact/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
          this.contact = response.data;
      });
      }
    }
  }
</script>
