<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { router, usePage, useForm, Head } from '@inertiajs/vue3';
import { ref, } from 'vue';
import { onMounted } from 'vue'
import L from 'leaflet'
import Map from '@/Components/Map.vue';

const form = useForm({
  name: '',
  phone: '',
  comment: '',
  agree: false
})

function submit() {
  form.post('/feedback/step')
}

onMounted(() => {

  // Координаты
  const lat = 43.347317
  const lng = 132.172146

  // Создание карты
  const map = L.map('map', {
  attributionControl: false
}).setView([lat, lng], 13)

  // Tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  }).addTo(map)

  // Маркер
  L.marker([lat, lng])
    .addTo(map)
    .bindPopup('Наша мастерская')
    .openPopup()
})


// feedback
const props = defineProps({
  workers: Array
})

</script>

<template>
    <Head>
        <title>TI-Weld — Контакты</title>

        <meta
            name="description"
            content="Наши контакты, чтобы вы смогли с нами связаться"
        />
    </Head>
    <Header />

    <main class="main-contacts">
        <h1>КОНТАКТЫ</h1>
    </main>

    <section class="contact-section">
        <div class="contacts">
            <div class="contact">
                <h3>Расположение</h3>
                <span>Россия, Приморский край, г. Артём, Ульяновская 13, офис 1/2</span>
            </div>

            <div class="contact">
                <h3>Телефоны</h3>
                <span>+7(999) 999 99-99 <br>
                    +7(999) 999 99-99 <br>
                    +7(999) 999 99-99</span>
            </div>

            <div class="contact">
                <h3>Дирекция</h3>
                <span>Фролов Иван</span>
            </div>

            <div class="contact" id="contact">
                <h3>Почта</h3>
                <span>agroshkolni4ek@gmail.com</span>
            </div>
        </div>
    </section>

    <section class="feedback-map">
    <!-- ОБРАТНАЯ СВЯЗЬ -->
        <div class="feedback">
            <h2>Остались вопросы? Свяжитесь с нами!</h2>

            <div class="form">
                <input v-model="form.name" type="text" placeholder="Ваше имя" id="input">

                <input v-model="form.phone" type="text" placeholder="Номер телефона" id="input">

                <label class="checkbox">
                    <input v-model="form.agree" type="checkbox" id="checkbox">
                   <span>Я согласен на обработку персональных данных</span>
                </label>

                <button @click="submit">Продолжить</button>
            </div>
        </div>
        <Map />
    </section>

    <Footer />
</template>

<style scoped>
    main {
  padding: 50px;
  text-align: center;
}

main h1 {
  font-size: 36px;
}

/* контакты */
.contacts {
  margin: 50px;
  display: flex;
  flex-direction: row;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: center;
}

.contact {
  padding: 20px;
  width: 435px;
  height: 435px;
  display: flex;
  flex-direction: column;
  border-radius: 16px;
  justify-content: space-between;
  background-color: #D1D1E2;
}

.contact span, .contact h3 {
  color: #1E1E5A;
}

#contact {
  background-color: #1E1E5A;
}

#contact span, #contact h3 {
  color: #D1D1E2;
}

/* feedback */
.feedback-map {
  display: flex;
  margin: 100px 50px;
  gap: 63px;
  justify-content: center;
}

.feedback {
  display: flex;
  flex-direction: column;
  gap: 57px;
  width: 100%;
  max-width: 753px;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 100%;
}

.checkbox {
  display: flex;
  gap: 20px;
  align-items: center;
}

#checkbox {
  width: 33px;
  height: 33px;
}

textarea {
  border-radius: 8px;
  color: #1E1E5A;
}

textarea::placeholder {
  color: #1E1E5A;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
    .contact-section{
        width: 100%;
    }
  .contacts {
    max-width: 100%;
    margin: 40px;
    justify-content: center;
  }

  .contact {
    width: calc(50% - 20px);
    min-width: 280px;
    height: auto;
    min-height: 280px;
    gap: 20px;
  }
  .main-contacts{
    max-width: 380px;
    text-align: start;
  }
  .main-contacts h1{
    width: 200px;
  }

  .feedback-map {
    display: flex;
    flex-direction: column;
    margin: 100px 40px;
    gap: 40px;
    max-height: 500px;
  }
}

@media (max-width: 992px) {
  main {
    padding: 40px;
  }

  main h1 {
    font-size: 32px;
  }

  .contacts {
    margin: 30px;
  }

  .contact {
    width: calc(50% - 10px);
    min-width: 250px;
    height: auto;
    min-height: 250px;
    padding: 20px;
  }

  .contact h3 {
    font-size: 20px;
  }

  .contact span {
    font-size: 14px;
  }

  .feedback-map {
    margin: 80px 30px;
    flex-direction: column;
    align-items: center;
  }

  .feedback {
    gap: 30px;
    align-items: center;
    text-align: center;
  }

  .feedback h2 {
    font-size: 24px;
  }

  .form {
    width: 100%;
    max-width: 500px;
  }
}

@media (max-width: 768px) {
  main {
    padding: 30px 20px;
  }

  main h1 {
    font-size: 24px;
  }

  .contacts {
    margin: 20px;
    gap: 15px;
  }

  .contact {
    width: 100%;
    max-width: 350px;
    min-height: 200px;
    padding: 20px;
  }

  .contact h3 {
    font-size: 18px;
  }

  .contact span {
    font-size: 13px;
  }

  .feedback-map {
    margin: 60px 20px;
    gap: 30px;
  }

  .feedback {
    gap: 25px;
  }

  .feedback h2 {
    font-size: 20px;
  }

  .form {
    max-width: 100%;
  }

  .form input {
    width: 100%;
    padding: 12px;
    font-size: 14px;
    box-sizing: border-box;
  }

  .checkbox {
    gap: 12px;
    align-items: center;
  }

  .checkbox span {
    font-size: 13px;
    line-height: 1.4;
    flex: 1;
  }

  #checkbox {
    width: 24px;
    height: 24px;
    min-width: 24px;
    margin-top: 2px;
  }

  .form button {
    min-width: 100%;
    padding: 0;
    font-size: 16px;
  }

  /* карта */
  .feedback-map :deep(.map-container),
  .feedback-map :deep(iframe) {
    width: 100% !important;
    height: 300px !important;
  }
}

@media (max-width: 480px) {
  main {
    padding: 20px 15px;
  }

  main h1 {
    font-size: 20px;
  }

  .contacts {
    margin: 15px;
    gap: 12px;
  }

  .contact {
    padding: 15px;
    min-height: 180px;
  }

  .contact h3 {
    font-size: 16px;
  }

  .contact span {
    font-size: 12px;
  }

  .feedback-map {
    margin: 40px 15px;
    gap: 25px;
  }

  .feedback h2 {
    font-size: 18px;
  }

  .form input {
    padding: 10px;
    font-size: 13px;
  }

  .checkbox span {
    font-size: 12px;
  }

  #checkbox {
    width: 20px;
    height: 20px;
    min-width: 20px;
  }

  .form button {
    padding: 0;
    font-size: 14px;
  }

  .feedback-map :deep(.map-container),
  .feedback-map :deep(iframe) {
    height: 250px !important;
  }
}
</style>