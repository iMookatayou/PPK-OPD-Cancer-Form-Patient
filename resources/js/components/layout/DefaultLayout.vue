<template>
  <div>
    <Header />
    <main class="default-main">
      <slot />
    </main>
  </div>
</template>

<script setup>
import Header from './Header.vue'
</script>

<style scoped>
.default-main {
  padding-top: 100px; /* กันไม่ให้เนื้อหาซ้อน header */
}
</style>
