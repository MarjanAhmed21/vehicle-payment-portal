<template>
  <div class="p-6 max-w-md mx-auto bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Add Payment</h1>

    <div v-if="success" class="mb-4 p-2 bg-green-200 text-green-800 rounded">
      Payment added successfully!
    </div>

    <div v-if="error" class="mb-4 p-2 bg-red-200 text-red-800 rounded">
      {{ error }}
    </div>

    <form @submit.prevent="submitForm">
      <div class="mb-4">
        <label class="block font-medium mb-1">Customer</label>
        <select v-model="customer_id" class="w-full border rounded px-3 py-2" required>
          <option value="">Select a customer</option>
          <option v-for="customer in customers" :key="customer.id" :value="customer.id">
            {{ customer.name }} ({{ customer.postcode || "N/A" }})
          </option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Amount (£)</label>
        <input
          v-model="amount"
          type="number"
          step="0.01"
          min="0"
          placeholder="Enter payment amount"
          class="w-full border rounded px-3 py-2"
          required
        />
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Payment Method (optional)</label>
        <input
          v-model="payment_method"
          type="text"
          placeholder="Cash, Card, etc."
          class="w-full border rounded px-3 py-2"
        />
      </div>

      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Submit Payment
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "PaymentForm",
  data() {
    return {
      customers: [],
      customer_id: "",
      amount: "",
      payment_method: "",
      success: false,
      error: null,
    };
  },
  mounted() {
    this.fetchCustomers();
  },
  methods: {
    async fetchCustomers() {
      try {
        const response = await axios.get("/api/customers");
        this.customers = response.data;
      } catch (err) {
        this.error = "Failed to load customers.";
      }
    },
    async submitForm() {
      this.success = false;
      this.error = null;

      try {
        await axios.post("/api/payments", {
          customer_id: this.customer_id,
          amount: this.amount,
          payment_method: this.payment_method,
        });

        // Reset form
        this.customer_id = "";
        this.amount = "";
        this.payment_method = "";
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
