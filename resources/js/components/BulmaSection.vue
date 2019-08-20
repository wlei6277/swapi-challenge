<template>
  <section class="section" style="margin-top: 30px" >
    <div class="container">
      <h1 class="title"><slot name="title"></slot></h1>
      <h2 class="subtitle">
        <slot name="sub-heading"></slot>
      </h2>
      <slot></slot>
    </div>
  </section>
</template>