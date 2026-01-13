<template>
  <div class="p-6 max-w-md mx-auto bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Add New Customer</h1>

    <!-- Success message -->
    <div v-if="success" class="mb-4 p-2 bg-green-200 text-green-800 rounded">
      Customer added successfully!
    </div>

    <!-- Error message -->
    <div v-if="error" class="mb-4 p-2 bg-red-200 text-red-800 rounded">
      {{ error }}
    </div>

    <form @submit.prevent="submitForm">
      <div class="mb-4">
        <label class="block font-medium mb-1">Name</label>
        <input
          v-model="name"
          type="text"
          placeholder="Enter customer name"
          class="w-full border rounded px-3 py-2"
          required
        />
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Postcode (optional)</label>
        <input
          v-model="postcode"
          type="text"
          placeholder="Enter postcode"
          class="w-full border rounded px-3 py-2"
        />
      </div>

      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Submit
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "UserForm",
  data() {
    return {
      name: "",
      postcode: "",
      success: false,
      error: null,
    };
  },
  methods: {
    async submitForm() {
      this.success = false;
      this.error = null;

      try {
        const response = await axios.post("/api/customers", {
          name: this.name,
          postcode: this.postcode,
        });

        // Clear form
        this.name = "";
        this.postcode = "";
        this.success = true;
      } catch (err) {
        if (err.response && err.response.data && err.response.data.errors) {
          this.error = Object.values(err.response.data.errors)
            .flat()
            .join(", ");
        } else {
          this.error = "An error occurred. Please try again.";
        }
      }
    },
  },
};
</script>

<style scoped>


</style>
