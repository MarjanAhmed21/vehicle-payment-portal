<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <nav class="mb-4">
    <router-link to="/" class="mr-4 text-blue-600 hover:underline">Add Customer</router-link>
    <router-link to="/payment" class="mr-4 text-blue-600 hover:underline">Add Payment</router-link>
    <router-link to="/payments" class="text-blue-600 hover:underline">View Payments</router-link>
  </nav>


    <router-view />
  </div>
</template>

<script>
export default {};
</script>