<template>
  <Head>
        <title>Заявки</title>

        <meta
            name="description"
        />
    </Head>
  <Header />
  <section class="admin-order-section">
  <div class="container">
    <h1>Заявки</h1>

    <div class="admin-order-container">
      <!--  ФИЛЬТРЫ -->
      <div class="filters">

        <select v-model="filters.status" class="done">
          <option value="">Все статусы</option>
          <option value="new">Новые</option>
          <option value="in_progress">В работе</option>
          <option value="done">Готово</option>
        </select>

        <input type="date" v-model="filters.date" class="done1" />

        <button @click="applyFilters">Применить</button>
      </div>

      <!--  ТАБЛИЦА -->
      <table>
        <thead>
          <tr>
            <th class="head">ID</th>
            <th class="head">Клиент</th>
            <th class="head">Услуга</th>
            <th class="head">Параметры</th>
            <th class="head">Цена</th>
            <th class="head">Статус</th>
            <th class="head">Дата</th>
            <th class="head">Удалить</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="order in orders.data" :key="order.id">
            <td>{{ order.user.id }}</td>

            <td>
              <div class="username">{{ order.user?.name }}</div>
              <small>{{ order.user?.phone }}</small>
            </td>

            <td>
              {{ order.service_name || order.service_type }}
            </td>

            <td>
              <div>Длина: {{ order.length }}</div>
              <div>Толщина: {{ order.thickness }}</div>
              <div>Размер: {{ statusText(order.size) }}</div>
            </td>

            <td class="price"><b>{{ order.price }} ₽</b></td>

            <!-- СТАТУС -->
            <td>
              <select
                :class="statusClass(order.status)"
                @change="updateStatus(order.id, $event.target.value)"
                :value="order.status"
              >
                <option value="new">Новые</option>
                <option value="in_progress">В работе</option>
                <option value="done">Готово</option>
              </select>
            </td>

            <td>
              {{ formatDate(order.created_at) }}
            </td>
            <td>
              <button class="delete-btn" @click="deleteOrder(order.id)">
                Удалить
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      <!--  ПАГИНАЦИЯ -->
      <div class="pagination">
        <button
          v-if="orders.prev_page_url"
          @click="go(orders.prev_page_url)"
        >
          ←
        </button>

        <button
          v-if="orders.next_page_url"
          @click="go(orders.next_page_url)"
        >
          →
        </button>
      </div>
    </div>
  </div>
  </section>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue'
import Header from '@/Components/Header.vue'
import { router, usePage, useForm, Head } from '@inertiajs/vue3'
import { reactive } from 'vue'

const props = usePage().props
const orders = props.orders

const filters = reactive({
  email: props.filters?.email || '',
  status: props.filters?.status || '',
  date: props.filters?.date || ''
})
function deleteOrder(id) {
    if (!confirm('Удалить заявку?')) {
        return
    }

    router.delete(`/admin/orders/${id}`, {
        preserveScroll: true
    })
}

function applyFilters() {
  router.get('/admin/orders', filters)
}

function go(url) {
  router.visit(url)
}

function updateStatus(id, status) {
  const form = useForm({ status })

  form.post(`/admin/orders/${id}/status`, {
  preserveScroll: true,
  preserveState: false
})

}

function formatDate(date) {
  return new Date(date).toLocaleString()
}

function statusClass(status) {
  return {
    new: 'status-new',
    in_progress: 'status-progress',
    done: 'status-done'
  }[status]
}
function statusText(size) {
  switch (size) {
    case 'large':
      return 'Большой'

    case 'small':
      return 'Маленький'

    case 'medium':
      return 'Средний'

    default:
      return size
  }
}
</script>

<style scoped>
.admin-order-section {
  padding: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  gap: 42px;
  width: 100%;
}

.admin-order-container {
  width: 1200px;
  padding: 42px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 16px;
  gap: 20px;
}

/* фильтры */
.filters {
  justify-content: space-between;
  display: flex;
  gap: 10px;
  width: 1000px;
}

.filters button {
  background-color: #1E1E5A;
  color: #D1D1E2;
  width: 200px;
}

