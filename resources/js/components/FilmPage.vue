<template>
  <bulma-section class="is-small">
    <template slot="title">{{film && film.title}}</template>
    <div class="container" style="margin: 40px 0" >
      <p class="is-italic is-4">{{film && film.opening_crawl}}</p>
    </div>
    <film-section :resources="film && film.planets">
      <template slot="title">Planets</template>
    </film-section>
    <film-section :resources="film && film.species">
      <template slot="title">Species</template>
    </film-section>
    <film-section :resources="film && film.starships">
      <template slot="title">Starships</template>
    </film-section>
    <film-section :resources="film && film.vehicles">
      <template slot="title">Vehicles</template>
    </film-section>
  </bulma-section>
</template>
<script>
  export default {
    computed: {
      film() {
        let routeId = Number(this.$route.params.id);
        return this.$store.state.films.find(film => {
          return film.id === routeId;
        });
      }
    }
  }
</script>
