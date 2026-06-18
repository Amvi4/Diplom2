<script setup>
import Map from './Map.vue';
import { router, usePage, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const error = ref('');
const form = useForm({
  name: '',
  phone: '',
  agree: false
})

function submit() {
  if (!form.agree) {
    error.value = 'Для продолжения необходимо согласиться на обработку персональных данных';
    return;
  }

  error.value = '';
  form.post('/feedback/step');
}
watch(() => form.agree, (value) => {
  if (value) {
    error.value = '';
  }
});
</script>

<template>
 <!-- КОНТАКТЫ -->
     <section class="contacts-section">
        <div class="contacts">
            <div class="contact">
                <h3>Артём, ул. Ульяновская, 13</h3>
                <div class="numbers">
                    <span class="s">+7(999) 999 99-99</span>
                    <span class="s">+7(312) 499 99-99</span>
                    <span class="s">+7(908) 666 79-99</span>
                </div>
                <span class="s">Agroshkolni4ek@gmail.com</span>
                <div class="messes">
                    <a href="https://t.me/+0r2IeZcjtBRmOGIy"><img src="../../src/icons/telegram-2.svg" alt="телеграм"></a>
                    <a href="https://vk.ru/im/channels/-238496043"><img src="../../src/icons/vk-2.svg" alt="вк"></a>
                </div>            
            </div>
            <Map />
        </div>
     </section>

     <!-- ОБРАТНАЯ СВЯЗЬ -->
     <section class="feedback-section">
        <div class="feedback">
            <h2>Остались вопросы? Менеджер готов ответить на ваши вопросы</h2>

            <div class="form">
                <input v-model="form.name" type="text" placeholder="Ваше имя" id="input">

                <input v-model="form.phone" type="text" placeholder="Номер телефона" id="input">

                <label class="checkbox">
                    <input v-model="form.agree" type="checkbox" id="checkbox">
                   <span>Я согласен на обработку персональных данных</span>
                </label>

                <p v-if="error" class="error">
                  {{ error }}
                </p>

                <button @click="submit">Продолжить</button>
            </div>
        </div>
     </section>

</template>

<style scoped>

  /* контакты */
  .contacts-section{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
    .contacts{
        display: flex;
        gap: 91px;
        flex-direction: column;
        align-items: start;
        width: 1131px;
    }
    .contact{
        display: flex;
        flex-direction: column;
        gap: 50px;
        justify-content: start;
    }
    .numbers{
        display: flex;
        flex-direction: column;
    }
    .s{
        color: #1e1e5a9a;
    }
    .messes{
        display: flex;
        gap: 15px;
    }
    /* обратная связь */
    .feedback-section{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 100px;
    }
    .error {
      color: #e53935;
      font-size: 14px;
      margin-top: -10px;
    }
    .feedback{
        width: 1131px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    .form{
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    .checkbox{
        display: flex;
        gap: 20px;
        align-items: center;
    }
    #checkbox{
        width: 33px;
        height: 33px;
    }
    #input{
        color: #1E1E5A;
    }
    #input::placeholder{
        color: #1E1E5A;
    }
    /* адаптив */
    @media (max-width: 768px) {

  /* контакты */
  .contacts-section {
    margin: 50px 20px;
    padding: 0;
    width: 70%;
  }

  .contacts {
    width: 90%;
    gap: 30px;
  }

  .contact {
    gap: 20px;
    width: 100%;
  }

  .contact h3 {
    font-size: 20px;
    word-break: break-word;
  }

  .numbers {
    gap: 8px;
  }

  .s {
    font-size: 14px;
    word-break: break-word;
    text-align: start;
  }

  .messes {
    gap: 20px;
  }

  .messes img {
    width: 32px;
    height: 32px;
  }

  /* Карта */
  .contacts-section :deep(.map-container),
  .contacts-section :deep(iframe),
  .contacts-section :deep(.map) {
    width: 100% !important;
    height: 250px !important;
  }

  /* обратная связь */
  .feedback-section {
    padding: 50px 20px;
    margin: 0;
    width: 90%;
  }

  .feedback {
    width: 100%;
    gap: 25px;
  }

  .feedback h2 {
    font-size: 24px;
    text-align: left;
    width: 100%;
  }

  .form {
    gap: 20px;
    width: 100%;
  }
  .form button{
    padding: 0;
    min-width: 100%;
  }

  .form input[type="text"] {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    box-sizing: border-box;
  }

  .checkbox {
    gap: 12px;
    align-items: center;
  }

  .checkbox span {
    font-size: 14px;
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
    width: 100%;
    font-size: 12px;
  }
}
</style>