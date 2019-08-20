<template>
    <div>
    <bulma-section>
        <template slot="title">Films</template>
        <template slot="sub-heading">A brief description of the Star Wars films!</template>
        <div class="field">
            <label class="label">Search Films</label>
            <div class="control">
                <input 
                    class="input" 
                    type="text" 
                    placeholder="Type here to search for your film"
                    v-model="search"
                >
            </div>
        </div>
        <film-card 
            v-for="(film, index) in filteredFilms" 
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
        data() {
            return {
                search: ''
            }
        },
        computed: {
            filteredFilms() {
                return this.$store.state.films.filter((film) => {
                    let title = film.title.toLowerCase();
                    let search = this.search.toLowerCase()
                    return title.match(search);
                })
            },
            modalActive() {
                return this.$store.state.modal;
            }
        }
    }
</script>

