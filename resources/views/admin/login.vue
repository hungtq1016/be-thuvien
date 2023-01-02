<template>
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-4 ">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              v-model="form.email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" v-model="form.password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: { email: "", password: "" },
    }
  },
  methods: {
    async submit() {
      const login = await axios.post(`http://127.0.0.1:8001/api/login`, this.form).catch(function (error) {
                if (error.response) {
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    console.log( error.response.data)
                } else if (error.request) {
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log( error.response.data)
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log( error.response.data)
                }
            });
      if (login) {
          localStorage.setItem('token-admin', login.data.data.token)
          this.$router.push({ name: 'admin-dashboard' })
      }
    }
  }
}
</script>

<style lang="scss" scoped>

</style>