<template>
    <Head>
        <title>Комментарий</title>

        <meta
            name="description"
        />
    </Head>
    <Header />
  <div class="page">

    <h1>Добавьте комментарий</h1>

    <div class="form">
      <textarea v-model="form.comment" placeholder="Введите комментарий"/>
      <button @click="submit">Отправить</button>
    </div>

  </div>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { useForm, Head } from '@inertiajs/vue3'

const form = useForm({
  comment: ''
})

function submit() {
  form.post('/feedback/store')
}
</script>

<style scoped>
.page {
  padding: 100px 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 50px;
}

.form {
  width: 600px;
}

.form button {
  width: 100%;
}

textarea {
  width: 100%;
  min-height: 250px;
  padding: 15px;
  border-radius: 16px;
  border: 1px solid #1E1E5A;
  color: #1E1E5A;
}

textarea::placeholder {
  color: #1E1E5A;
}

/* АДАПТИВ */
@media (max-width: 768px) {
  .page {
    padding: 50px 20px;
    gap: 30px;
    margin: 0 0 400px 0;
  }

  .page h1 {
    font-size: 24px;
    text-align: center;
  }

  .form {
    width: 100%;
    max-width: 100%;
  }
  .form button{
    min-width: 100%;
  }

  textarea {
    min-height: 200px;
    box-sizing: border-box;
  }
}

@media (max-width: 480px) {
  .page {
    padding: 30px 15px;
    gap: 20px;
  }

  .page h1 {
    font-size: 20px;
  }

  textarea {
    min-height: 180px;
  }
}
</style>