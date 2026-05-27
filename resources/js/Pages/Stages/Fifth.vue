<script setup>
import Calculator from '@/Components/Calculator.vue';
import Feedback from '@/Components/Feedback.vue';
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head>
        <title>TI-Weld — Пятый этап</title>

        <meta
            name="description"
            content="Разработка и согласование проекта"
        />
    </Head>
    <Header />

    <main class="main-stage">
        <h1>Пятый этап</h1>
        <div class="stage">
            <div class="stage-text">
                <h2>Разработка и согласование проекта</h2>
                <p>Специалист по аргонной сварке важен тем, что от его навыков напрямую зависит прочность, 
                    аккуратность и долговечность металлоконструкции. Аргонная сварка (TIG) требует высокой 
                    точности и опыта, потому что работа ведётся с тонкими и сложными металлами, такими как 
                    нержавеющая сталь, алюминий и их сплавы, где любая ошибка может привести к деформации, 
                    пористости шва или снижению прочности соединения. Квалифицированный сварщик правильно 
                    подбирает режимы сварки, силу тока и защиту аргоном, что позволяет получить чистый, ровный 
                    и герметичный шов без окалины и лишних дефектов. Кроме того, опыт специалиста влияет на 
                    внешний вид изделия, что особенно важно для конструкций, находящихся на виду, таких как 
                    мебель, скамейки или декоративные элементы. Также грамотный подход снижает риск коррозии 
                    в местах соединений и увеличивает срок службы изделия, что делает работу не только качественной, 
                    но и экономически выгодной в долгосрочной перспективе.
                </p>
            </div>
            <img src="../../../src/images/stage1.png" alt="этап" loading="lazy">
        </div>
    </main>

    <section class="nuanses">
        <div class="text" id="text-project">
            <div class="section-name">
                    <div class="box"></div>
                    <span>НЮАНСЫ</span>
            </div>
            <h2>Нюансы первого этапа</h2>
        </div>
        <div class="nuanses-text">
            <p>разработки и согласования проекта — заключаются в том, что именно здесь закладывается основа всего изделия, 
                и любые неточности потом сложно исправить. Важно максимально точно определить размеры конструкции с учетом 
                места установки, чтобы скамья со столом вписалась в пространство и была удобной в использовании. Также необходимо 
                правильно рассчитать высоту сиденья, столешницы и расстояние между элементами, потому что от этого зависит эргономика 
                и комфорт. Отдельное внимание уделяется нагрузкам и устойчивости конструкции. На этом этапе продумывается, как будет 
                распределяться вес, нужны ли дополнительные опоры или усиления, а также будет ли изделие крепиться к основанию. 
                Ошибка в расчетах может привести к расшатыванию или деформации в процессе эксплуатации.
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
.main-stage {
  padding: 50px;
  display: flex;
  flex-direction: column;
  text-align: center;
  gap: 50px;
}

.stage {
  display: flex;
  text-align: start;
  gap: 244px;
}

.stage-text {
  display: flex;
  flex-direction: column;
  gap: 30px;
  width: 674px;
}

.stage-text h2 {
  font-size: 24px;
}

/* нюансы */
.nuanses-text {
  width: 65%;
  display: flex;
  justify-content: end;
}

.nuanses-text p {
  width: 672px;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  .stage {
    gap: 100px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .stage-text {
    width: 100%;
    max-width: 600px;
  }

  .stage img {
    max-width: 400px;
    height: auto;
  }

  .nuanses-text {
    width: 80%;
    justify-content: center;
  }

  .nuanses-text p {
    width: 100%;
    max-width: 672px;
  }
}

@media (max-width: 992px) {
  section {
    margin: 100px 30px;
    gap: 40px;
  }

  .main-stage {
    padding: 40px;
    gap: 40px;
  }

  .main-stage h1 {
    font-size: 32px;
  }

  .stage {
    gap: 50px;
    flex-direction: column;
    align-items: center;
  }

  .stage-text {
    width: 100%;
    text-align: center;
    align-items: center;
  }

  .stage-text h2 {
    font-size: 22px;
  }

  .stage-text p {
    font-size: 16px;
    text-align: left;
  }

  .stage img {
    max-width: 100%;
    height: auto;
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
    display: none;
  }

  .nuanses-text {
    width: 100%;
    justify-content: center;
    padding: 0 20px;
  }

  .nuanses-text p {
    width: 100%;
    font-size: 16px;
  }
}

@media (max-width: 768px) {
  section {
    margin: 60px 20px;
    gap: 30px;
  }

  .main-stage {
    padding: 30px 20px;
    gap: 30px;
  }

  .main-stage h1 {
    font-size: 24px;
  }

  .stage-text {
    gap: 20px;
  }

  .stage-text h2 {
    font-size: 20px;
  }

  .stage-text p {
    font-size: 14px;
  }

  .section-name span {
    font-size: 16px;
  }

  .text h2 {
    font-size: 20px;
  }

  .nuanses-text p {
    font-size: 14px;
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

  .main-stage {
    padding: 20px 15px;
    gap: 25px;
  }

  .main-stage h1 {
    font-size: 20px;
  }

  .stage-text {
    gap: 15px;
  }

  .stage-text h2 {
    font-size: 18px;
  }

  .stage-text p {
    font-size: 12px;
  }

  .section-name span {
    font-size: 14px;
  }

  .text h2 {
    font-size: 18px;
  }

  .nuanses-text p {
    font-size: 12px;
  }

  section a {
    font-size: 18px;
  }
}
</style>