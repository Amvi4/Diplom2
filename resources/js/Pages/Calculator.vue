<template>
  <Head>
        <title>Калькулятор</title>

        <meta
            name="description"
        />
    </Head>
    <Header />
  <div class="wrapper">
    <div class="calc">
      <div class="text">
        <h1>Рассчитайте стоимость и оставьте заявку</h1>
        <p>Расчет является предварительным.
            После рассчета стоимости сайт перенаправит вас на страницу для подробного уточнения ваших потребностей. после вы оставляете заявку, чтобы потом с вами связались для повторного уточнения
            вида работ, выбора технологии сварки, сотрудника и окончательной стоимости.</p>
      </div>
      <div class="calcChoose">
      <!-- Тип сварки -->
      <div class="labelInput">
          <label>Услуга (Тип сварки)</label>
          <select v-model="type">
            <option value="mig">MIG (Дуговая сварка)</option>
            <option value="tig">TIG (Вольфрамовая дуговая сварка)</option>
            <option value="mma">MMA (Плавящаяся дуговая сварка)</option>
          </select>
      </div>

      <!-- Длина -->
      <div class="labelInput">
        <label>Длина шва (м)</label>
        <input type="number" v-model.number="length" />
      </div>

      <!-- Толщина -->
      <div class="labelInput">
        <label>Толщина металла (мм)</label>
        <input type="number" v-model.number="thickness" />
      </div>

      <!-- Размер -->
      <div class="labelInput">
        <label>Размер конструкции</label>
        <select v-model="size">
          <option value="small">Маленькая</option>
          <option value="medium">Средняя</option>
          <option value="large">Большая</option>
        </select>
      </div>

      <!-- Результат -->
      <span class="result">
        Предварительная стоимость: {{ total }} ₽
      </span>

      <!-- Кнопка -->
      <button @click="goOrder">Оставить заявку</button>
      </div>
    </div>
  </div>
  <Footer />
</template>

<script setup>
import { ref, computed } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'

const type = ref('mig')
const length = ref(0)
const thickness = ref(1)
const size = ref('small')

// базовые ставки
const baseRates = {
  mig: 10,
  tig: 15,
  mma: 8
}

// коэффициент толщины
function thicknessCoef(t) {
  if (t <= 2) return 1
  if (t <= 5) return 1.3
  if (t <= 10) return 1.6
  return 2
}

// коэффициент размера
const sizeCoef = {
  small: 1,
  medium: 1.2,
  large: 1.5
}

// итог
const total = computed(() => {
  const base = baseRates[type.value]
  const tCoef = thicknessCoef(thickness.value)
  const sCoef = sizeCoef[size.value]

  return Math.round(length.value * base * tCoef * sCoef)
})

// переход к заявке
function goOrder() {
  router.post('/order/from-calculator', {
    type: type.value,
    length: length.value,
    thickness: thickness.value,
    size: size.value,
    price: total.value
  })
}
</script>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0 20px;
}

.calc {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 76px 0;
  max-width: 1200px;
  width: 100%;
  gap: 50px;
}
.calc h1{
  text-align: center;
}
.text p{
  text-align: center;
}
.text{
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.calcChoose {
  display: flex;
  flex-direction: column;
  gap: 42px;
  width: 908px;
  max-width: 100%;
}

.labelInput {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

label {
  display: block;
  font-size: 16px;
}

input, select {
  width: 100%;
  padding: 0px 10px;
  font-size: 16px;
  border: 1px solid #1E1E5A;
  border-radius: 8px;
  box-sizing: border-box;
}

.result {
  margin-top: 20px;
  font-size: 36px;
  font-weight: bold;
  color: #1E1E5A;
}

button {
  width: 100%;
  font-size: 18px;
}

/* адаптив */
@media (max-width: 768px) {
  .wrapper {
    padding: 0 15px;
  }

  .calc {
    margin: 40px 0;
  }

  .calc h1 {
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
  }

  .calcChoose {
    gap: 25px;
  }

  .labelInput {
    gap: 8px;
  }

  label {
    font-size: 14px;
  }

  input, select {
    padding: 10px 14px;
    font-size: 14px;
  }

  .result {
    font-size: 28px;
    margin-top: 15px;
    text-align: center;
  }

  button {
    padding: 0;
    font-size: 16px;
  }
}
  /* адаптив */
@media (max-width: 480px) {
  .wrapper {
    padding: 0 12px;
    margin: 0 0 200px 0;
  }

  .calc {
    max-width: 100%;
    margin: 25px 0;
  }

  .calc h1 {
    font-size: 24px;
  }

  .calcChoose {
    gap: 20px;
  }

  label {
    font-size: 13px;
  }

  input, select {
    padding: 8px 12px;
    font-size: 14px;
  }

  .result {
    font-size: 24px;
  }

  button {
    padding: 0;
    min-width: 100%;
    font-size: 14px;
  }
}
</style>