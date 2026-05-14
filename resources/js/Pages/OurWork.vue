<script setup>
import { Head } from '@inertiajs/vue3';
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';


</script>

<template>
    <Head>
        <title>TI-Weld — Подход к работе</title>

        <meta
            name="description"
            content="Наш подход к работе, которому мы придерживаемся"
        />
    </Head>
    <Header />

    <main class="main-ourWork">
        <h1>Наш подход к работе</h1>
    </main>

    <!-- этапы -->
     <section class="stage-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>ЭТАПЫ</span>
            </div>
            <h2>Этапы, которым мы следуем</h2>
        </div>

        <div class="stage">
          <a href="/stages/first">Первый этап: разработка и согласование проекта</a>
          <a href="/stages/second">Второй этап: подготовка материалов</a>
          <a href="/stages/third">Третий этап: сборка и сварочные работы</a>
          <a href="/stages/fourth">Четвертый этап: зачистка и обработка поверхности</a>
          <a href="/stages/fifth">Пятый этап: антикоррозийная защита и покраска</a>
          <a href="/stages/sixth">Шестой этап: финальная проверка и подготовка к установке</a>
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
.main-ourWork {
  margin: 50px;
}

.main-ourWork h1 {
  font-size: 36px;
}

/* этапы */
.stage {
  display: flex;
  flex-direction: column;
  width: 100%;
  align-items: start;
}

.stage a {
  padding: 29px 50px;
  border-top: 1px solid #1E1E5A;
  font-size: 32px;
  transition: 0.2s;
  text-decoration: none;
  width: 1820px;
  max-width: 100%;
  box-sizing: border-box;
}

.stage a:hover {
  background-color: #1E1E5A;
  color: #D1D1E2;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  .stage a {
    width: 100%;
    font-size: 28px;
    padding: 25px 30px;
    text-align: center;
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

  .main-ourWork {
    margin: 40px 30px;
  }

  .main-ourWork h1 {
    font-size: 32px;
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

  .section-name span {
    font-size: 18px;
  }

  .stage a {
    font-size: 24px;
    padding: 20px 25px;
    text-align: start;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  .main-ourWork {
    margin: 30px 20px;
  }

  .main-ourWork h1 {
    font-size: 24px;
    text-align: center;
  }

  .section-name {
    display: none;
  }


  .text h2 {
    font-size: 20px;
  }

  .stage a {
    font-size: 18px;
    padding: 15px 20px;
    text-align: start;
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

  .main-ourWork {
    margin: 20px 15px;
  }

  .main-ourWork h1 {
    font-size: 20px;
  }

  .section-name span {
    font-size: 14px;
  }

  .text h2 {
    font-size: 18px;
  }

  .stage a {
    font-size: 14px;
    padding: 12px 15px;
    text-align: start;
  }

  section a {
    font-size: 18px;
  }
}
</style>