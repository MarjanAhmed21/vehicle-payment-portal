import { createRouter, createWebHistory } from "vue-router";
import UserForm from "./components/UserForm.vue";
import PaymentForm from "./components/PaymentForm.vue";
import PaymentTable from "./components/PaymentTable.vue";

const routes = [
  {
    path: "/",
    name: "UserForm",
    component: UserForm,
  },
  {
    path: "/payment",
    name: "PaymentForm",
    component: PaymentForm,
  },
  {
    path: "/payments",
    name: "PaymentTable",
    component: PaymentTable,
  },
];


const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;