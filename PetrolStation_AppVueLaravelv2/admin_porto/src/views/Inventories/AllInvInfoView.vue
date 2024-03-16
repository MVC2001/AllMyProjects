<template>
    <DefaultLayout>
      <router-link :to="'/create-inventory'">
        <button class="flex justify-center w-full p-3 font-medium rounded text-gray hover:bg-opacity-90" style="background-color:#162834;">
          Add/Create new inventory info
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
              <tr v-for="(inventory, index) in inventories" :key="inventory.id">
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ inventory.item }}</td>
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ inventory.number }}</td>
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ inventory.category }}</td>
                <td class="px-4 py-5">{{ inventory.quantity }}</td>
                <td class="px-4 py-5">{{ inventory.description }}</td>
                <td class="px-4 py-5">
                  <div class="flex items-center space-x-3.5">
                    <button class="hover:text-primary" style="color: seagreen;"  @click="updateInventory(inventory.id)">
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
                    <button class="hover:text-primary" style="color:#C04000;"  @click="deleteInventory(inventory)">
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
  
  // Define types for the inventory object and the inventories array
  interface Inventory {
    id: number;
    item: string;
    number: string;
    category: string;
    quantity: string;
    description: string;
  }
  
  // Define a reactive reference to store inventory data with the Inventory type
  const inventories = ref<Inventory[]>([]);
  
  // Access the router instance
  const router = useRouter();
  
  // Fetch inventory data when the component is mounted
  onMounted(async () => {
    try {
      const response = await axios.get<Inventory[]>('/api/inventories');
      inventories.value = response.data;
    } catch (error) {
      console.error('Error fetching inventory data:', error);
    }
  });
  
  // Function to delete an inventory
  const deleteInventory = async (inventory: Inventory) => {
    try {
      const response = await axios.delete(`/api/inventories/${inventory.id}`);
      console.log(response.data.message); // Log success message
      // Remove the deleted inventory from the frontend list
      inventories.value = inventories.value.filter(i => i.id !== inventory.id);
    } catch (error) {
      console.error('Error deleting inventory:', error);
    }
  };
  
  // Function to update an inventory
  const updateInventory = async (inventoryId: number) => {
    try {
      // Fetch the inventory data by ID
      const response = await axios.get<Inventory>(`/api/inventories/${inventoryId}`);
      const inventory = response.data;
  
      // Navigate to the EditInventoryView component with the inventory data as props
      router.push({ name: 'EditInventory', params: { id: inventoryId }, state: { inventory } });
    } catch (error) {
      console.error('Error updating inventory:', error);
    }
  };
  </script>
  