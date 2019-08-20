<template>
    <div>
    <bulma-section>
        <template slot="title">Films</template>
        <template slot="sub-heading">A brief description of the Star Wars films!</template>
        <film-card 
            v-for="(film, index) in films" 
            v-bind:key="film.title + index"
            :filmRecord="film"
            :index="index"
        />
        <modal v-show="modalActive"></modal>
    </bulma-section>
    </div>
</template>

<script>
    export default {
        computed: {
            films() {
                return this.$store.state.films;
            },
            modalActive() {
                return this.$store.state.modal;
            }
        }
    }
</script>

