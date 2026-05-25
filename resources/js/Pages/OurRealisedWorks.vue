<script setup>
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { router, Head } from '@inertiajs/vue3';

function go(url) {
  router.visit(url)
  isOpen.value = false
}
</script>

<template>
    <Head>
        <title>TI-Weld — Реализованные работы</title>

        <meta
            name="description"
            content="Наши реализованные работы, которыми мы гордимся"
        />
    </Head>
<Header />

    <main class="works">
        <h1>Наши реализованные работы</h1>
    </main>
    <!-- ПРОЕКТЫ -->
    <section class="project-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>ПРОЕКТЫ / РАБОТЫ</span>
            </div>
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


        <div class="projects">
            <div class="project" id="project1">
                <img src="../../src/images/montage.png" alt="лестница" loading="lazy">
                <h3>Монтаж металлического </h3>
                <button @click="go('/works/montage')">подробнее</button>
            </div>
            <p class="text-info">Изготовление и обработка металлических деталей с высокой точностью и вниманием к каждому этапу. Работа выполнена с учетом технических требований и последующей надежной эксплуатацией. Гарантируем качество сварных соединений и аккуратный внешний вид готового изделия.</p>
        </div>


        <div class="projects">
            <div class="project" id="project1">
                <img src="../../src/images/metallconst.png" alt="лестница" loading="lazy">
                <h3>Железная конструкция</h3>
                <p>В процессе использованы качественные материалы и соблюдены все технологические нормы, что обеспечивает прочность и долговечность изделия. Особое внимание уделено аккуратности сварных швов и геометрии конструкции, благодаря чему готовое изделие отличается надежностью и стабильностью в эксплуатации.</p>
                <button @click="go('/works/metall-const')">подробнее</button>
            </div>
            <div class="project" id="project2">
                <img src="../../src/images/metallstairs.png" alt="скамья" loading="lazy">
                <h3>Железная лестница</h3>
                <p>Практичное и долговечное решение для благоустройства участка. Конструкция выполнена из прочного металла с аккуратными сварными швами и покрыта защитной краской для устойчивости к погодным условиям.</p>
                <button @click="go('/works/metall-stairs')">подробнее</button>
            </div>
            <div class="project" id="project1">
                <img src="../../src/images/metallcart.png" alt="забор" loading="lazy">
                <h3>Железная тележка</h3>
                <p>Конструкция выполнена из прочного металла с надежными сварными соединениями, обеспечивающими устойчивость и долговечность при эксплуатации. Продуманная рама и колесная база позволяют удобно перемещать грузы, а точная сборка гарантирует надежность и практичность в повседневном использовании.</p>
                <button @click="go('/works/metall-cart')">подробнее</button>
            </div>
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

.section-name {
  position: absolute;
  top: 0px;
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

/* Главная */
.works {
  padding: 50px;
}

.works h1 {
  font-size: 36px;
}

/* проекты */
.projects {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  justify-content: center;
}

.project {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 443px;
}

.project p {
  max-height: 69px;
  text-overflow: ellipsis;
  overflow: hidden;
}

#project2 {
  width: 885px;
}

#text-project h2 {
  width: 854px;
}

.project button {
  text-align: center;
  margin: 0;
  padding: 0;
    min-width: 100%;
  background-color: transparent;
  border-radius: 50px;
  border: 1px solid #1E1E5A;
  color: #1E1E5A;
  padding: 10px 20px;
  cursor: pointer;
}

.project button:hover {
  color: white;
  border: 1px solid #1e1e5a36;
  background-color: #1E1E5A;
}

.text-info {
  display: flex;
  width: 400px;
  gap: 16px;
  padding: 0;
  margin: 0;
}

#min {
  margin: 100px;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  .projects {
    justify-content: center;
  }

  #project2 {
    width: 443px;
  }

  .text-info {
    width: 100%;
    max-width: 443px;
  }
}

@media (max-width: 992px) {
  section {
    margin: 100px 30px;
    gap: 40px;
  }

  .works {
    padding: 40px;
  }

  .works h1 {
    font-size: 32px;
  }

  .text {
    width: 100%;
  }

  .section-name {
    position: static;
    justify-content: center;
    margin-bottom: 20px;
  }

  .projects {
    flex-direction: column;
    align-items: center;
  }

  .project,
  #project2 {
    width: 100%;
    max-width: 500px;
  }

  .project img {
    width: 100%;
    height: auto;
  }

  .text-info {
    width: 100%;
    max-width: 500px;
    text-align: center;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  .works {
    padding: 30px 20px;
  }

  .works h1 {
    font-size: 24px;
    text-align: center;
  }
  .section-name{
    display: none;
  }
  .section-name span {
    font-size: 16px;
  }

  .project h3 {
    font-size: 18px;
  }

  .project p {
    font-size: 14px;
    max-height: 80px;
  }

  .project button {
    padding: 8px 16px;
    font-size: 14px;
  }

  .text-info {
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

  .works {
    padding: 20px 15px;
  }

  .works h1 {
    font-size: 20px;
  }

  .section-name span {
    font-size: 14px;
  }

  .project {
    gap: 12px;
  }

  .project h3 {
    font-size: 16px;
  }

  .project p {
    font-size: 12px;
    max-height: 90px;
  }

  .project button {
    padding: 6px 12px;
    font-size: 12px;
  }

  .text-info {
    font-size: 12px;
  }

  section a {
    font-size: 18px;
  }
}
</style>