<template>
    <DefaultLayout>
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->
  
      <!-- ====== Form Elements Section Start -->
      <div class="grid w-full grid-cols-1 gap-9 sm:grid-cols-1">
        <div class="flex flex-col gap-9">
          <form @submit.prevent="updateSale" class="flex flex-col w-full p-5 bg-white rounded-md shadow-lg md:p-10">
            <label for="customer_id" class="mb-5">
              <span>Customer ID</span>
              <input v-model="formData.customer_id" type="text" name="customer_id" id="customer_id" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="Enter Customer ID" required/>
            </label>
  
            <label for="amount" class="mb-5">
              <span>Amount Sold</span>
              <input v-model="formData.amount" type="text" name="amount" id="amount" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="" required/>
           </label>
  
            <label for="category" class="mb-5">
              <span>Sale Category</span>
              <input v-model="formData.category" type="text" name="category" id="category" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="" required/>
            </label>
  
            <label for="description" class="mb-5">
              <span>Description</span>
              <textarea v-model="formData.description" type="text" name="description" id="description" class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800" placeholder="" required></textarea>
            </label>
  
            <div class="flex justify-center mt-4">
              <button type="submit" class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark" style="background-color: #162834;">Edit</button>
  
              <router-link :to="'/sales'">
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
  import { ref } from 'vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';

  axios.defaults.baseURL = 'http://localhost:8000';
  
  const pageTitle = ref('Edit Sale');
  
  const router = useRouter();
  
  // Define the formData object to store form data
  const formData = ref({
    customer_id: '',
    amount: '',
    category: '',
    description: ''
  });
  
  
  // Function to fetch sale data based on ID
  const fetchSaleData = async () => {
    const saleId = router.currentRoute.value.params.id;
    try {
      const response = await axios.get(`/api/sales/${saleId}`);
      const saleData = response.data;
      // Populate the formData object with fetched data
      formData.value = { ...saleData };
    } catch (error) {
      console.error('Error fetching sale data:', error);
    }
  };

  // Fetch sale data when component is mounted
  fetchSaleData();
  


  // Function to update sale data
  const updateSale = async () => {
    const saleId = router.currentRoute.value.params.id;
    try {
      await axios.put(`http://127.0.0.1:8000/api/sales/${saleId}`, formData.value);
      // Redirect to sales page after successful update
      router.push('/sales');
    } catch (error) {
      console.error('Error updating sale:', error);
    }
  };
  </script>
  