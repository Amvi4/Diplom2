<template>
  <Head>
        <title>Сотрудники</title>

        <meta
            name="description"
        />
    </Head>
  <Header />
  <div class="workers-page">

    <div class="top">
      <h1>Сотрудники</h1>
      <button @click="router.visit('/admin/workers/create')">Добавить</button>
    </div>

    <div class="grid">

      <div v-for="worker in workers" :key="worker.id" class="card" @click="go(worker.id)">
        <img :src="worker.photo ? `/storage/${worker.photo}` : '/images/default-worker.jpg'" alt="сотрудник" loading="lazy"/>

        <h2>{{ worker.name }}</h2>

        <p>{{ worker.position }}</p>

        <span> {{ worker.experience }} лет опыта</span>

        <button type="button" @click.stop="remove(worker.id)" class="delete">Удалить</button>
      </div>

    </div>

  </div>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head, router } from '@inertiajs/vue3';

function go(id) {

    router.visit(`/admin/workers/${id}`)
}

defineProps({
  workers: Array
})

function remove(id) {
  if (confirm('Удалить сотрудника?')) {
    router.delete(`/admin/workers/${id}`)
  }
}
</script>

<style scoped>
.workers-page {
  padding: 100px 50px;
}

.top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
}
.top button{
  width: 200px;
  align-items: center;
  padding: 0;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 20px;
  justify-content: center;
}

.card {
  position: relative;
  border-radius: 20px;
  height: 600px;

}

.card img {
  width: 100%;
  height: 300px;
  object-fit: cover;
}

.card h2 {
  padding: 20px 20px 5px;
}

.card p,
.card span {
  padding: 0 20px;
}

button {
  margin: 20px;
  padding: 10px 20px;
  cursor: pointer;
}

.delete {
  position: absolute;
  color: white;
  bottom: 0px;
  right: 0px;
}
@media(max-width: 768px) {
  .card{
    max-height: 480px;
  }
  .delete{
    padding: 0;
    min-width: 100%;
  }

}
</style>