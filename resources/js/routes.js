import VueRouter from 'vue-router';
import Home from "./components/Home";
import FilmPage from "./components/FilmPage";

let routes = [
  {
    path: "/",
    component: Home
  },
  {
    path: "/films/:id",
    component: FilmPage
  }
]

export default new VueRouter({
  routes
});