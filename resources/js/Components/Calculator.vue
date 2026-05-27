<script setup>
import { router } from '@inertiajs/vue3';
function go(url) {
  router.visit(url)
  isOpen.value = false
}
</script>

<template>
    <!-- КАКЛЬКУЛЯТОР -->
     <section class="calc-section">
        <div class="calc">
          <h2>Вам нужно рассчитать стоимость под свои требования?</h2>
          <p>Рассчитайте стоимость</p>
          <button @click="go('/calculator')">Калькулятор</button>
        </div>
     </section>
</template>

<style scoped>
.calc-section{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.calc{
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 30px;
      width: 1131px;
    }
    .calc button{
      width: 672px;
      background-color: white;
      color: #1E1E5A;
    }
    .calc button:hover{
      width: 672px;
      background-color: #1E1E5A;
      color: white;
    }
    /* адаптив */
    @media (max-width: 768px) {

  /* калькулятор */
  .calc-section {
    display: flex;
    flex-direction: column;
    padding: 50px 20px;
    margin: 0;
    align-items: start;
    justify-content: start;
  }

  .calc {
    width: 100%;
    gap: 20px;
  }

  .calc h2 {
    font-size: 24px;
    width: 100%;
  }

  .calc p {
    font-size: 16px;
  }

  .calc button {
    width: 100%;
    max-width: 280px;
    font-size: 16px;
  }
}
</style>