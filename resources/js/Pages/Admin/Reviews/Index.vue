<template>
    <Head>
        <title>Отзывы</title>

        <meta
            name="description"
        />
    </Head>
    <Header />
    <main class="main-reviews">
        <h1>Отзывы</h1>
    </main>
    <section class="reviews-section">
        <div class="reviews">


            <div v-for="review in reviews" :key="review.id" class="review">
                <div class="stars-name">
                            <div class="stars">
                                <img src="../../../../src/icons/star.svg" alt="звездочка" v-for="i in review.rating" :key="i"  class="star">
                            </div>
                            <h3>{{ review.user.name }}</h3>
                </div>
                <p>{{ review.text }}</p>

                <button @click="remove(review.id)">Удалить</button>
            </div>
        </div>
  </section>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head, router } from '@inertiajs/vue3'

defineProps({
  reviews: Array
})

function remove(id) {

  router.delete(`/admin/reviews/${id}`)
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

.review button {
  background-color: #D1D1E2;
  color: #1E1E5A;
}

.review button:hover {
  padding: 20px;
  background-color: #1E1E5A;
  color: #D1D1E2;
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

/* АДАПТИВ */
@media (max-width: 1024px) {
  .main-reviews {
    margin: 80px 30px;
  }

  .main-reviews h1 {
    font-size: 28px;
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
    justify-content: center;
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
    margin: 10px 0;
  }

  .star {
    width: 20px;
    height: 20px;
  }

  .review button {
    padding: 8px 16px;
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

  .review button {
    padding: 6px 12px;
    font-size: 12px;
  }
}
</style>