.filters button:hover {
  background-color: #D1D1E2;
  color: #1E1E5A;
}

.done {
  padding: 0px 10px;
  margin: 0;
  width: 200px;
  background-color: #1E1E5A;
  color: #D1D1E2;
  border: 1px solid #D1D1E2;
}

.done1 {
  background-color: #D1D1E2;
  width: 200px;
}

.username {
  font-family: 'regular';
  font-size: 20px;
}

.price {
  color: rgb(1, 196, 1);
}

/* таблица */
.head {
  color: #D1D1E2;
}

td, td div, td small {
  color: #1E1E5A;
}

td div, td small {
  margin: 5px;
}

tr {
  border-radius: 16px;
}

table {
  width: 1000px;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #1E1E5A;
  padding: 10px;
}

td {
  gap: 10px;
}

th {
  background: #1E1E5A;
}
.delete-btn{
  padding: 0 10px;
}

/* статусы */
.status-new {
  background: #ffd000;
  padding: 5px 10px;
  border-radius: 4px;
}

.status-progress {
  background: #3ba7ff;
  padding: 5px 10px;
  border-radius: 4px;
}

.status-done {
  background: #6cff5f;
  padding: 5px 10px;
  border-radius: 4px;
}

/* пагинация */
.pagination {
  margin-top: 20px;
  display: flex;
  gap: 10px;
}

.pagination button {
  padding: 8px 16px;
  background: #1E1E5A;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

.pagination button:hover {
  background: #2a2a7a;
}

/* адаптив */
@media (max-width: 1200px) {
  .admin-order-container {
    width: 95%;
    padding: 20px;
  }

  .filters {
    width: 100%;
    flex-wrap: wrap;
    justify-content: center;
  }
  .filters button{
    min-width: 100%;
  }
  table {
    width: 100%;
    display: block;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}

@media (max-width: 768px) {
  .admin-order-section {
    padding: 50px 20px;
  }

  .container {
    padding: 0;
    gap: 20px;
  }

  .admin-order-container {
    width: 100%;
    padding: 15px;
    gap: 15px;
  }

  .admin-order-container h1 {
    font-size: 24px;
    margin-bottom: 0;
  }

  /* фильтры */
  .filters {
    flex-direction: column;
    align-items: stretch;
    gap: 10px;
    width: 100%;
  }

  .filters select,
  .filters input,
  .filters button {
    width: 100%;
    padding: 10px;
    font-size: 14px;
  }

  .done, .done1 {
    width: 100%;
    padding: 10px;
  }

  /* таблица */
  table {
    font-size: 12px;
  }

  th, td {
    padding: 8px 6px;
    min-width: 80px;
  }

  th:first-child,
  td:first-child {
    min-width: 50px;
  }

  th:nth-child(2),
  td:nth-child(2) {
    min-width: 100px;
  }

  th:nth-child(4),
  td:nth-child(4) {
    min-width: 100px;
  }

  .username {
    font-size: 14px;
  }

  td small {
    font-size: 10px;
  }

  td div {
    font-size: 11px;
  }

  .price {
    font-size: 12px;
  }

  /* статусы в select */
  td select {
    font-size: 11px;
    padding: 4px;
    width: 90px;
  }

  .status-new,
  .status-progress,
  .status-done {
    font-size: 11px;
    padding: 3px 6px;
  }

  /* пагинация */
  .pagination button {
    padding: 6px 12px;
    font-size: 14px;
  }
}

@media (max-width: 480px) {
  .admin-order-section {
    padding: 30px 15px;
  }

  .admin-order-container {
    padding: 10px;
  }

  .admin-order-container h1 {
    font-size: 20px;
  }

  table {
    font-size: 10px;
  }

  th, td {
    padding: 6px 4px;
    min-width: 70px;
  }

  .username {
    font-size: 12px;
  }

  td small {
    font-size: 9px;
  }

  td select {
    font-size: 10px;
    padding: 3px;
    width: 80px;
  }

  .filters select,
  .filters input,
  .filters button {
    padding: 8px;
    font-size: 12px;
  }
}
</style>