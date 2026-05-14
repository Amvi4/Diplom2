<template>
  <Head>
        <title>Создать заявку</title>

        <meta
            name="description"
        />
    </Head>
  <Header />
  <section class="order-section">
    <div class="order">
      <div class="text">
        <h1>Заявка</h1>
        <span>Осталось совсем немного!</span>
      </div>

      <div class="order-parametres">
        <div class="order-parametr"><p>Тип сварки:</p><p>{{ data?.type }}</p></div>
        <div class="order-parametr"><p>Длина шва:</p><p>{{ data?.length }}</p></div>
        <div class="order-parametr"><p>Толщина металла:</p><p>{{ data?.thickness }}</p></div>
        <div class="order-parametr"><p>Размер конструкции:</p><p>{{ data?.size }}</p></div>
        <div class="order-parametr"><p>Итоговая цена:</p><p class="itog">{{ data?.price }} ₽</p></div>
      </div>
      
      <div class="comment">
        <textarea v-model="comment" placeholder="Добавьте недостающей информации"></textarea>

        <button @click="send">Отправить</button>
      </div>
    </div>
  </section>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue'
import Header from '@/Components/Header.vue'
import { router, usePage, Head } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = usePage().props

const data = props.data
const user = props.user

const comment = ref('')

function send() {
  router.post('/order', {
  type: data.type,
  length: data.length,
  thickness: data.thickness,
  size: data.size,           
  comment: comment.value
})
}
</script>

<style scoped>
.order {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 42px;
  margin: 100px;
  border-radius: 16px;
  gap: 100px;
}

.text {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.text h1 {
  font-size: 36px;
}

.text span {
  font-size: 16px;
  color: #1e1e5a7a;
  font-family: 'light';
}

.order p {
  font-size: 20px;
}

.order-parametres {
  padding: 42px;
  width: 908px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  border-bottom: 2px solid #1E1E5A;
  border-left: 1px solid #1E1E5A;
  border-right: 1px solid #1E1E5A;
}

.order-parametr {
  display: flex;
  justify-content: space-between;
}

.comment {
  display: flex;
  flex-direction: column;
  width: 908px;
  gap: 20px;
}

.comment button {
  background-color: #1E1E5A;
  color: #D1D1E2;
}

.comment button:hover {
  background-color: #D1D1E2;
  color: #1E1E5A;
}

textarea {
  background-color: transparent;
  color: #1E1E5A;
  border-radius: 8px;
  border: 1px solid #1E1E5A;
  height: 208px;
}

textarea::placeholder {
  color: #1E1E5A;
}

.order-parametr .itog {
  color: green;
}

/* АДАПТИВ */
@media (max-width: 1024px) {
  .order {
    padding: 30px;
    margin: 60px;
    gap: 60px;
  }

  .order-parametres {
    width: 100%;
    max-width: 700px;
    padding: 30px;
  }

  .comment {
    width: 100%;
    max-width: 700px;
  }
}

@media (max-width: 768px) {
  .order {
    padding: 20px;
    margin: 40px 20px;
    gap: 40px;
  }

  .text h1 {
    font-size: 28px;
  }

  .text span {
    font-size: 14px;
  }

  .order p {
    font-size: 16px;
  }

  .order-parametres {
    width: 100%;
    padding: 20px;
    gap: 15px;
  }

  .order-parametr {
    width: 100%;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 5px;
  }

  .comment {
    width: 100%;
    gap: 15px;
  }

  textarea {
    height: 180px;
    padding: 12px;
    font-size: 14px;
    box-sizing: border-box;
  }

  .comment button {
    min-width: 100%;
    font-size: 16px;
  }
}

@media (max-width: 480px) {
  .order {
    padding: 15px;
    margin: 30px 15px;
    gap: 30px;
  }

  .text h1 {
    font-size: 24px;
  }

  .text span {
    font-size: 12px;
  }

  .order p {
    font-size: 14px;
  }

  .order-parametres {
    padding: 15px;
    gap: 12px;
  }

  .order-parametr {
    gap: 4px;
  }

  .comment {
    gap: 12px;
  }

  textarea {
    height: 150px;
    padding: 10px;
    font-size: 12px;
  }

  .comment button {
    font-size: 14px;
  }
}
</style>