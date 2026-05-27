<template>
    <Head>
        <title>Специалист</title>

        <meta
            name="description"
        />
    </Head>
  <Header />
    <main class="worker_section_main">
      <h1>{{ worker.name }}</h1>
      <p>{{ worker.position }}</p>
      <p>Опыт: {{ worker.experience }} лет</p>
    </main>
    <!-- СОТРУДНИК -->
    <section class="page">

        <div class="top">
            <img :src="worker.photo || '/images/default-worker.jpg'" alt="сотрудник" loading="lazy" />
        </div>
    </section>
    <!-- РАБОТЫ СОТРУДНИКА -->
    <section class="jobs-section">
      <div class="text" id="text-work">
            <div class="section-name">
                    <div class="box"></div>
                    <span>РАБОТЫ</span>
            </div>
            <h2>Работы специалиста</h2>
        </div>

        <div class="works">
            <div v-for="work in worker.works" :key="work.id" class="work" >
                <img v-if="work.work_image" :src="work.work_image" class="work-image" alt="работа специалиста" loading="lazy">
                <h3>{{ work.title }}</h3>
                <p>{{ work.description }}</p>
                <button @click="remove(work.id)">Удалить</button>
            </div>

        </div>

    </section>

    <!-- ДОБАВИТЬ РАБОТУ -->
     <section class="create-work-section">
        <h2>Добавить работу</h2>

        <div class="form">
            <input v-model="form.title" placeholder="Название">
            <textarea v-model="form.description" placeholder="Описание"></textarea>
            <input type="file" @change="handleImage" id="file">
            <button @click="submit">Добавить</button>
        </div>
     </section>
    <Footer />

</template>

<script setup>
import Footer from '@/Components/Footer.vue'
import Header from '@/Components/Header.vue'
import { useForm, router, Head } from '@inertiajs/vue3'

const props = defineProps({
    worker: Object
})

const form = useForm({

    title: '',
    description: '',
    work_image: null
})

function handleImage(e) {

    form.work_image = e.target.files[0]
}

function submit() {

    form.post(
        `/admin/workers/${props.worker.id}/works`
    )
}

function remove(id) {

    router.delete(`/admin/works/${id}`)
}
</script>

<style scoped>
 section {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 200px 50px;
  gap: 50px;
}

section a {
  text-decoration: underline;
  font-size: 48px;
}

section a:hover {
  color: #1e1e5a9a;
}

.text {
  position: relative;
  display: flex;
  justify-content: center;
  width: 1820px;
}

.text h2 {
  width: 902px;
}

.section-name {
  position: absolute;
  top: 40px;
  display: flex;
  align-items: center;
  gap: 3px;
  left: -12px;
  margin: 0;
  padding: 0;
}

.section-name span {
  font-size: 14px;
  color: #1e1e5a9a;
}

.box {
  margin: 0;
  padding: 0;
  background-color: #1E1E5A;
  width: 9px;
  height: 9px;
  border-radius: 2px;
}

/* главная */
.worker_section_main {
  padding: 50px 50px 0;
}

.worker_section_main h1 {
  font-size: 36px;
}

.worker_section_main p {
  font-size: 18px;
}

/* работник */
.page {
  margin: 0 0 50px 500px;
  padding: 0;
}

.top {
  display: flex;
  align-items: end;
  justify-content: end;
}

/* работы сотрудника */
.worker-image {
  width: 672px;
  height: 555px;
  object-fit: cover;
}

.works {
  display: grid;
  grid-template-columns: 443px 902px 443px;
  gap: 16px;
  justify-content: center;
}

.work button {
  min-width: 100%;
  padding: 0;
}

.work {
  height: 320px;
  position: relative;
}

.work-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* добавить работу */
.create-work-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 100px 50px;
  gap: 30px;
}

.form {
  max-width: 600px;
  width: 100%;
}

input,
textarea {
  width: 100%;
  padding: 12px;
  margin-top: 15px;
  box-sizing: border-box;
}

