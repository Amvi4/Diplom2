<template>
    <Head>
        <title>TI-Weld — Услуги</title>

        <meta
            name="description"
            content="Услуги, которые мы предоставляем"
        />
    </Head>
    <Header />
  <main>
    <h1>Услуги, которые мы предоставляем</h1>
  </main>

  <!-- УСЛУГИ -->
  <section class="services-section">
    <div class="services">
      <div class="service">
        <h3>Аргонная сварка</h3>
        <p>Точная и аккуратная сварка с идеальным швом без брызг. Подходит для нержавейки, алюминия и тонких металлов, где важен внешний вид и прочность.</p>
        <img src="../../src/images/argon.png" alt="аргон" loading="lazy">
        <a href="/services/argon">подробнее</a>
      </div>

      <div class="service">
        <h3>Сварка труб</h3>
        <p>Надёжная сварка трубопроводов любого диаметра. Обеспечиваем герметичность соединений и соответствие техническим требованиям.</p>
        <img src="../../src/images/truba.png" alt="трубы" loading="lazy">
        <a href="/services/pipe">подробнее</a>
      </div>

      <div class="service">
        <h3>Сварка нержавейки</h3>
        <p>Качественная сварка нержавеющей стали с сохранением её антикоррозийных свойств. Чистые швы без перегрева и деформаций.</p>
        <img src="../../src/images/nerzh.png" alt="нержавейка" loading="lazy">
        <a href="/services/stainless">подробнее</a>
      </div>

      <div class="service">
        <h3>Сварка конструкций</h3>
        <p>Изготовление и сварка металлоконструкций любой сложности. Прочные и долговечные решения для частных и промышленных объектов.</p>
        <img src="../../src/images/const.png" alt="конструкции"  loading="lazy">
        <a href="/services/const">подробнее</a>
      </div>
    </div>
  </section>

 <!-- ФАКТОРЫ -->
  <section class="factors-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>ФАКТОРЫ</span>
            </div>
            <h2>Факторы, влияющие на цену</h2>
        </div>
        
        <div class="factors">
          <a href="/factors/hard">1. Сложность работ</a>
          <a href="/factors/resources">2. Количество ресурсов</a>
          <a href="/factors/value">3. Стоимость металла</a>
          <a href="/factors/size">4. Размер конструкции</a>
        </div>
    </section>

     <Calculator />
     <Feedback />
     <Footer />
</template>

<script setup>
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { router, Head } from '@inertiajs/vue3'

function go(url) {
  router.visit(url)
  isOpen.value = false
}
</script>

<style scoped>
/* главная */
main {
  margin: 100px 50px;
  width: 976px;
}

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

/* услуги */
.services {
  margin: 100px 0;
  padding: 50px;
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  justify-content: center;
}

.service {
  position: relative;
  background-color: #1E1E5A;
  display: grid;
  flex-direction: column;
  border-radius: 16px;
  padding: 20px;
  gap: 173px;
  width: 412px;
}

.service h3, .service p, .service a {
  color: #D1D1E2;
}

.service p {
  position: absolute;
  width: 314px;
  top: 90px;
  right: 20px;
  font-size: 15px;
}

.service a {
  position: absolute;
  bottom: 20px;
  right: 20px;
  font-size: 15px;
}

.service a:hover {
  color: #d1d1e256;
}

/* факторы */
.factors {
  display: flex;
  flex-direction: column;
  width: 100%;
  align-items: center;
}

.factors a {
  padding: 29px 50px;
  border-top: 1px solid #1E1E5A;
  font-size: 32px;
  transition: 0.2s;
  text-decoration: none;
  width: 1820px;
  max-width: 100%;
  box-sizing: border-box;
}

.factors a:hover {
  background-color: #1E1E5A;
  color: #D1D1E2;
}

/* адаптив */

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  main {
    max-width: 90%;
    margin: 40px 20px;
  }

  main h1 {
    max-width: 100%;
    font-size: 24px;
    text-align: center;
  }

  .services {
    margin: 40px 0;
    padding: 20px;
    gap: 16px;
  }

  .service {
    width: 100%;
    max-width: 400px;
  }

  .service h3 {
    font-size: 20px;
  }

  .service p {
    font-size: 14px;
  }

  .service img {
    width: 100px;
    height: auto;
  }

  .section-name span {
    font-size: 16px;
  }
  .text{
    max-width: 100%;
  }
  .text h2 {
    font-size: 20px;
  }
  .section-name{
    display: none;
  }

  .factors a {
    font-size: 18px;
    padding: 15px 20px;
    text-align: center;
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

  main {
    margin: 30px 15px;
  }

  main h1 {
    font-size: 20px;
  }

  .services {
    padding: 15px;
    margin: 20px 0;
  }

  .service {
    padding: 15px;
  }

  .service h3 {
    font-size: 18px;
  }

  .service p {
    font-size: 12px;
  }

  .service a {
    font-size: 13px;
  }

  .section-name span {
    font-size: 14px;
  }

  .text h2 {
    font-size: 18px;
  }

  .factors a {
    font-size: 14px;
    padding: 12px 15px;
  }

  section a {
    font-size: 18px;
  }
}
</style>