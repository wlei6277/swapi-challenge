<template>
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-content">
      <div class="box">
        <p>
          Thank you for favouriting <span class="has-text-weight-bold">{{film ? film.title : ""}}</span>!
        </p>
      </div>
    </div>
    <button class="modal-close is-large" aria-label="close" @click="onCloseClick"></button>
  </div>
</template>

<script>
  export default {
    computed: {
      film() {
        return this.$store.state.modal;
      }
    },
    methods: {
      onCloseClick() {
        this.$store.commit('toggleModal')
      }
    }
  }
</script>