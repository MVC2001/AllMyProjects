<template>
    <DefaultLayout>
      <router-link :to="'/create-fuel'">
        <button class="flex justify-center w-full p-3 font-medium rounded text-gray hover:bg-opacity-90 bg-indigo-700;" style="background-color:#162834;">
          Add/Create new fuel info
        </button>
      </router-link><br><br>
      <div class="rounded-sm border border-stroke bg-white py-5 px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
          <table class="w-full table-auto">
            <thead>
              <tr class="text-left bg-gray-200 dark:bg-gray-700">
                <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  No#
                </th>
                <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  Tank Number
                </th>
                <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                  Category
                </th>
                <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                  Volume Level
                </th>
                <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                  Description
                </th>
                <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                  Sold At
                </th>
                <th class="px-4 py-4 font-medium text-black dark:text-white">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(fuel, index) in fuels" :key="fuel.id">
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ index + 1 }}</td>
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ fuel.tank_number }}</td>
                <td class="px-4 py-5 pl-9 xl:pl-11">{{ fuel.category }}</td>
                <td class="px-4 py-5">{{ fuel.volumeLevel }}</td>
                <td class="px-4 py-5">{{ fuel.description }}</td>
                <td class="px-4 py-5">{{ fuel.created_at }}</td>
                <td class="px-4 py-5">
                  <div class="flex items-center space-x-3.5">
                    <button class="hover:text-primary text-green-500" @click="updateFuel(fuel.id)">
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
                    <button class="hover:text-primary text-red-500" @click="deleteFuel(fuel)">
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
  
  // Define types for the fuel object and the fuels array
  interface Fuel {
    id: number;
    tank_number: string;
    category: string;
    volumeLevel: number;
    description: string;
    created_at: string;
  }
  
  // Define a reactive reference to store fuel data with the Fuel type
  const fuels = ref<Fuel[]>([]);
  
  // Access the router instance
  const router = useRouter();
  
  // Fetch fuel data when the component is mounted
  onMounted(async () => {
    try {
      const response = await axios.get<Fuel[]>('/api/fuels');
      fuels.value = response.data;
    } catch (error) {
      console.error('Error fetching fuel data:', error);
    }
  });
  
  // Function to delete a fuel
  const deleteFuel = async (fuel: Fuel) => {
    try {
      const response = await axios.delete(`/api/fuels/${fuel.id}`);
      console.log(response.data.message); // Log success message
      // Remove the deleted fuel from the frontend list
      fuels.value = fuels.value.filter(f => f.id !== fuel.id);
    } catch (error) {
      console.error('Error deleting fuel:', error);
    }
  };
  
  // Function to update a fuel
  const updateFuel = async (fuelId: number) => {
    try {
      // Fetch the fuel data by ID
      const response = await axios.get<Fuel>(`/api/fuels/${fuelId}`);
      const fuel = response.data;
  
      // Navigate to the EditFuelView component with the fuel data as props
      router.push({ name: 'EditFuel', params: { id: fuelId }, state: { fuel } });
    } catch (error) {
      console.error('Error updating fuel:', error);
    }
  };
  </script>
  