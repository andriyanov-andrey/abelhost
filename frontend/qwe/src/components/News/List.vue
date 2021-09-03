<template>
  <div class="row">
    <div class="col-12 mb-2 text-end">
      <router-link :to='{name:"articleAdd"}' class="btn btn-primary">Create</router-link>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Articles</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody v-if="articles.length > 0">
              <tr v-for="(article,key) in articles" :key="key">
                <td>{{ article.id }}</td>
                <td>{{ article.title }}</td>
                <td>{{ article.description }}</td>
                <td>
                  <router-link :to='{name:"articleEdit",params:{id:article.id}}' class="btn btn-success">Edit</router-link>
                  <button type="button" @click="deleteArticle(article.id)" class="btn btn-danger">Delete</button>
                </td>
              </tr>
              </tbody>
              <tbody v-else>
              <tr>
                <td colspan="4" align="center">No Categories Found.</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"articles",
  data(){
    return {
      articles:[]
    }
  },
  mounted(){
    this.getArticles()
  },
  methods:{
    async getArticles(){
      await window.axios.get('http://127.0.0.1:8000/api/news').then(response=>{
        this.articles = response.data.data
      }).catch(error=>{
        console.log(error)
        this.articles = []
      })
    },
    deleteArticle(id){
      if(confirm("Are you sure to delete this category ?")){
        window.axios.delete(`http://127.0.0.1:8000/api/news/${id}`).then(response=>{
          this.getArticles()
        }).catch(error=>{
          console.log(error)
        })
      }
    }
  }
}
</script>
