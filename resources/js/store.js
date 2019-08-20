import Vuex from 'vuex';
import Vue from 'vue';
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    films: [],
    film: null,
    modal: null
  },
  mutations: {
    setFilms (state, payload) {
      state.films = payload;
    },
    setFilm (state, payload) {
      state.film = payload;
    },
    floatFilm (state, payload) {
      let {films} = state;
      films.splice(payload.index, 1);
      films.splice(0,0, payload.film);
      state.films = films; 
    },
    toggleModal(state, payload) {
      state.modal = state.modal ? null : payload;
    }
  },
  actions: {
    fetchFilms () {
      axios.get("/films").then(res => this.commit('setFilms', res.data));
    }
  },
  plugins: [createPersistedState()]
});

export default store;