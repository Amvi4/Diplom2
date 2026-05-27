<script setup>
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head>
        <title>TI-Weld — Металлическая конструкция</title>

        <meta
            name="description"
            content="Металлическая конструкция, выполненная на заказ"
        />
    </Head>
    <Header />
    <main class="main-service">
        <div class="service">
            <h1>Железная конструкция</h1>
            <p>Наша работа — металлическая скамья с интегрированным столом, выполненная с учетом прочности, удобства и долговечности.  </p>
            <div class="images">
                <img src="../../../src/images/metallconst1.png" alt="аргонная сварка" loading="lazy">
                <img src="../../../src/images/metallconst2.png" alt="аргонная сварка" class="img-1" loading="lazy">
            </div>
        </div>
    </main>

    <section class="howToUse-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>НЮАНСЫ</span>
            </div>
            <h2>Нюансы по работе</h2>
        </div>
        <div class="uses">
            <div class="use">
                <img src="../../../src/icons/warning.svg" alt="галочка" loading="lazy">
                <h3>Геометрия и эргономика</h3>
                <p>Важно точно выдержать высоту сиденья и стола относительно друг друга, иначе пользоваться изделием будет неудобно.</p>
            </div>
            <div class="use">
                <img src="../../../src/icons/warning.svg" alt="галочка" loading="lazy">
                <h3>Жесткость конструкции</h3>
                <p>Так как скамья объединена со столом, нагрузка распределяется неравномерно. Основные точки напряжения — места соединения опор.</p>
            </div>
            <div class="use">
                <img src="../../../src/icons/warning.svg" alt="галочка" loading="lazy">
                <h3>Защита от коррозии</h3>
                <p>Для уличного использования критично, чтобы металл был хорошо подготовлен: зачистка, грунт. это опытные специалисты.</p>
            </div>
            <div class="use" id="last">
                <img src="../../../src/icons/warning.svg" alt="галочка" loading="lazy">
                <h3>устойчивость и монтаж</h3>
                <p>Конструкция должна быть рассчитана на вандальные нагрузки и погодные условия (ветер, неровное основание).</p>
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

/* АДАПТИВ */
@media (max-width: 1200px) {
  .main-service {
    padding: 40px;
    justify-content: center;
  }

  .service {
    width: 100%;
    max-width: 900px;
    align-items: center;
    text-align: center;
  }

  .service p {
    width: 100%;
    max-width: 500px;
  }

  .images {
    flex-wrap: wrap;
    justify-content: center;
  }

  .images img {
    max-width: 100%;
    height: auto;
  }

  .text {
    width: 100%;
  }
}

@media (max-width: 992px) {
  section {
    margin: 100px 30px;
    gap: 40px;
  }

  .main-service {
    padding: 30px;
    justify-content: center;
  }

  .service h1 {
    font-size: 32px;
  }

  .service p {
    font-size: 16px;
  }

  .uses {
    flex-wrap: wrap;
    justify-content: center;
  }

  .use {
    width: calc(50% - 2px);
    border-right: none;
    border-left: none;
    height: auto;
    min-height: 300px;
    border-bottom: none;
  }



  #last {
    border-right: none;
    border-bottom: 1px solid #1E1E5A;
  }

  .text h2 {
    width: 100%;
    font-size: 24px;
    text-align: center;
  }

  .section-name {
    display: none;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  .main-service {
    padding: 20px;
    justify-content: center;
  }

  .service h1 {
    font-size: 24px;
  }

  .service p {
    font-size: 14px;
  }

  .images {
    gap: 10px;
  }
  .img-1{
    display: none;
  }
  .use {
    width: 100%;
    border-right: none;
    min-height: auto;
    padding: 60px 15px 15px 15px;
    gap: 15px;
  }

  .use h3 {
    font-size: 18px;
  }

  .use p {
    font-size: 14px;
  }

  .use img {
    max-width: 50px;
    top: 15px;
    left: 15px;
  }

  .section-name span {
    font-size: 16px;
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
    justify-content: center;
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
    border-right: none;
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