<template>
  <div class="card" style="margin-bottom: 20px">
    <header class="card-header">
      <p class="card-header-title">
        {{film.title}}
      </p>
      <a href="#" class="card-header-icon" aria-label="more options">
        <span class="icon">
          <i class="material-icons" v-on:click.prevent="onFavouriteClick">
            {{film.favourited ? "favorite": "favorite_border"}}
          </i>
        </span>
      </a>
    </header>
    <div class="card-content">
      <div class="content">
        <p><span class="has-text-weight-bold">Episode:</span> {{film.episode_id}} </p>
        <p><span class="has-text-weight-bold">Director:</span> {{film.director}}</p>
        <p><span class="has-text-weight-bold">Release Date:</span> {{film.release_date}}</p>
        
      </div>
    </div>
    <footer class="card-footer">
      <router-link :to="filmUrl" class="card-footer-item">
        <span @click="onDetailsClick">Details</span> 
      </router-link>
    </footer>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        film: null
      }
    },
    props: [
      'filmRecord',
      'index'
    ],
    computed: {
      filmUrl() {
        return `/films/${this.film.id}`;
      }
    },
    methods: {
      onFavouriteClick() {
        this.film.favourited = !this.film.favourited;
        let {index, film} = this;
        axios.put(`/films/${this.film.id}`, film);
        if(film.favourited) {
          this.$store.commit('floatFilm', {index, film});
          this.$store.commit('toggleModal', film);
          // persisting favourited film title in local storage as per requirements
          window.localStorage.setItem(film.title,'favourited');
        } else {
          // removing un-favourited film title in local storage as per requirements
          window.localStorage.removeItem(film.title);
        }
      },
      onDetailsClick() {
        // this.$store.commit('setFilm', this.film);
      }
    },
    created() {
      this.film = this.filmRecord; 
    }
  }
</script>