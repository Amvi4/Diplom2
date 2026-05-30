<template>
  <Head>
        <title>Обратная связь</title>

        <meta
            name="description"
        />
    </Head>
    <Header />
  <div class="page">

    <h1>Обратная связь</h1>

    <table>

      <thead>
        <tr>
          <th>Имя</th>
          <th>Телефон</th>
          <th>Комментарий</th>
          <th>Дата</th>
          <th>Удалить</th>
        </tr>
      </thead>

      <tbody>

        <tr
          v-for="item in feedbacks"
          :key="item.id"
        >
          <td>{{ item.name }}</td>

          <td>{{ item.phone }}</td>

          <td class="comment">{{ item.comment }}</td>

          <td>
            {{
              new Date(item.created_at)
                .toLocaleString()
            }}
          </td>
          <td>
            <button class="delete-btn" @click="deleteFeedback(item.id)">
              Удалить
            </button>
          </td>
        </tr>

      </tbody>

    </table>

  </div>
  <Footer />
</template>

<script setup>
import Footer from '@/Components/Footer.vue';
import Header from '@/Components/Header.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
  feedbacks: Array
})

function deleteFeedback(id) {
    if (!confirm('Удалить комментарий?')) {
        return
    }

    router.delete(`/admin/feedback/${id}`, {
        preserveScroll: true
    })
}
</script>

<style scoped>
.page {
  display: flex;
  flex-direction: column;
  padding: 100px 50px;
  align-items: center;
  margin: 0 0 250px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  border-bottom: 1px solid #1E1E5A;
  padding: 20px;
  text-align: left;
  color: #1E1E5A;
}

th {
  font-size: 24px;
  font-family: 'light';
}

td {
  font-size: 20px;
}
.comment{
  overflow: hidden;
}
.delete-btn{
  padding: 0 10px;
}

/* АДАПТИВ */
@media (max-width: 1024px) {
  .page {
    width: 100%;
    margin: 0 0 600px 0;
    padding: 80px 30px;
  }

  th {
    font-size: 24px;
  }

  td {
    font-size: 16px;
  }

  th,
  td {
    padding: 15px;
  }
}

@media (max-width: 768px) {
  .page {
    padding: 50px 20px;
  }

  .page h1 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
  }

  /* Делаем таблицу горизонтально скроллящейся */
  table {
    display: block;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    white-space: nowrap;
  }

  th {
    font-size: 16px;
  }

  td {
    font-size: 14px;
  }

  th,
  td {
    padding: 12px;
  }

  /* Для колонки с комментарием - разрешаем перенос */
  td:nth-child(3) {
    white-space: normal;
    min-width: 150px;
    max-width: 250px;
  }
}

@media (max-width: 480px) {
  .page {
    padding: 30px 15px;
  }

  .page h1 {
    font-size: 20px;
  }

  th {
    font-size: 14px;
  }

  td {
    font-size: 12px;
  }

  th,
  td {
    padding: 8px;
  }

  td:nth-child(3) {
    min-width: 120px;
    max-width: 180px;
  }
}
</style>