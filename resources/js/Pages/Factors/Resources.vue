<script setup>
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head>
        <title>TI-Weld - Количество ресурсов</title>

        <meta
            name="description"
            content="Количество ресурсов прямо пропорционально сложности — чем труднее задача, тем больше их уходит."
        />
    </Head>
    <Header />

    <main>
        <h1>Количество ресурсов</h1>
        <p>Клиент часто думает: «Материалы — ну, электроды и проволока, что там считать?» А на деле список ресурсов длиннее и тяжелее для бюджета, чем кажется. Причем количество ресурсов прямо пропорционально сложности — чем труднее задача, тем больше их уходит. </p>
    </main>

    <!-- ФАКТОРЫ -->
  <section class="factors-section">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>ФАКТОРЫ</span>
            </div>
            <h2>Факторы, влияющие на русурсы</h2>
        </div>
        
        <div class="factors">
          <div class="factor">
            <img src="../../../src/icons/type.svg" alt="картинка" loading="lazy">
            <h3> Расходные материалы на сварку</h3>
            <p>Электроды, проволока, присадочные прутки. Защитные газы (аргон, углекислота, гелий — самый дорогой). Флюсы, керамические подкладки, сопла, газовые линзы. Простой пример: сварить метр шва на полуавтомате углекислотой — копейки. А сварить метр алюминия аргоном с гелием — дорого в 5–7 раз только по газам.</p>
          </div>

          <div class="factor">
            <img src="../../../src/icons/value.svg" alt="картинка" loading="lazy">
            <h3>Подготовка и обработка металла</h3>
            <p>Разделка кромок под сварку (снять фаску, зачистить до блеска). Обезжиривание — специальные составы стоят денег. Подогрев перед сваркой (пропан, горелки, термопокрывала) Термообработка после сварки (отпуск, нормализация) — это отдельные энергозатраты и оборудование.</p>
          </div>

          <div class="factor">
            <img src="../../../src/icons/tolshina.svg" alt="картинка" loading="lazy">
            <h3>Энергозатраты</h3>
            <p>Сварочный аппарат потребляет киловатты. На промышленных объектах ставят отдельные счетчики. Тяжелые режимы (толстый металл, много проходов) — счёт за свет растет.</p>
          </div>

          <div class="factor">
            <img src="../../../src/icons/kachestvo.svg" alt="картинка" loading="lazy">
            <h3>Оборудование и его износ</h3>
            <p>За час работы аппарат, горелка, кабели, оснастка стареют. Сложные работы требуют дорогой техники: аргонодуговые источники с переменным током, позиционеры для вращения деталей, роботизированные комплексы. Амортизацию никто не отменял — она встроена в час работы.</p>
          </div>
        </div>
    </section>

    <Calculator />
    <Feedback />
    <Footer />
</template>

<style scoped>
main{
  display: flex;
  flex-direction: column;
  gap: 20px;
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
main {
  padding: 50px;
}

main h1 {
  font-size: 36px;
}

main p {
  width: 443px;
}

/* факторы */
.factors {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  justify-content: center;
}

.factor {
  padding: 30px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  justify-content: end;
  background-color: #1E1E5A;
  border-radius: 16px;
  width: 893px;
  height: 353px;
}

.factor img {
  max-width: 70px;
}

.factor h3 {
  color: #D1D1E2;
}

.factor p {
  color: #d1d1e26c;
  width: 639px;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  .factor {
    width: calc(50% - 16px);
    height: auto;
    min-height: 320px;
  }

  .factor p {
    width: 100%;
  }
}

@media (max-width: 992px) {
  section {
    margin: 100px 30px;
    gap: 40px;
  }

  main {
    padding: 40px;
  }

  main h1 {
    font-size: 32px;
  }

  main p {
    width: 100%;
    max-width: 443px;
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

  .factor {
    width: 100%;
    max-width: 700px;
    min-height: auto;
  }

  .factor p {
    width: 100%;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }
  .section-name{
    display: none;
  }

  main {
    padding: 30px 20px;
  }

  main h1 {
    font-size: 24px;
  }

  main p {
    font-size: 14px;
  }

  .factor {
    padding: 20px;
    gap: 15px;
  }

  .factor img {
    max-width: 50px;
  }

  .factor h3 {
    font-size: 18px;
  }

  .factor p {
    font-size: 14px;
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

  main {
    padding: 20px 15px;
  }

  main h1 {
    font-size: 20px;
  }

  main p {
    font-size: 12px;
  }

  .factor {
    padding: 15px;
    gap: 12px;
  }

  .factor img {
    max-width: 40px;
  }

  .factor h3 {
    font-size: 16px;
  }

  .factor p {
    font-size: 12px;
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