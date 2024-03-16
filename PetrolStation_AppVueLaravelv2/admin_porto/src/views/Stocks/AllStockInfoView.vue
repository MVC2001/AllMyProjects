<template>
    <DefaultLayout>
      <router-link :to="'/create-stock'">
        <button class="flex justify-center w-full p-3 font-medium rounded text-gray hover:bg-opacity-90" style="background-color:#162834;">
          Add/Create new stock info
        </button>
      </router-link><br><br>
      <div class="rounded-sm border border-stroke bg-white py-5 px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
          <table class="w-full table-auto">
            <thead>
              <tr class="text-left bg-gray-200 dark:bg-gray-700">
                <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  Item
                </th>
                <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  Number
                </th>
                <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  Category
                </th>
                <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                  Quantity
                </th>
                <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                  Description
                </th>
                <th class="px-4 py-4 font-medium text-black dark:text-white">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(stock, index) in stocks" :key="stock.id">
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ stock.item }}</td>
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ stock.number }}</td>
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ stock.category }}</td>
                <td class="px-4 py-5">{{ stock.quantity }}</td>
                <td class="px-4 py-5">{{ stock.description }}</td>
                <td class="px-4 py-5">
                  <div class="flex items-center space-x-3.5">
                    <button class="hover:text-primary" style="color: seagreen;"  @click="updateStock(stock.id)">
                      <svg
                      class="fill-current"
                      width="18"
                      height="18"
                      viewBox="0 0 18 18"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                      <!-- Actual SVG for update action -->
                      <path d="M9.41 2.59L12.83 6H11v6h-4V6H5.17l3.42-3.41zM11 13v3h-3v-3H5l4-4 4 4h-3z" fill="currentColor"/>
                  </svg>
                    </button>
                    <button class="hover:text-primary" style="color:#C04000;"  @click="deleteStock(stock)">
                      <svg
                        class="fill-current"
                        width="18"
                        height="18"
                        viewBox="0 0 18 18"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <!-- Actual SVG for delete action -->
                        <path d="M12 5v10c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2zm-1 0H7v10h4V5z" fill="currentColor"/>
                    </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </DefaultLayout>
  </template>
  
  <script setup lang="ts">
  import { ref, onMounted } from 'vue';
  import DefaultLayout from '@/layouts/DefaultLayout.vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  
  axios.defaults.baseURL = 'http://localhost:8000';
  
  // Define types for the stock object and the stocks array
  interface Stock {
    id: number;
    item: string;
    number: string;
    category: string;
    quantity: string;
    description: string;
  }
  
  // Define a reactive reference to store stock data with the Stock type
  const stocks = ref<Stock[]>([]);
  
  // Access the router instance
  const router = useRouter();
  
  // Fetch stock data when the component is mounted
  onMounted(async () => {
    try {
      const response = await axios.get<Stock[]>('/api/stocks');
      stocks.value = response.data;
    } catch (error) {
      console.error('Error fetching stock data:', error);
    }
  });
  
  // Function to delete a stock
  const deleteStock = async (stock: Stock) => {
    try {
      const response = await axios.delete(`/api/stocks/${stock.id}`);
      console.log(response.data.message); // Log success message
      // Remove the deleted stock from the frontend list
      stocks.value = stocks.value.filter(s => s.id !== stock.id);
    } catch (error) {
      console.error('Error deleting stock:', error);
    }
  };
  
  // Function to update a stock
  const updateStock = async (stockId: number) => {
    try {
      // Fetch the stock data by ID
      const response = await axios.get<Stock>(`/api/stocks/${stockId}`);
      const stock = response.data;
  
      // Navigate to the EditStockView component with the stock data as props
      router.push({ name: 'EditStock', params: { id: stockId }, state: { stock } });
    } catch (error) {
      console.error('Error updating stock:', error);
    }
  };
  </script>
  