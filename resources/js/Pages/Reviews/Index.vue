<template>
    <Head>
        <title>Отзывы</title>

        <meta
            name="description"
            content="Здесь вы можете увидеть отзывы о наших работах"
        />
    </Head>
    <Header />
    <main class="main-reviews">
        <h1>Отзывы</h1>
    </main>
    <!-- ОТЗЫВЫ -->
    <section class="reviews-section">
        <div class="reviews">

            <div v-for="review in reviews" :key="review.id" class="review">

                <div class="stars-name">
                    <div class="stars">
                        <img src="../../../src/icons/star.svg" alt="звездочка" v-for="i in review.rating" :key="i"  class="star">
                    </div>
                    <h3>{{ review.user.name }}</h3>
                </div>
                <p>{{ review.text }}</p>
            </div>

        </div>
  </section>
  <!-- СОЗДАТЬ ОТЗЫВ -->
   <section class="crate-section">
        <div class="create">
            <h2>Оставьте отзыв</h2>
            <textarea v-model="form.text" placeholder="Напишите что-нибудь..."/>

            <div class="rating-buttons">
                <div class="rating">
                    <select v-model="form.rating">
                        <option :value="5">5</option>
                        <option :value="4">4</option>
                        <option :value="3">3</option>
                        <option :value="2">2</option>
                        <option :value="1">1</option>
                    </select>

                    <span>Оценка</span>
                </div>
                <div class="buttons">
                    <button v-if="authUser" @click="submit">Оставить отзыв</button>

                    <button v-else @click="goRegister">Оставить отзыв</button>
                </div>
            </div>
        </div>
   </section>

   <Feedback />
   <Footer />

</template>

<script setup>
import Feedback from '@/Components/Feedback.vue'
import Footer from '@/Components/Footer.vue'
import Header from '@/Components/Header.vue'
import { useForm, router, Head } from '@inertiajs/vue3'

const props = defineProps({
  reviews: Array,
  authUser: Object
})

const form = useForm({
  text: '',
  rating: 5
})

function submit() {

  form.post('/reviews', {
    preserveScroll: true,

    onSuccess: () => {
      form.reset()
    }
  })
}

function goRegister() {

  localStorage.setItem(
    'pending_review',
    form.text
  )

  router.visit('/register')
}
</script>

<style scoped>
/* отзывы */
.main-reviews {
  margin: 100px 50px;
}

.reviews {
  padding: 50px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 16px;
}

.review {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 20px;
  width: 438px;
  height: 314px;
  background-color: #1E1E5A;
  border-radius: 16px;
}

.review h3, .review p {
  color: #D1D1E2;
}

.stars-name {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.stars {
  display: flex;
  align-items: center;
  flex-direction: row;
  gap: 5px;
}

.star {
  width: 24px;
  height: 24px;
  display: block;
  flex-shrink: 0;
}

/* создать отзыв */
.crate-section {
  padding: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.create {
  display: flex;
  flex-direction: column;
  gap: 30px;
  width: 100%;
  max-width: 902px;
}

.create textarea {
  width: 902px;
  height: 186px;
  border-radius: 16px;
  border: 1px solid #1E1E5A;
  color: #1E1E5A;
}

.create textarea::placeholder {
  color: #1E1E5A;
}

.rating-buttons {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  flex-wrap: wrap;
}

.rating {
  display: flex;
  gap: 20px;
  align-items: center;
}

.rating select {
    align-items: center;
    padding: 0 10px;
  width: 71px;
  height: 50px;
}

.buttons button {
  width: 443px;
}

/* АДАПТИВ */
@media (max-width: 1024px) {
  .main-reviews {
    margin: 80px 30px;
  }

  .main-reviews h1 {
    font-size: 32px;
  }

  .reviews {
    padding: 30px;
    justify-content: center;
  }

  .review {
    width: calc(50% - 16px);
    min-width: 280px;
    height: auto;
    min-height: 280px;
  }

  .crate-section {
    padding: 60px;
  }

  .create textarea {
    width: 100%;
    max-width: 100%;
  }
}

@media (max-width: 768px) {
  .main-reviews {
    margin: 50px 20px;
  }

  .main-reviews h1 {
    font-size: 24px;
  }

  .reviews {
    padding: 20px;
    gap: 16px;
  }

  .review {
    width: 100%;
    max-width: 400px;
    min-width: auto;
    height: auto;
    min-height: 260px;
  }

  .stars-name h3 {
    font-size: 18px;
  }

  .review p {
    font-size: 14px;
    margin-top: 10px;
  }

  .star {
    width: 20px;
    height: 20px;
  }

  /* создать отзыв */
  .crate-section {
    padding: 40px 20px;
  }

  .create {
    gap: 20px;
    width: 100%;
  }

  .create h2 {
    font-size: 24px;
    text-align: center;
  }

  .create textarea {
    height: 150px;
    font-size: 14px;
    padding: 12px;
    box-sizing: border-box;
  }

  .rating-buttons {
    flex-direction: column;
    align-items: center;
    gap: 15px;
  }

  .rating {
    gap: 15px;
  }

  .rating span {
    font-size: 14px;
  }

  .rating select {
    width: 60px;
    height: 40px;
  }

  .buttons button {
    width: 100%;
    max-width: 280px;
    padding: 10px 20px;
    font-size: 14px;
  }
}

@media (max-width: 480px) {
  .main-reviews {
    margin: 30px 15px;
  }

  .main-reviews h1 {
    font-size: 20px;
  }

  .reviews {
    padding: 15px;
    gap: 12px;
  }

  .review {
    padding: 15px;
    min-height: 220px;
  }

  .stars-name {
    gap: 10px;
  }

  .stars-name h3 {
    font-size: 16px;
  }

  .review p {
    font-size: 12px;
  }

  .star {
    width: 16px;
    height: 16px;
  }

  .stars {
    gap: 3px;
  }

  .crate-section {
    padding: 30px 15px;
  }

  .create h2 {
    font-size: 20px;
  }

  .create textarea {
    height: 120px;
    font-size: 12px;
  }

  .rating span {
    font-size: 12px;
  }

  .rating select {
    width: 50px;
    height: 35px;
    font-size: 12px;
  }

  .buttons button {
    font-size: 12px;
    padding: 8px 16px;
  }
}
</style>