<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <main class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <Link class="navbar-brand" href="/">Home</Link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <Link class="nav-link active" aria-current="page" href="/dashboard">Dashboard</Link>
            <Link class="nav-link" href="/about">Contact</Link>
            <Link class="nav-link" href="/users">Daftar Users</Link>
          </div>
        </div>
      </div>
    </nav>
    <article>
      <slot />
    </article>
  </main>
</template>

