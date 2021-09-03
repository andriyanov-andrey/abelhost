<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Update Category</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="update">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" v-model="article.title">
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" v-model="article.description">
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"update-article",
  data(){
    return {
      article:{
        title:"",
        description:"",
        _method:"patch"
      }
    }
  },
  mounted(){
    this.showArticle()
  },
  methods:{
    async showArticle(){
      console.log(this.$route.params.id)
      await window.axios.get(`http://127.0.0.1:8000/api/news/${this.$route.params.id}`).then(response=>{
        const { title, description } = response.data.data
        this.article.title = title
        this.article.description = description
      }).catch(error=>{
        console.log(error)
      })
    },
    async update(){
      await window.axios.put(`http://127.0.0.1:8000/api/news/${this.$route.params.id}`,   this.article).then(response=>{
        this.$router.push({name:"news"})
      }).catch(error=>{
        console.log(error)
      })
    }
  }
}
</script>
