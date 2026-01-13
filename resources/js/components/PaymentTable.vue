<template>
  <div class="p-6 max-w-4xl mx-auto bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">All Payments</h1>

    <div v-if="error" class="mb-4 p-2 bg-red-200 text-red-800 rounded">
      {{ error }}
    </div>

    <table class="w-full border-collapse border">
      <thead>
        <tr class="bg-gray-200">
          <th class="border px-4 py-2">ID</th>
          <th class="border px-4 py-2">Customer</th>
          <th class="border px-4 py-2">Postcode</th>
          <th class="border px-4 py-2">Amount</th>
          <th class="border px-4 py-2">Payment Method</th>
          <th class="border px-4 py-2">Date</th>
          <th class="border px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="payment in payments" :key="payment.id">
          <td class="border px-4 py-2">{{ payment.id }}</td>
          <td class="border px-4 py-2">{{ payment.customer.name }}</td>
          <td class="border px-4 py-2">{{ payment.customer.postcode || "N/A" }}</td>
          <td class="border px-4 py-2">
            <input
              v-model.number="payment.amount"
              type="number"
              step="0.01"
              class="w-20 border rounded px-1 py-1"
            />
          </td>
          <td class="border px-4 py-2">
            <input
              v-model="payment.payment_method"
              type="text"
              class="w-24 border rounded px-1 py-1"
            />
          </td>
          <td class="border px-4 py-2">{{ formatDate(payment.created_at) }}</td>
          <td class="border px-4 py-2 space-x-2">
            <button
              @click="updatePayment(payment)"
              class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500"
            >
              Edit
            </button>
            <button
              @click="deletePayment(payment.id)"
              class="bg-red-500 px-2 py-1 rounded hover:bg-red-600 text-white"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "PaymentTable",
  data() {
    return {
      payments: [],
      error: null,
    };
  },
  mounted() {
    this.fetchPayments();
  },
  methods: {
    async fetchPayments() {
      try {
        const response = await axios.get("/api/payments");
        this.payments = response.data;
      } catch (err) {
        this.error = "Failed to load payments.";
      }
    },
    formatDate(dateStr) {
      const d = new Date(dateStr);
      return d.toLocaleString();
    },
    async updatePayment(payment) {
      try {
        await axios.put(`/api/payments/${payment.id}`, {
          amount: payment.amount,
          payment_method: payment.payment_method,
        });
        alert("Payment updated successfully!");
      } catch (err) {
        alert("Failed to update payment.");
      }
    },
    async deletePayment(id) {
      if (!confirm("Are you sure you want to delete this payment?")) return;

      try {
        await axios.delete(`/api/payments/${id}`);
        this.payments = this.payments.filter((p) => p.id !== id);
        alert("Payment deleted successfully!");
      } catch (err) {
        alert("Failed to delete payment.");
      }
    },
  },
};
</script>

<style scoped>

</style>
