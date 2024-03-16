<template>
    <DefaultLayout>
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->
  
      <!-- ====== Form Elements Section Start -->
      <div class="grid w-full grid-cols-1 gap-9 sm:grid-cols-1">
        <div class="flex flex-col gap-9">
          <form @submit.prevent="updateFuel" class="flex flex-col w-full p-5 bg-white rounded-md shadow-lg md:p-10">
            <label for="tank_number" class="mb-5">
              <span>Tank Number</span>
              <input v-model="formData.tank_number" type="text" name="tank_number" id="tank_number" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Tank Number" required/>
            </label>
  
            <label for="category" class="mb-5">
              <span>Category</span>
              <input v-model="formData.category" type="text" name="category" id="category" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Category" required/>
            </label>
  
            <label for="volumeLevel" class="mb-5">
              <span>Volume Level</span>
              <input v-model="formData.volumeLevel" type="text" name="volumeLevel" id="volumeLevel" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Volume Level" required/>
            </label>
  
            <label for="description" class="mb-5">
              <span>Description</span>
              <textarea v-model="formData.description" name="description" id="description" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Description" required></textarea>
            </label>
  
            <div class="flex justify-center mt-4">
              <button type="submit" class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark" style="background-color: #162834;">Edit</button>
  
              <router-link :to="'/fuels'">
                <button class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark" style="background-color:#FA2A55;">Cancel</button>
              </router-link>
            </div>
          </form>
        </div>
      </div>
      <!-- ====== Form Elements Section End -->
    </DefaultLayout>
  </template>
  
  <script setup lang="ts">
  import DefaultLayout from '@/layouts/DefaultLayout.vue';
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  
  axios.defaults.baseURL = 'http://localhost:8000';
  
  const pageTitle = ref('Edit Fuel');
  
  const router = useRouter();
  
  const formData = ref({
    tank_number: '',
    category: '',
    volumeLevel: '',
    description: ''
  });
  
  const fetchFuelData = async () => {
    const fuelId = router.currentRoute.value.params.id;
    try {
      const response = await axios.get(`/api/fuels/${fuelId}`);
      const fuelData = response.data;
      formData.value = { ...fuelData };
    } catch (error) {
      console.error('Error fetching fuel data:', error);
    }
  };
  
  onMounted(fetchFuelData);
  
  const updateFuel = async () => {
    const fuelId = router.currentRoute.value.params.id;
    try {
      await axios.put(`http://127.0.0.1:8000/api/fuels/${fuelId}`, formData.value);
      router.push('/fuels');
    } catch (error) {
      console.error('Error updating fuel:', error);
    }
  };
  </script>
  