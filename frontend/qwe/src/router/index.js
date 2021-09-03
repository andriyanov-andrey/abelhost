import Vue from 'vue'
import Router from 'vue-router'
import ArticleList from '@/components/News/List.vue'
import ArticleCreate from '@/components/News/Add.vue'
import ArticleEdit from '@/components/News/Edit.vue'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/news',
      name: 'news',
      component: ArticleList
    },
    {
      path: '/news/add',
      name: 'articleAdd',
      component: ArticleCreate
    },
    {
      path: '/news/edit',
      name: 'articleEdit',
      component: ArticleEdit
    },
  ]
})
