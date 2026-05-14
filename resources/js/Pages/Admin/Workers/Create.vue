<template>
  <Head>
        <title>Добавить сотрудника</title>

        <meta
            name="description"
        />
    </Head>
  <Header />
  <div class="page">

    <h1>Добавить сотрудника</h1>

    <div class="form">

      <input v-model="form.name" type="text" placeholder="Имя">

      <input v-model="form.position" type="text" placeholder="Должность">

      <input v-model="form.experience" type="number" placeholder="Опыт">

      <input type="file" @change="handleFile" id="file"> 
      
      <button @click="submit">Сохранить</button>
    </div>

  </div>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  position: '',
  experience: '',
  description: '',
  photo: null
})

function handleFile(e) {
  form.photo = e.target.files[0]
}

function submit() {
  form.post('/admin/workers')
}
</script>

<style scoped>
.page {
  padding: 50px;
  display: flex;
  align-items: center;
  flex-direction: column;
  gap: 50px;
}

.form {
  max-width: 600px;
  margin: 100px;
}

input,
textarea {
  width: 600px;
  margin-top: 15px;
  padding: 12px;
}

textarea {
  min-height: 200px;
  border-radius: 16px;
  border: 1px solid #1E1E5A;
}

button {
  min-width: 100%;
  margin-top: 20px;
  cursor: pointer;
}

#file {
  display: flex;
  gap: 10px;
  margin: 0;
  padding: 10px 0px;
  height: 50px;
  align-items: center;
  border: 0px;
}

#file::file-selector-button {
  padding: 4px;
  background-color: transparent;
  border-radius: 4px;
  border: 1px solid #1E1E5A;
  color: #1E1E5A;
}

#file::file-selector-button:hover {
  background-color: #1E1E5A;
  color: #D1D1E2;
}

/* адаптив */
@media (max-width: 768px) {
  .page {
    margin: 0 0 400px 0;
    padding: 30px 20px;
    gap: 30px;
  }

  .page h1 {
    font-size: 24px;
    text-align: center;
  }

  .form {
    max-width: 100%;
    margin: 0;
    width: 100%;
  }

  input,
  textarea {
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
  }

  button {
    min-width: 100%;
  }

  #file {
    width: 100%;
    box-sizing: border-box;
  }
}
</style>