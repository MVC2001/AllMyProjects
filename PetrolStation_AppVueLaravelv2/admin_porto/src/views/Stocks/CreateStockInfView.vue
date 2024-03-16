


<template>
  <DefaultLayout>
    <!-- Breadcrumb Start -->
    <BreadcrumbDefault :pageTitle="pageTitle" />
    <!-- Breadcrumb End -->

    <!-- ====== Form Elements Section Start -->
    <div class="grid w-full grid-cols-1  gap-9 sm:grid-cols-1"> <!-- Changed grid-cols-2 to grid-cols-1 for small screens -->
      <div class="flex flex-col gap-9">
        <!-- Input Fields Start -->
      
        <div v-if="successMessage" class="text-green-900" style="color: white;padding:30px 30px 20px;height:5px;background-color:#2C3539">{{ successMessage }}</div>
        <div v-if="errorMessage" class="text-red-500" style="color: white;padding:30px 30px 20px;height:5px;background-color:#C34A2C">{{ errorMessage }}</div>
        
          <form action="" method="post"  @submit.prevent="submitForm" 
          class="flex flex-col w-full p-5 bg-white rounded-md shadow-lg md:p-10 "  style="width: 900px;">
          <label for="item" class="mb-5">
            <span>Item</span>
            <input
            type="text"
            name="item"
            v-model="formData.item"
            id="item"
            class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800"
            placeholder="Enter Item"
            required
          />          
          </label>
         
          <label for="number" class="mb-5">
            <span>Number</span>
            <input
              type="text"
              name="number" v-model="formData.number"
              id="number"
              class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800"
              placeholder=" "
              required
            />
          </label>


          <label for="category" class="mb-5">
            <span>Category</span>
            <input
              type="text"   v-model="formData.category"
              name="category" 
              id="category"
              class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800"
              placeholder=" "
              required
            />
          </label>


          <label for="quantity" class="mb-5">
            <span>Quantity</span>
            <input
              type="text"
              name="quantity" v-model="formData.quantity"
              id="quantity"
              class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800"
              placeholder=" "
              required
            />
          </label>

          <label for="description" class="mb-5">
            <span>Description</span>
            <textarea
              type="text"
              name="description" v-model="formData.description"
              id="description"
              class="w-full p-3 mt-2 border border-gray-300 rounded shadow outline-none appearance-none bg-inherit shadow-gray-100 text-neutral-800"
              placeholder=" "
              required
            ></textarea>
          </label>

          <div class="flex justify-center mt-4"> <!-- Added flex and justify-center classes to center the button -->
            <button type="submit" class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark"
              style="background-color: #162834;">Add</button>

            <router-link :to="'/sales'">
              <button class="px-6 py-2 text-white rounded-lg bg-pale-dark w-50 hover:bg-dark"
                style="background-color:#FA2A55;">Cancel</button>
            </router-link>
          </div>
        </form>
        
        <!-- Input Fields End -->

        <!-- Add other form elements here -->

      </div>

    </div>
    <!-- ====== Form Elements Section End -->
  </DefaultLayout>
</template>

  
  
  <script setup lang="ts">
  import MultiSelect from '@/components/Forms/MultiSelect.vue'
  import SelectGroupOne from '@/components/Forms/SelectGroup/SelectGroupOne.vue'
  import DatePickerTwo from '@/components/Forms/DatePicker/DatePickerTwo.vue'
  import DefaultCard from '@/components/Forms/DefaultCard.vue'
  import SwitchFour from '@/components/Forms/Switchers/SwitchFour.vue'
  import SwitchOne from '@/components/Forms/Switchers/SwitchOne.vue'
  import SwitchThree from '@/components/Forms/Switchers/SwitchThree.vue'
  import SwitchTwo from '@/components/Forms/Switchers/SwitchTwo.vue'
  import DefaultLayout from '@/layouts/DefaultLayout.vue'
  
  
  import { ref } from 'vue'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000';

const pageTitle = ref('Form Elements')

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
    const response = await axios.post('/api/stocks', formData.value) // Updated endpoint to /api/stocks
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
  