<template>
    <Head>
        <title>Специалист</title>

        <meta
            name="description"
            content="Здесь будут показываться специалисты"
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
            <p>{{ worker.description }}</p>
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
            </div>

        </div>

    </section>
    <Calculator />
    <Feedback />
    <Footer />

</template>

<script setup>
import Calculator from '@/Components/Calculator.vue'
import Feedback from '@/Components/Feedback.vue'
import Footer from '@/Components/Footer.vue'
import Header from '@/Components/Header.vue'
import { useForm, router, Head } from '@inertiajs/vue3'

const props = defineProps({
    worker: Object
})

const form = useForm({

    title: '',
    description: '',
    image: null
})

function handleImage(e) {

    form.image = e.target.files[0]
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
 /* секции */
    section{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 200px 50px;
        gap: 50px;
    }
    section a{
        text-decoration: underline;
        font-size: 48px;
    }
    section a:hover{
        color: #1e1e5a9a;
    }
    .text{
        position: relative;
        display: flex;
        justify-content: center;
        width: 1820px;

    }
    .text h2{
        width: 902px;
    }
    .section-name{
        position: absolute;
        top: 40px;
        display: flex;
        align-items: center;
        gap: 3px;
        left: -12px;
        margin: 0;
        padding: 0
    }
    .section-name span{
        font-size: 14px;
        color: #1e1e5a9a;
    }
    .box{
        margin: 0;
        padding: 0;
        background-color: #1E1E5A;
        width: 9px;
        height: 9px;
        border-radius: 2px;
    }
/* главная */
.worker_section_main{
  padding: 50px 50px 0;
}
/* работник */
.page{
    align-items: normal;
  margin: 50px;
  padding: 0;
}
.top {
    display: flex;
    justify-content: space-between;
}
.top p{
    width: 673px;
}
/* работы сотрудника */
.worker-image {
    width: 672px;
    height: 555px;
    object-fit: cover;
}

.works {
    display: grid;

    grid-template-columns:
        443px
        902px
        443px;

    gap: 16px;

    justify-content: center;
}
.works button{
  min-width: 100%;
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

.form {
    max-width: 600px;
}

input,
textarea {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
}

textarea {
    height: 180px;
}

button {
    margin-top: 20px;
    padding: 12px 20px;
}
#file{
  display: flex;
  gap: 10px;
  margin: 0;
  padding: 10px 0px;
  height: 50px;
  align-items: center;
  border: 0px;
}
#file::file-selector-button{
  padding: 4px;
  background-color: transparent;
  border-radius: 4px;
  border: 1px solid #1E1E5A;
  color: #1E1E5A;
}
#file::file-selector-button:hover{
  background-color: #1E1E5A;
  color: #D1D1E2;
}
</style>