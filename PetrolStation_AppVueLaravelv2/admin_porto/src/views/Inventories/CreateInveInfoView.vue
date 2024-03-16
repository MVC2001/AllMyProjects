<template>
    <DefaultLayout>
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->
  
      <!-- ====== Form Elements Section Start -->
      <div class="grid grid-cols-1 gap-9 sm:grid-cols-1"> <!-- Changed grid-cols-2 to grid-cols-1 for small screens -->
        <div class="flex flex-col gap-9">
  
          <div v-if="successMessage" class="text-green-900" style="color: white;padding:30px 30px 20px;height:5px;background-color:#2C3539">{{ successMessage }}</div>
          <div v-if="errorMessage" class="text-red-500" style="color: white;padding:30px 30px 20px;height:5px;background-color:#C34A2C">{{ errorMessage }}</div>
          
          <!-- Input Fields Start -->
          <DefaultCard cardTitle="Input Fields">
            
            <form @submit.prevent="submitForm" method="post"> <!-- Prevent default form submission and bind submitForm method to submit event -->
              <div class="flex flex-col gap-5.5 p-6.5">
                <div>
                  <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                    Item
                  </label>
                  <input
                    v-model="formData.item"
                    type="text"
                    placeholder="Enter item name"
                    class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                  />
                </div>
  
                <div>
                  <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                   Number
                  </label>
                  <input
                    v-model="formData.number" 
                    type="number"
                    placeholder="Enter item number"
                    class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                  />
                </div>
              </div>
  
              <div class="grid grid-cols-1 gap-9 sm:grid-cols-1" style="margin-left: 25px;"> <!-- Added grid classes to display in columns on small and medium screens -->
                
                <div>
                  <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                     Category
                  </label>
                  <select
                    v-model="formData.category" 
                    class="rounded-lg border-[1.5px] text-black border-primary bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:bg-form-input" style="width: 97%;"
                  >
                    <option value="">Select category type</option>
                    <option value="Kerosene">Kerosene</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Others">Others</option>
                  </select>
                  
                </div>
  
          
                <div>
                  <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                   Total
                  </label>
                  <input
                    v-model="formData.quantity" 
                    type="number"
                    placeholder="Enter total in litre"
                    class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" style="width: 97%;"
                  />
                </div>
  
                <!-- Add the input field for "Sold At" -->
      
              </div>
  
  
              <div class="grid grid-cols-1 gap-9 sm:grid-cols-1" style="margin-left: 25px;"> <!-- Added grid classes to display in columns on small and medium screens -->
                
                 
                  <!-- Add the textarea below -->
                  <div class="sm:col-span-2">
                    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                      Description
                    </label>
                    <textarea
                      v-model="formData.description" 
                      class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                      rows="5"
                      placeholder="Enter  description"
                    ></textarea>
                  </div>
    
                  <!-- Add the input field for "Sold At" -->
        
                </div>
  
              <div class="flex justify-center mt-4"> <!-- Added flex and justify-center classes to center the button -->
                <button type="submit" class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark" style="background-color:black;">Add</button>
                <span>
                  <router-link :to="'/inventories'"><button class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark" style="background-color:crimson;">Cancel</button></router-link>
                </span> <!-- Added button with pale-dark background -->
              </div>
            </form>
          </DefaultCard>
          <!-- Input Fields End -->
  
          <!-- Add other form elements here -->
  
        </div>
  
      </div>
      <!-- ====== Form Elements Section End -->
    </DefaultLayout>
  </template>
  
  
  
  <script setup lang="ts">
  import BreadcrumbDefault from '@/components/Breadcrumbs/BreadcrumbDefault.vue'
  import CheckboxFive from '@/components/Forms/Checkboxes/CheckboxFive.vue'
  import CheckboxFour from '@/components/Forms/Checkboxes/CheckboxFour.vue'
  import CheckboxOne from '@/components/Forms/Checkboxes/CheckboxOne.vue'
  import CheckboxThree from '@/components/Forms/Checkboxes/CheckboxThree.vue'
  import CheckboxTwo from '@/components/Forms/Checkboxes/CheckboxTwo.vue'
  import DatePickerOne from '@/components/Forms/DatePicker/DatePickerOne.vue'
  import DatePickerTwo from '@/components/Forms/DatePicker/DatePickerTwo.vue'
  import DefaultCard from '@/components/Forms/DefaultCard.vue'
  import SwitchFour from '@/components/Forms/Switchers/SwitchFour.vue'
  import SwitchOne from '@/components/Forms/Switchers/SwitchOne.vue'
  import SwitchThree from '@/components/Forms/Switchers/SwitchThree.vue'
  import SwitchTwo from '@/components/Forms/Switchers/SwitchTwo.vue'
  import DefaultLayout from '@/layouts/DefaultLayout.vue'
  import MultiSelect from '@/components/Forms/MultiSelect.vue'
  import SelectGroupOne from '@/components/Forms/SelectGroup/SelectGroupOne.vue'
  
  axios.defaults.baseURL = 'http://localhost:8000';
  
  import { ref } from 'vue'
  
  const pageTitle = ref('Fill This Form below')
  
  import axios from 'axios'
  
  const formData = ref<{
    item: string;
    number: string;
    category: string;
    quantity: string;
    description: string;
  }>({
    item: '',
    number: '',
    category: '',
    quantity: '',
    description: ''
  });
  
  const successMessage = ref('')
  const errorMessage = ref('')
  
  const submitForm = async () => {
    try {
      const response = await axios.post('/api/inventories', formData.value) // Changed endpoint to /api/inventories
      successMessage.value = response.data.message
      // Clear form data after successful submission
      Object.keys(formData.value).forEach(key => {
        formData.value[key] = ''
      })
    } catch (error) {
      errorMessage.value = error.response.data.error
    }
  }
  </script>
  