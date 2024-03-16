<template>
  <DefaultLayout>
    <div class="rounded-sm border border-stroke bg-white py-5 px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
      <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
          <thead>
            <tr class="text-left bg-gray-200 dark:bg-gray-700">
              <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                Member
              </th>
              <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                Task
              </th>
              <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                Started-AT
              </th>
              <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                Finished-AT
              </th>
              <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                Supervisor
              </th>
              <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                Description
              </th>
              <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                Added-AT
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(task, index) in tasks" :key="task.id">
              <td class="px-4 py-5 pl-9 xl:pl-11">{{ task.name }}</td>
              <td class="px-4 py-5 pl-9 xl:pl-11">{{ task.category }}</td>
              <td class="px-4 py-5 pl-9 xl:pl-11">{{ task.from }}</td>
              <td class="px-4 py-5">{{ task.to }}</td>
              <td class="px-4 py-5">{{ task.supervisor }}</td>
              <td class="px-4 py-5">{{ task.description }}</td>
              <td class="px-4 py-5">{{ task.created_at }}</td>
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
  
  // Define types for the task object and the tasks array
  interface Tasks {
    id: number;
    name: string;
    category: string;
    from: string;
    to: string;
    supervisor:string;
    description: string;
  }
  
  // Define a reactive reference to store inventory data with the Inventory type
  const tasks = ref<Tasks[]>([]);
  
  // Access the router instance
  const router = useRouter();
  
  // Fetch inventory data when the component is mounted
  onMounted(async () => {
    try {
      const response = await axios.get<Tasks[]>('/api/tasksv1');
      tasks.value = response.data;
    } catch (error) {
      console.error('Error fetching tasks data:', error);
    }
  });
  
  
  
 
  </script>
  

