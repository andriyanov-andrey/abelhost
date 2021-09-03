<template>
  <main>
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div className="container-fluid">
        <div className="collapse navbar-collapse">
          <div className="navbar-nav">
            <router-link exact-active-class="active" to="/" className="nav-item nav-link">Home</router-link>
            <router-link exact-active-class="active" to="/news" className="nav-item nav-link">News</router-link>
          </div>
        </div>
      </div>
    </nav>
    <div className="container mt-5">
      <router-view></router-view>
    </div>
  </main>
</template>


<script>
export default {}
</script>
