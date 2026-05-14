<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { Head, useForm } from '@inertiajs/vue3'

const props = defineProps({
    auth: Object,
    orders: Array,
});

/*  ПРОФИЛЬ */
const profileForm = useForm({
  name: props.auth.user.name,
  email: props.auth.user.email,
  phone: props.auth.user.phone || ''
});

function updateProfile() {
  profileForm.patch('/profile')
}

/*  ПАРОЛЬ */
const passwordForm = useForm({
  current_password: '',
  password: '',
  password_confirmation: ''
});

function updatePassword() {
  passwordForm.put('/password')
}
function statusText(status) {
  switch (status) {
    case 'new':
      return 'Новая'

    case 'in_progress':
      return 'В работе'

    case 'done':
      return 'Завершена'

    default:
      return status
  }
}
</script>

<template>
    <Head>
        <title>Профиль</title>

        <meta
            name="description"
        />
    </Head>
    <Header />

    <div class="profile">

    <h1>Профиль</h1>

    <div class="cards">
        <div class="card">
        <h2>Мои заявки</h2>
            <!-- ЗАЯВКИ -->
        <div class="orders-table" v-if="orders.length">
            <div class="order-table" v-for="order in orders" :key="order.id">
                <div class="order-text">
                    <p>Тип сварки:</p>
                    <span>{{ order.service_name || order.service_type }}</span>
                </div>
                <div class="order-text">
                    <p>Цена за услугу:</p>
                    <span>{{ order.price }} ₽</span>
                </div>
                <div class="order-text">
                    <p>Статус заявки</p>
                    <span>{{ statusText(order.status) }}</span>
                </div>
                <div class="order-text">
                    <p>Комментарий:</p>
                    <span>{{ statusText(order.comment) }}</span>
                </div>
            </div>
        </div>

            <p v-else>
                Нет заявок
            </p>
        </div>
        <div class="change">
            <!--  ПРОФИЛЬ -->
            <div class="card2">
                <div class="card2-text">
                    <h2>Личные данные</h2>
                    <p>Здесь вы можете изменить свои данные</p>
                </div>

                <div class="change-input">
                    <input
                        v-model="profileForm.name"
                        type="text"
                        placeholder="Имя"
                    />

                    <input
                        v-model="profileForm.email"
                        type="email"
                        placeholder="Email"
                    />

                    <input
                        v-model="profileForm.phone"
                        type="text"
                        placeholder="Телефон"
                    />

                    <button @click="updateProfile">
                        Сохранить
                    </button>
                </div>
            </div>
            <hr class="hr">
            <!-- ПАРОЛЬ -->
            <div class="card2">
                    <h2>Изменить пароль</h2>

                    <div class="change-input">
                    <input
                        v-model="passwordForm.current_password"
                        type="password"
                        placeholder="Текущий пароль"
                    />

                    <input
                        v-model="passwordForm.password"
                        type="password"
                        placeholder="Новый пароль"
                    />

                    <input
                        v-model="passwordForm.password_confirmation"
                        type="password"
                        placeholder="Повторите пароль"
                    />

                    <button @click="updatePassword">
                        Изменить пароль
                    </button>
                </div>
            </div>
        </div>
    </div>

  </div>
    <Footer />
</template>

<style scoped>
.profile {
  margin: 100px 50px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  text-align: center;
}

.profile h1 {
  font-size: 36px;
}

.cards {
  display: flex;
  gap: 140px;
}

.card {
  padding: 42px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 40px;
  border-radius: 16px;
  width: 800px;
  box-shadow: 7px 9px 12px 2px #1e1e5a56;
}

.card h2 {
  color: #1E1E5A;
}

.card2 {
  padding: 42px;
  display: flex;
  flex-direction: column;
  align-items: start;
  gap: 30px;
  border-radius: 16px;
  box-shadow: -7px 9px 12px 2px #1e1e5a56;
}

