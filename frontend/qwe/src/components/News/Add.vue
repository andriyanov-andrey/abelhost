<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Article</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="create">
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
                <button type="submit" class="btn btn-primary">Save</button>
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
  name:"add-article",
  data(){
    return {
      article:{
        title:"",
        description:""
      }
    }
  },
  methods:{
    async create(){
      await window.axios.post('http://127.0.0.1:8000/api/news', this.article).then(response=>{
        this.$router.push({name:"news"})
      }).catch(error=>{
        console.log(error)
      })
    }
  }
}
</script>