textarea {
  height: 180px;
}

button {
  margin-top: 20px;
  padding: 0;
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

/* АДАПТИВ */
@media (max-width: 1200px) {
    .worker_section_main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        padding: 20px;
        max-width: 100%;
        margin: 20px 0px;
    }
    .worker_section_main h1, .worker_section_main p{
        max-width: 100%;
    }
    .create-work-section{
        width: 70%;
    }
    .create-work-section button{
        min-width: 100%;
    }
    .page{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
    }
    .jobs-section{
        max-width: 80%;
    }
    .form{
        max-width: 100%;
    }
  .works {
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  .work {
    height: auto;
    min-height: 280px;
  }
  .page{
    max-width: 100%;
  }
  .section-name{
    display: none;
  }
}

@media (max-width: 992px) {
  section {
    margin: 100px 30px;
    gap: 40px;
  }

  .worker_section_main {
    padding: 30px 30px 0;
  }

  .page {
    margin: 0 0 30px 0;
    display: flex;
    justify-content: center;
  }

  .top {
    justify-content: center;
  }

  .worker-image {
    width: 100%;
    max-width: 500px;
    height: auto;
    aspect-ratio: 1 / 1;
  }

  .text {
    width: 100%;
  }

  .text h2 {
    width: 100%;
    font-size: 24px;
    text-align: center;
  }

  .section-name {
    position: static;
    justify-content: center;
    margin-bottom: 20px;
  }

  .works {
    grid-template-columns: 1fr;
    max-width: 600px;
    width: 100%;
  }

  .work {
    height: auto;
    min-height: 280px;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 25px;
  }

  .worker_section_main {
    padding: 20px 20px 0;
  }

  .worker_section_main h1 {
    font-size: 24px;
  }

  .worker_section_main p {
    font-size: 14px;
  }

  .page {
    margin: 0 0 20px 0;
    display: flex;
    justify-content: center;
  }

  .top {
    justify-content: center;
  }

  .worker-image {
    width: 100%;
    max-width: 350px;
    height: auto;
    aspect-ratio: 1 / 1;
  }

  .text {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .text h2 {
    font-size: 20px;
    width: 100%;
  }

  .section-name {
    position: static;
    margin-bottom: 15px;
  }

  .section-name span {
    font-size: 16px;
  }

  .works {
    grid-template-columns: 1fr;
    gap: 20px;
    width: 100%;
  }

  .work {
    height: auto;
    min-height: auto;
  }

  .work h3 {
    font-size: 18px;
  }

  .work p {
    font-size: 14px;
  }

  .work button {
    font-size: 14px;
    padding: 0;
  }

  /* форма добавления */
  .create-work-section {
    margin: 40px 20px;
    gap: 20px;
  }

  .create-work-section h2 {
    font-size: 20px;
  }

  .form {
    max-width: 100%;
  }

  input,
  textarea {
    padding: 10px;
    font-size: 14px;
  }

  textarea {
    height: 120px;
  }

  button {
    padding: 0;
    font-size: 14px;
    width: 100%;
  }

  #file {
    height: auto;
    flex-wrap: wrap;
  }

  #file::file-selector-button {
    padding: 6px 12px;
  }
}

@media (max-width: 480px) {
  section {
    margin: 40px 15px;
    gap: 20px;
  }

  .worker_section_main h1 {
    font-size: 20px;
  }

  .worker_section_main p {
    font-size: 12px;
  }

  .worker-image {
    max-width: 280px;
  }

  .text h2 {
    font-size: 18px;
  }

  .section-name span {
    font-size: 14px;
  }

  .work h3 {
    font-size: 16px;
  }

  .work p {
    font-size: 12px;
  }

  .create-work-section h2 {
    font-size: 18px;
  }

  input,
  textarea {
    padding: 8px;
    font-size: 12px;
  }

  textarea {
    height: 100px;
  }

  button {
    font-size: 12px;
  }
}
</style>