.card2-text {
  text-align: start;
}

.card2-text p {
  color: #1e1e5a8e;
}

.change {
  display: flex;
  flex-direction: column;
  gap: 50px;
}

.change-input {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 500px;
}

.orders-table {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 700px;
}

.order-table {
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  border-left: 1px solid #1E1E5A;
  border-right: 1px solid #1E1E5A;
  border-bottom: 2px solid #1E1E5A;
}

.order-text {
  display: flex;
  justify-content: space-between;
}

.hr {
  border: 1px solid #1E1E5A;
}

/* АДАПТИВ */
@media (max-width: 1200px) {
  .profile {
    margin: 80px 40px;
  }

  .cards {
    gap: 60px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .card {
    width: 100%;
    max-width: 700px;
    padding: 30px;
  }

  .orders-table {
    width: 100%;
    max-width: 600px;
  }

  .change {
    width: 100%;
    max-width: 500px;
  }

  .change-input {
    width: 100%;
  }
}

@media (max-width: 992px) {
  .profile {
    margin: 60px 30px;
  }

  .profile h1 {
    font-size: 32px;
  }

  .cards {
    flex-direction: column;
    align-items: center;
    gap: 40px;
  }

  .card {
    width: 100%;
    max-width: 600px;
    padding: 25px;
    gap: 30px;
  }

  .card h2 {
    font-size: 24px;
  }

  .orders-table {
    width: 100%;
    max-width: 500px;
  }

  .order-table {
    padding: 15px;
  }

  .order-text p,
  .order-text span {
    font-size: 14px;
  }

  .change {
    max-width: 600px;
    width: 100%;
  }

  .card2 {
    padding: 25px;
    width: 100%;
    align-items: center;
    text-align: center;
  }

  .card2-text {
    text-align: center;
  }

  .card2 h2 {
    font-size: 22px;
  }

  .change-input {
    width: 100%;
    max-width: 400px;
  }

  .change-input input {
    width: 100%;
    padding: 12px;
    font-size: 14px;
    box-sizing: border-box;
  }

  .change-input button {
    min-width: 100%;
    font-size: 14px;
  }
}

@media (max-width: 768px) {
  .profile {
    margin: 40px 20px;
    gap: 15px;
  }

  .profile h1 {
    font-size: 24px;
  }

  .cards {
    gap: 30px;
  }

  .card {
    padding: 20px;
    gap: 20px;
  }

  .card h2 {
    font-size: 20px;
  }

  .order-table {
    padding: 12px;
  }

  .order-text {
    flex-direction: column;
    align-items: center;
    gap: 5px;
    text-align: center;
  }

  .order-text p,
  .order-text span {
    font-size: 13px;
  }

  .card2 {
    padding: 20px;
  }

  .card2 h2 {
    font-size: 18px;
  }

  .card2-text p {
    font-size: 13px;
  }

  .change-input {
    gap: 15px;
  }

  .change-input input {
    padding: 10px;
    font-size: 13px;
  }

  .change-input button {
    padding: 10px;
    font-size: 13px;
  }

  .hr {
    display: none;
  }
}

@media (max-width: 480px) {
  .profile {
    margin: 30px 15px;
    gap: 10px;
  }

  .profile h1 {
    font-size: 20px;
  }

  .card {
    padding: 15px;
    gap: 15px;
  }

  .card h2 {
    font-size: 18px;
  }

  .orders-table {
    max-width: 100%;
  }

  .order-table {
    padding: 10px;
  }

  .order-text p,
  .order-text span {
    font-size: 12px;
  }

  .card2 {
    padding: 15px;
  }

  .card2 h2 {
    font-size: 16px;
  }

  .card2-text p {
    font-size: 12px;
  }

  .change-input {
    gap: 12px;
  }

  .change-input input {
    padding: 8px;
    font-size: 12px;
  }

  .change-input button {
    padding: 8px;
    font-size: 12px;
  }
}
</style>
