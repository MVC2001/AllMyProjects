<template>
    <DefaultLayout>
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->
  
      <!-- ====== Form Elements Section Start -->
      <div class="grid w-full grid-cols-1 gap-9 sm:grid-cols-1">
        <div class="flex flex-col gap-9">
          <form @submit.prevent="updateInventory" class="flex flex-col w-full p-5 bg-white rounded-md shadow-lg md:p-10">
            <label for="item" class="mb-5">
              <span>Item</span>
              <input v-model="formData.item" type="text" name="item" id="item" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Item" required/>
            </label>
  
            <label for="number" class="mb-5">
              <span>Number</span>
              <input v-model="formData.number" type="text" name="number" id="number" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Number" required/>
            </label>
  
            <label for="category" class="mb-5">
              <span>Category</span>
              <input v-model="formData.category" type="text" name="category" id="category" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Category" required/>
            </label>
  
            <label for="quantity" class="mb-5">
              <span>Quantity</span>
              <input v-model="formData.quantity" type="text" name="quantity" id="quantity" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Quantity" required/>
            </label>
  
            <label for="description" class="mb-5">
              <span>Description</span>
              <textarea v-model="formData.description" name="description" id="description" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Description" required></textarea>
            </label>
  
            <div class="flex justify-center mt-4">
              <button type="submit" class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark" style="background-color: #162834;">Edit</button>
  
              <router-link :to="'/inventories'">
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
  
  const pageTitle = ref('Edit Inventory');
  const router = useRouter();
  
  const formData = ref({
    item: '',
    number: '',
    category: '',
    quantity: '',
    description: ''
  });
  
  const fetchInventoryData = async () => {
    const inventoryId = router.currentRoute.value.params.id;
    try {
      const response = await axios.get(`/api/inventories/${inventoryId}`);
      const inventoryData = response.data;
      formData.value = { ...inventoryData };
    } catch (error) {
      console.error('Error fetching inventory data:', error);
    }
  };
  
  onMounted(fetchInventoryData);
  
  const updateInventory = async () => {
    const inventoryId = router.currentRoute.value.params.id;
    try {
      await axios.put(`http://127.0.0.1:8000/api/inventories/${inventoryId}`, formData.value);
      router.push('/inventories');
    } catch (error) {
      console.error('Error updating inventory:', error);
    }
  };
  </script>
  