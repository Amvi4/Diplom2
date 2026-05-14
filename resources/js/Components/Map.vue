<template>
  <div
    id="map"
    class="map"
  ></div>
</template>

<script setup>
import { onMounted } from 'vue'
import L from 'leaflet'

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
</script>

<style scoped>
.map {
  width: 100%;
  height: 500px;
  border-radius: 20px;
}
</style>