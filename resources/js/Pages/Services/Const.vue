<script setup>
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head>
        <title>TI-Weld — Сварка конструкций</title>

        <meta
            name="description"
            content="Сварка конструкций — это изготовление и соединение несущих и вспомогательных элементов из металлопроката"
        />
    </Head>
    <Header />
    <main class="main-service">
        <div class="service">
            <h1>Сварка конструкций</h1>
            <p>Сварка конструкций — это изготовление и соединение несущих и вспомогательных элементов из металлопроката: рам, ферм, каркасов, кронштейнов, балок, лестничных маршей, ворот, навесов для автомобилей, бытовок, ангаров, промышленных стеллажей и многого другого. </p>
            <div class="images">
                <img src="../../../src/images/const1.png" alt="аргонная сварка">
                <img src="../../../src/images/const2.png" alt="аргонная сварка" class="img-1">
            </div>
        </div>
    </main>

    <section class="howToUse-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>КОГДА ИСПОЛЬЗОВАТЬ</span>
            </div>
            <h2>Когда лучше использовать?</h2>
        </div>
        <div class="uses">
            <div class="use">
                <img src="../../../src/icons/galka.svg" alt="галочка" loading="lazy">
                <h3>Возведение несущего каркаса</h3>
                <p>Дома, навеса, беседки, ангара. Болты не дадут той жёсткости и пространственной устойчивости, которую обеспечивает качественный сварной узел.</p>
            </div>
            <div class="use">
                <img src="../../../src/icons/galka.svg" alt="галочка" loading="lazy">
                <h3>Производство ворот и калиток</h3>
                <p>Это бюджетно, надёжно и долговечно. Болтовая лестница со временем расшатается, сварная будет стоять как влитая.</p>
            </div>
            <div class="use">
                <img src="../../../src/icons/galka.svg" alt="галочка" loading="lazy">
                <h3>Крепление оборудования к полу</h3>
                <p>Сварной каркас, обшитый листом, не перекашивается, не «ведёт» от ветра и температур. </p>
            </div>
            <div class="use" id="last">
                <img src="../../../src/icons/galka.svg" alt="галочка" loading="lazy">
                <h3>Промышленне конструкциии</h3>
                <p>кронштейны, опоры, стойки, закладные детали. Сварка обеспечивает надёжность там, где вибрация и нагрузки неизбежны.</p>
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

/* главная */
.main-service {
  padding: 50px;
  display: flex;
  justify-content: end;
}

.service {
  display: flex;
  flex-direction: column;
  width: 1131px;
  gap: 30px;
}

.service p {
  width: 400px;
}

.images {
  display: flex;
  gap: 16px;
}

.img-1 {
  max-height: 208px;
}

/* когда использовать */
.uses {
  display: flex;
}

.use {
  border: 1px solid #1E1E5A;
  border-right: 0px;
  position: relative;
  display: flex;
  flex-direction: column;
  width: 454px;
  height: 371px;
  padding: 20px;
  justify-content: end;
  gap: 30px;
}

.use img {
  position: absolute;
  max-width: 69px;
  top: 20px;
  left: 20px;
}

#last {
  border-right: 1px solid #1E1E5A;
}

/* адаптив */


@media (max-width: 768px) {
    .main-service{
        margin: 20px;
        justify-content: center;
    }
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  .main-service {
    padding: 20px;
    max-width: 100%;
    align-items: center;
  }
  .service{
    align-items: center;
  }

  .service p {
    font-size: 14px;
    max-width: 90%;
  }

  .images{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .images img{
    max-width: 80%;
  }
  .img-1{
    display: none;
  }
  .uses{
    display: flex;
    flex-direction: column;
  }

  .use {
    width: 100%;
    padding: 0;
    border-right: 1px solid #1E1E5A;
    height: 160px;
    gap: 15px;
  }

  .use h3 {
    font-size: 18px;
  }

  .use p {
    font-size: 14px;
  }

  .use img {
    display: none;
  }

  .section-name span {
    font-size: 16px;
  }
  .text{
    max-width: 100%;
  }
  .section-name{
    display: none;
  }

  .text h2 {
    font-size: 20px;
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

  .main-service {
    padding: 15px;
  }

  .service {
    gap: 20px;
  }

  .service h1 {
    font-size: 20px;
  }

  .service p {
    font-size: 12px;
  }

  .use {
    padding: 50px 12px 12px 12px;
    gap: 10px;
  }

  .use h3 {
    font-size: 16px;
  }

  .use p {
    font-size: 12px;
  }

  .use img {
    max-width: 40px;
    top: 12px;
    left: 12px;
  }

  .section-name span {
    font-size: 14px;
  }

  .text h2 {
    font-size: 18px;
  }

  section a {
    font-size: 18px;
  }
}
</style>