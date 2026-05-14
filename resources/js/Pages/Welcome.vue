<script setup>
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import Map from '@/Components/Map.vue';
import { router, usePage, useForm, Head } from '@inertiajs/vue3';
import { ref, } from 'vue';

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

function openWorker(id) {
  router.visit(`/workers/${id}`)
}
// обратная связь
const form = useForm({
  name: '',
  phone: '',
  agree: false
})

function submit() {
  form.post('/feedback/step')
}
</script>

<template>
    <Head>
        <title>TI-Weld — Сварочные услуги</title>

        <meta
            name="description"
            content="Профессиональные сварочные услуги и металлоконструкции."
        />
    </Head>
    <Header />

    <!-- ГЛАВНАЯ -->
    <main class="main">
        <img src="../../src/images/mainimg.png" alt="главная">
        <div class="main-texts">
            <h1>Надежная сварка металла любой сложности</h1>
            <div class="main-text">
                <p>TI-Weld — это опытные специалисты и современное оборудование. Выполняем сварку конструкций, ремонт металлоизделий и индивидуальные проекты с гарантией результата.</p>
                <div class="main-buttons">
                    <button @click="go('/calculator')">КАЛЬКУЛЯТОР</button>
                    <button @click="go('/services')">УСЛУГИ</button>
                </div>
            </div>
        </div>
    </main>

    <!-- О НАС -->
    <section class="about-section">
        <div class="text">
            <div class="section-name">
                    <div class="box"></div>
                    <span>О НАС</span>
            </div>
            <h2>Когда сварка сделана один раз и навсегда — про нас забывают. И это лучший комплимент, который мы получаем.</h2>
        </div>

        <div class="events">
            <div class="event">
                <h3>>8000</h3>
                <span>Выполненных работ</span>
            </div>
            <div class="event">
                <h3>5 лет</h3>
                <span>Средний опыт работы специалистов</span>
            </div>
            <div class="event">
                <h3>5000</h3>
                <span>Отзывов оставили наши клиенты</span>
            </div>

        </div>

        <img src="../../src/images/about-img.png" alt="о нас" loading="lazy">

        <div class="citata">
            <h2>"Сварка не терпит суеты. Хороший шов — это не просто расплавленный металл. Это характер, выдержка и честность перед заказчиком.""</h2>
            <div class="citata-name">
                <h3><b>Фролов Иван</b></h3>
                <p>Руководитель компании</p>
            </div>
        </div>
    </section>

    <!-- ПРОЕКТЫ -->
    <section class="project-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>ПРОЕКТЫ / РАБОТЫ</span>
            </div>
            <h2>Наши проекты, которыми мы гордимся , и готовы сделать такие же и вам</h2>
        </div>
        <div class="projects">
            <div class="project" id="project1">
                <img src="../../src/images/project-stairs.png" alt="лестница" loading="lazy">
                <h3>Металлическая лестница</h3>
                <p>это опытные специалисты и современное оборудование. Выполняем сварку конструкций, ремонт металлоизделий и индивидуальные проекты с гарантией результата.</p>
                <button @click="go('/works/stairs')">подробнее</button>
            </div>
            <div class="project" id="project2">
                <img src="../../src/images/project-bench.png" alt="скамья" loading="lazy">
                <h3>Металлическая скамья</h3>
                <p>Практичное и долговечное решение для благоустройства участка. Конструкция выполнена из прочного металла с аккуратными сварными швами и покрыта защитной краской для устойчивости к погодным условиям.</p>
                <button @click="go('/works/bench')">подробнее</button>
            </div>
            <div class="project" id="project1">
                <img src="../../src/images/project-fence.png" alt="забор" loading="lazy">
                <h3>Металлический забор</h3>
                <p>Изготовление и обработка металлических деталей с высокой точностью и вниманием к каждому этапу. Работа выполнена с учетом технических требований и последующей надежной эксплуатацией. Гарантируем качество сварных соединений и аккуратный внешний вид готового изделия.</p>
                <button @click="go('/works/fence')">подробнее</button>
            </div>
        </div>

        <a href="/works">Смотреть все проекты</a>
    </section>

    <!-- ПОДХОД К РАБОТЕ -->
    <section class="work-section">
        <div class="text" id="text-work">
            <div class="section-name">
                    <div class="box"></div>
                    <span>ПОДХОД К РАБОТЕ</span>
            </div>
            <h2>Подход к работе, который начинается не со сварочного аппарата, а с вопроса: «А как сделать, чтобы это не сломалось через месяц?»</h2>
        </div>

        <div class="work-section-text">
            <img src="../../src/images/work.png" alt="подход к работе" loading="lazy">
            <div class="work-section-texts">
                <p class="big-text">Мы не берёмся за всё подряд. Сначала смотрим на деталь, оцениваем металл, думаем о нагрузках. 
                    Только потом включаем аппарат. Это называется профессиональной привычкой — не обещать, пока не 
                    понял, что сможешь сделать хорошо. Выезжаем на объекты, варим в мастерской, берём срочные заказы.
                     Что значит наш подход на деле? Мы не экономим время на подготовке.
                    </p>
                <div class="work-section-texts-2">
                    <p>Мы не учились по красивым учебникам, мы учились на реальных объектах, когда пальцы не гнутся 
                        от холода, деталь не лезет на место, а заказчик стоит над душой и торопит. Именно тогда мы 
                        поняли, что сварка должна выдерживать не нагрузку по чертежу, а реальную жизнь — с перепадами т
                        емператур, грязью, кривыми руками монтажников и вечной спешкой. Поэтому наш подход простой: мы в
                        арим с запасом прочности, проверяем как для себя и не успокаиваемся, пока шов не станет не просто крепким, 
                        а ещё и аккуратным. 
                    </p>

                    <p>Мы не учились по красивым учебникам, мы учились на реальных объектах, когда пальцы не гнутся от холода, деталь 
                        не лезет на место, а заказчик стоит над душой и торопит. Именно тогда мы поняли, что сварка должна выдерживать 
                        не нагрузку по чертежу, а реальную жизнь — с перепадами температур, грязью, кривыми руками монтажников и вечной 
                        спешкой. Поэтому наш подход простой: мы варим с запасом прочности, проверяем как для себя и не успокаиваемся, пока 
                        шов не станет не просто крепким, а ещё и аккуратным. 
                        
                    </p>
                </div>
            </div>
        </div>

        <a href="/ourwork">Подробнее о нашем подходе</a>
    </section>

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

          <img :src="worker.photo || '/images/default-worker.jpg'" alt="сотрудник"  loading="lazy">

          <div class="info">

            <h3>{{ worker.name }}</h3>

            <p>{{ worker.position }}</p>
          </div>
        </div>
      </div>
    </div>
        <a href="http://">Больше сотрудников</a>
    </section>

    
    <Feedback />
    <Footer />
