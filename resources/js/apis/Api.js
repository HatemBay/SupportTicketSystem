import axios from "axios";

let Api = axios.create({
    baseURL: "http://localhost/tickets-system/public/api"
});

Api.defaults.withCredentials = true;

export default Api;
