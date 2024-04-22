<template>
  <div>
    <nav class="d-flex gap-5">
      <RouterLink :to="{ name: 'home' }">Home</RouterLink>
      <RouterLink :to="{ name: 'about' }">About</RouterLink>
    </nav>
  </div>
</template>