<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { useForm, Head } from '@inertiajs/vue3';
const form = useForm({
  name: '',
  phone: '',
  agree: false
})

function submit() {
  form.post('/feedback/step')
}

</script>

<template>
    <Head>
        <title>Обратная связь</title>

        <meta
            name="description"
        />
    </Head>
    <Header />
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

                <button @click="submit">Продолжить</button>
            </div>
        </div>
     </section>
    <Footer />
</template>

<style scoped>
/* обратная связь */
.feedback-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 100px;
  margin: 10vh 0 60vh ;
}

.feedback {
  width: 1131px;
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 25px;
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
button{
  border: 1px solid #1E1E5A ;
}
#input {
  color: #1E1E5A;
}

#input::placeholder {
  color: #1E1E5A;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  .feedback {
    width: 100%;
    max-width: 900px;
  }
}

@media (max-width: 992px) {
  .feedback-section {
    padding: 60px 40px;
  }

  .feedback h2 {
    font-size: 28px;
    text-align: center;
  }

  .feedback {
    max-width: 700px;
  }
}

@media (max-width: 768px) {
  .feedback-section {
    padding: 40px 20px;
  }

  .feedback {
    width: 100%;
    gap: 20px;
  }

  .feedback h2 {
    font-size: 22px;
    text-align: center;
  }

  .form {
    gap: 20px;
  }

  #input {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    box-sizing: border-box;
  }

  .checkbox {
    gap: 12px;
    align-items: flex-start;
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
    min-width: 100%;
    font-size: 16px;
  }
}

@media (max-width: 480px) {
  .feedback-section {
    padding: 30px 15px;
    margin: 0 0 400px 0;
  }

  .feedback h2 {
    font-size: 18px;
  }

  #input {
    padding: 12px;
    font-size: 14px;
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
    width: 100%;
    font-size: 14px;
  }
}
</style>