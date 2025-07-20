import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:8000/api", // dein Laravel-Backend
  withCredentials: true,                // für Sanctum-Cookies
});

export default api;