</template>

<style scoped>
    /* главная */
    .main{
        margin: 100px 50px;
        display: flex;
        justify-content: end;
        flex-direction: column;
        height: 850px;
    }
    main img{
        display: block;
        width: 800px;
        position: absolute;
        top: 42%;
        left: 50%;
        transform: translate(-50%, -50%);       
    }
    .main-text{
        display: flex;
        justify-content: space-between;
        align-items: end;

    }
    .main-text p{
        max-width: 443px;
    }
    .main-buttons{
        display: flex;
        gap: 18px;
    }
    .main-text button{
        width: 291px;
    }
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
        font-size: 20px;
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
    /* О нас */
    .events{
        display: flex;
        gap: 16px;
    }
    .event{
        width: 443px;

    }
    .event h3{
        font-size: 82px;
    }
    .event p{
        font-size: 20px;
    }
    .citata{
        display: flex;
        flex-direction: column;
        gap: 38px;
        width: 1361px;
    }
    .citata h2{
        font-size: 24px;
    }
    .citata p{
        color: #1e1e5a9a;
    }
    /* проекты */
    .projects {
        display: flex;
        gap: 16px;
    }
    .project{

        display: flex;
        flex-direction: column;
        gap: 16px;
        width: 443px;
    }
    .project p{
        max-height: 69px;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    #project2{
        width: 902px;
    }
    #text-project h2{
        width: 854px;
    }
    .project button{
        background-color: transparent;
        border-radius: 50px;
        border: 1px solid #1E1E5A;
        color: #1E1E5A;
    }
    .project button:hover{
        color: #1e1e5a36;
        border: 1px solid #1e1e5a36;
    }
    /* подход к работе */
    #text-work h2{
        width: 1300px;
    }
    .work-section-text{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 246px;
    }
    .work-section-texts{
        display: flex;
        flex-direction: column;
        width: 902px;
        gap: 20px;

    }
    .work-section-texts-2{
        display: flex;
        gap: 16px;
    }
    .big-text{
        font-size: 24px;
        color: #1E1E5A;
        font-family: 'regular';
    }
    /* сотрудники */
    .workers-section{
        position: relative;
    }
   .workers {

  transition: 0.3s;
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
.buttons{
    position: absolute;
    top: 20px;
    right: 60px;
}
.nav{
    background-color: transparent;
    color: #1E1E5A;
    font-size: 24px;
}
.nav:hover{
    background-color: transparent;
    color: #1e1e5a9a;
}

/* адаптив */

@media (max-width: 768px) {
    /* секции */
    section{
        margin: 50px 20px;
        max-width: 100%;
    }
    .section-name{
        display: none;
    }
    .text{
        max-width: 100%;
    }
    .text h2{
        width: 100%;
    }
    section a{
        font-size: 16px;
    }
    /* главная */
    .main{
        margin: 20px;
        padding: 0;
        height: 310px;
    }
    main img{
        display: none;
    }
    .main-texts{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .main-texts h1{
        max-width: 100%;
    }
    .main-text{
        display: flex;
        flex-direction: column;
        align-items: start;
        gap: 10px;
    }
    /* о нас */
    .event h3{
        font-size: 20px;
    }
    .events{
        display: flex;
        justify-content: space-between;
        align-items: normal;
    }
    .event{
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }
    .event span{
        display: flex;
        flex-direction: column;
        font-size: 12px;
        gap: 0;

    }
    .citata{
        width: 100%;
    }
    .citata h2{
        font-size: 18px;
    }
    /* проекты */
    .projects{
        display: flex;
        flex-direction: column;
        padding: 50px 20px;
    }
    .project{
        width: 100%;
    }
    .project button{
        min-width: 100%;
    }
    #project2{
        width: 100%;
    }
    .project img{
        height: 150px;
    }
    .project-section h2{
        max-width: 90%;
    }
    /* подход к работе */
    .work-section-text {
        display: flex;
        flex-direction: column;
        justify-content: flex-start; /* ← вместо space-between */
        gap: 30px;
    }
    .work-section-texts{
        width: 100%;
    }
    .work-section-text img{
        max-width: 300px;
    }
    .big-text{
        font-size: 12px;
        width: 100%;
        color: #1e1e5a9a;
    }
    .work-section-texts-2{
        display: none;
    }
    /* сотрудники */
     .workers-section {
    position: relative;
    overflow: hidden;
  }

  .slider-wrapper {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
  }

  .slider {
    width: 110%;
    transform: none !important;
    gap: 16px;
    padding: 0 20px;
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
    padding: 15px;
  }

  .info h3 {
    font-size: 16px;
  }

  .info p {
    font-size: 12px;
  }

  .buttons {
    display: none; 
  }

  .workers-section a {
    font-size: 16px;
    margin-top: 20px;
  }
}
</style>
