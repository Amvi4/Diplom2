<script setup>
import { ref } from 'vue'
import { router, usePage, useForm, Head } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';

const page = usePage()
const user = page.props.auth?.user

function go(url) {
  router.visit(url)
  isOpen.value = false
}
const props = defineProps({
  workers: Array
})

const currentIndex = ref(0)

const cardWidth = 443
const gap = 20

function next() {

  if (
    currentIndex.value < props.workers.length - 4
  ) {
    currentIndex.value++
  }
}

function prev() {

  if (currentIndex.value > 0) {
    currentIndex.value--
  }
}


const slider = ref(null)

function scrollLeft() {
  slider.value.scrollBy({
    left: -350,
    behavior: 'smooth'
  })
}

function scrollRight() {
  slider.value.scrollBy({
    left: 350,
    behavior: 'smooth'
  })
}

function openWorker(id) {
  router.visit(`/workers/${id}`)
}
</script>

<template>
    <Head>
        <title>TI-Weld — Сотрудники</title>

        <meta
            name="description"
            content="Специалисты, которые могут вам помочь"
        />
    </Head>
    <Header />
 <!-- СОТРУДНИКИ -->
    <section class="workers-section">
        <div class="text" id="text-work">
            <div class="section-name" id="workers">
                    <div class="box"></div>
                    <span>О НАС</span>
            </div>

            <h2 class="worker text">Наши сотрудники</h2>
        </div>

      <div class="buttons">
        <button @click="prev" class="nav">◀</button>
        <button @click="next"class="nav">▶</button>
      </div>

    <div class="slider-wrapper">
      <div class="slider" :style="{transform: `translateX(-${currentIndex * 463}px)`}">
        <div v-for="worker in workers" :key="worker.id" class="card" @click="openWorker(worker.id)">

          <img :src="worker.photo || '/images/default-worker.jpg'" alt="сотрудник" loading="lazy" />

          <div class="info">

            <h3>{{ worker.name }}</h3>

            <p>{{ worker.position }}</p>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- ПОЧЕМУ -->
    <section class="workersWhy-sections">
        <div class="text" id="text-work">
            <div class="section-name" id="workers">
                    <div class="box"></div>
                    <span>СОТРУЛНИКИ</span>
            </div>

            <h2 class="worker text">Почему важно знать о специалисте?</h2>
        </div>
        <div class="workersWhy-text">
            <p>Знание информации о специалисте важно потому, что от его квалификации и опыта напрямую зависит качество результата 
                работы. Когда заказчик понимает, с кем он имеет дело, проще оценить уровень доверия, профессионализм и ответственность 
                человека. Это снижает риск ошибок, некачественного исполнения или несоответствия ожиданиям. Кроме того, понимание компетенций 
                специалиста помогает правильно распределить задачи и избежать ситуаций, когда работа оказывается сложнее или требует других 
                навыков, чем предполагалось. Также это влияет на безопасность и долговечность результата, особенно в технических и 
                производственных сферах, где ошибка может привести к дополнительным затратам или поломкам.
            </p>
        </div>


    </section>
    <Calculator />
    <Feedback />
    <Footer />
</template>

<style scoped>
 /* секции */
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
  font-size: 20px;
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

/* сотрудники */
.workers-section {
  position: relative;
}

.slider-wrapper {
  overflow: hidden;
  width: 1832px;
  margin: 0 auto;
}

.slider {
  display: flex;
  gap: 20px;
  transition: transform 0.5s ease;
}

.card {
  max-width: 443px;
  background: #1E1E6D;
  border-radius: 0 0 20px 20px;
  overflow: hidden;
  cursor: pointer;
  flex-shrink: 0;
  transition: 0.2s;
}
.card:hover{
        background: #1d1d75c7;
    }

.info {
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 25px;
  color: white;
}

.info h3 {
  color: #D1D1E2;
  font-family: 'light';
}

.info p {
  color: #D1D1E2;
}

.buttons {
  position: absolute;
  top: 20px;
  right: 60px;
}

.nav {
  background-color: transparent;
  color: #1E1E5A;
  font-size: 24px;
}

.nav:hover {
  background-color: transparent;
  color: #1e1e5a9a;
}

/* почему */
.workersWhy-text {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.workersWhy-text p {
  width: 673px;
  margin: 0 0 0 400px;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  section {
    margin: 100px 30px;
  }

  .text {
    width: 100%;
  }

  .text h2 {
    width: 100%;
    font-size: 28px;
    text-align: center;
  }

  .section-name {
    display: none;
  }

  /* слайдер */
  .slider-wrapper {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
  }

  .slider {
    width: 110%;
    transform: none !important;
    gap: 16px;
    padding: 0;
  }

  .card {
    min-width: calc(50% - 8px);
    max-width: calc(50% - 8px);
    scroll-snap-align: start;
  }
  .card img {
    width: 100%;
    max-height: 150px;
    height: auto;
    aspect-ratio: 1 / 1;
    object-fit: cover;
  }

  .buttons {
    display: none;
  }

  .workersWhy-text p {
    width: 100%;
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  .section-name span {
    font-size: 16px;
  }

  .text h2 {
    font-size: 20px;
  }

  .slider-wrapper {
    width: 100%;
    overflow-x: auto;
  }

  .slider {
    gap: 12px;
  }

  .card {
    min-width: calc(50% - 8px); 
    max-width: calc(50% - 8px);
    scroll-snap-align: start;
  }

  .card img {
    width: 100%;
    max-height: 150px;
    height: auto;
    aspect-ratio: 1 / 1;
    object-fit: cover;
  }

  .info {
    padding: 12px;
  }

  .info h3 {
    font-size: 14px;
  }

  .info p {
    font-size: 11px;
  }

  .workersWhy-text p {
    font-size: 14px;
    padding: 0 15px;
  }

  section a {
    font-size: 24px;
  }
}

@media (max-width: 480px) {
  section {
    margin: 40px 15px;
    gap: 25px;
  }

  .section-name span {
    font-size: 14px;
  }

  .text h2 {
    font-size: 18px;
  }

  .slider {
    gap: 10px;
    padding: 0;
  }

  .card {
    min-width: calc(50% - 5px);
    max-width: calc(50% - 5px);
  }

  .info {
    padding: 10px;
  }

  .info h3 {
    font-size: 12px;
  }

  .info p {
    font-size: 10px;
  }

  .workersWhy-text p {
    font-size: 12px;
  }

  section a {
    font-size: 18px;
  }
}
</style>