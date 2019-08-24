<template>
  <nav class="navbar is-link is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <router-link to="/" class="navbar-item">
        <slot name="home-button-img"></slot>
      </router-link>
    </div>
  </nav>
</template>