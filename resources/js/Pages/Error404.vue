<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { router,Head } from '@inertiajs/vue3'

function goHome() {
    router.visit('/')
}
</script>

<template>
    <Head>
        <title>404</title>

        <meta
            name="description"
            content="Страница не найдена"
        />
    </Head>
    <Header />

    <div class="page">

        <h1>404</h1>

        <p>
            Страница не найдена
        </p>

        <button @click="goHome">
            На главную
        </button>

    </div>
    <Footer />

</template>

<style scoped>
.page {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 30px;
  background: #f5f5f5;
  padding: 20px;
  box-sizing: border-box;
}

h1 {
  font-size: 120px;
  color: #1E1E5A;
}

p {
  font-size: 28px;
}

button {
  width: 400px;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  font-size: 18px;
}

/* АДАПТИВ */
@media (max-width: 768px) {
  .page {
    gap: 20px;
    padding: 15px;
  }

  h1 {
    font-size: 80px;
  }

  p {
    font-size: 20px;
    text-align: center;
  }

  button {
    min-width: 100%;
    font-size: 16px;
  }
}

@media (max-width: 480px) {
  .page {
    gap: 15px;
    padding: 15px;
    margin: 0;
  }

  h1 {
    font-size: 60px;
  }

  p {
    font-size: 16px;
  }

  button {
    min-width: 100%;
    font-size: 14px;
  }
}
</style>