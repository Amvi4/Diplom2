<template>
  <header class="header-full">
    <div class="header">
      <div class="section-header1">
        <a href="/">TI-Weld</a> 
      </div>

      <div class="section-header">
        <a href="/calculator">Калькулятор</a>
      </div>

        <div class="section-header">
          <a href="/services">Услуги</a>
        </div>

        <div class="section-header">
          <a href="/works">Наши работы</a>
        </div>

        <div class="section-header">
          <a href="/reviews">Отзывы</a>
        </div>

        <div class="section-header">
        <a href="/contacts">Контакты</a>
        </div>

      <div class="burger" @click="toggleMenu">
        <img src="../../src/icons/burger.svg" alt="burgerMenu" >
      </div>
    </div>

    <!-- ВЫЕЗЖАЮЩЕЕ МЕНЮ -->
    <div class="drawer" :class="{ open: isOpen }">
      
      <button class="close" @click="toggleMenu">✕</button>

      <!-- НЕ АВТОРИЗОВАН -->
      <div v-if="!user">
        <button @click="go('/login')" class="win-btn">Войти</button>
        <button @click="go('/register')" class="win-btn">Зарегистрироваться</button>
      </div>

      <!-- АВТОРИЗОВАН -->
      <div v-else>
        <button @click="go('/profile')" class="win-btn">Профиль</button>

        <!-- АДМИН -->
        <button v-if="user.is_admin" @click="go('/admin/orders')" class="win-btn">
          Заявки (А)
        </button>
        <button v-if="user.is_admin" @click="go('/admin/workers')" class="win-btn">
          Сотрудники (А)
        </button>
        <button v-if="user.is_admin" @click="go('/admin/feedback')" class="win-btn">
          вопросы (А)
        </button>
        <button v-if="user.is_admin" @click="go('/admin/reviews')" class="win-btn">
          отзывы (А)
        </button>
        <button @click="logout" class="win-btn-logout">Выйти</button>
      </div>


        <button @click="go('/calculator')" class="win-btn">Калькулятор</button>
        <button @click="go('/services')" class="win-btn">Услуги</button>
        <button @click="go('/works')" class="win-btn">Наши работы</button>
        <button @click="go('/reviews')" class="win-btn">Отзывы</button>
        <button @click="go('/contact-us')" class="win-btn">Связаться с нами</button>
        <button @click="go('/ourwork')" class="win-btn">Подход к работе</button>
        <button @click="go('/workers')" class="win-btn">Специалисты</button>
        <button @click="go('/contacts')" class="win-btn">Контакты</button>

    </div>

    <!-- затемнение -->
    <div v-if="isOpen" class="overlay" @click="toggleMenu"></div>
  </header>
</template>

<script setup>
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

const isOpen = ref(false)

const page = usePage()
const user = page.props.auth?.user

function toggleMenu() {
  isOpen.value = !isOpen.value
}

function go(url) {
  router.visit(url)
  isOpen.value = false
}

function logout() {
  router.post('/logout')
}
</script>

<style scoped>
.header {
  margin: 0px 40px;
  height: 89px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: white;
}

.section-header{
  display: flex;
  align-items: center;
  justify-content: center;
  border-left: 1px solid #1E1E5A;
  height: 89px;
  border-bottom: 1px solid #1E1E5A;
  width: 263px;
}
.section-header a:hover{
  text-decoration: underline;
  color: #1e1e5ac2;
}
.section-header1{
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 89px;
  border-bottom: 1px solid #1E1E5A;
  border-left: 1px solid #1E1E5A;
  width: 260px;
}

.section-header1 a{
  font-size: 24px;
  transition: 0.2s;
}
.section-header1 a:hover{
  font-size: 25px;
}

.logo {
  width: 100px;
  padding: 0;
  margin: 0;  
  font-weight: bold;
  font-size: 24px;
}
a{
  padding: 0;
  margin: 0;  
  font-size: 20px;
}

.menu a {
  margin: 0 15px;
  text-decoration: none;
  color: #333;
}

.burger {
  height: 89px;
  width: 260px;
  display: flex;
  justify-content: center;
  align-items: center;  
  cursor: pointer;
  font-size: 22px;
  border-left: 1px solid #1E1E5A;
  border-right: 1px solid #1E1E5A;
  border-bottom: 1px solid #1E1E5A;
}

/* DRAWER */
.drawer {
  position: fixed;
  top: 0;
  right: -300px;
  width: 300px;
  height: 100%;
  background: white;
  box-shadow: -2px 0 10px rgba(0,0,0,0.2);
  transition: 0.3s;
  padding: 20px;
  z-index: 1000;
}
  
.drawer.open {
  right: 0;
}

.drawer button {
  display: block;
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
}

.close {
  color: #000000;
  background: none;
  border: none;
  font-size: 22px;
  margin-bottom: 20px;
  transition: none;
}
.close:hover{
  color: #929292;
}

/* затемнение */
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.4);
  z-index: 999;
}

.win-btn{
  background-color: transparent;
  color: #1E1E5A;
  font-size: 20px;
}
.win-btn:hover{
  color: #19196875;
}
.win-btn-logout{
  background-color: transparent;
  color: red;
  font-size: 20px;
}
.win-btn-logout:hover{
  color: rgba(255, 0, 0, 0.521);
}

/* адаптив */
@media (max-width: 768px) {
  .section-header {
    display: none;
  }

  .section-header1 {
    width: 100%;
    justify-content: flex-start;
    padding-left: 20px;
  }

  .header {
    margin: 0;
    max-width: 100%;
  }

  .burger {
    width: 90px;
    min-width: 90px;
  }

  .section-header1 a {
    font-size: 22px;
  }

  /* ВЫЕЗЖАЮЩЕЕ МЕНЮ - адаптив */
  .drawer {
    width: 100%;
    max-width: 100%;
    right: -100%;
    height: 100vh;
    top: 0;
    padding: 60px 20px 20px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    overflow-y: auto;
    box-sizing: border-box;
  }

  .drawer.open {
    right: 0;
  }

  .drawer button {
    padding: 0;
    width: 280px;
    max-width: 90%;
    margin-bottom: 0;
    text-align: center;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
  }

  .close {
    position: absolute;
    top: 15px;
    right: 20px;
    width: 40px !important;
    height: 40px;
    font-size: 24px;
    background: transparent;
    color: #1E1E5A;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
  }

  .close:hover {
    background: rgba(30, 30, 90, 0.1);
    color: #1E1E5A;
  }

  .win-btn {
    padding: 0;
    align-items: center;
    font-size: 16px;
    width: 280px;
    max-width: 90%;
    background: transparent;
    color: #1E1E5A;
    text-decoration: none;
    border: 0px;
  }


  .win-btn-logout {
    font-size: 16px;
    width: 280px;
    max-width: 90%;
    background: transparent;
    color: #ff4444;
    border: 1px solid #ff4444;
    border: 0px;
    margin-top: 10px;
  }

  /* Разделитель для групп кнопок */
  .drawer div {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    width: 100%;
  }

  /* Затемнение */
  .overlay {
    z-index: 999;
  }
}
</style>