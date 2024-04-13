<template>
    <Layout>
        <template v-slot:header>
            <h2 class="mb-4">Tambah User</h2>
        </template>
        <div class="container">
            <form @submit.prevent="tambahUser">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="name" v-model="form.name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" v-model="form.email" id="email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" v-model="form.password" id="password">
                </div>
                <button type="submit" class="btn btn-primary" :disabled="isLoading">
                    <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Tambah User
                </button>
            </form>
        </div>
    </Layout>

</template>
<script>
import Layout from '../../Shared/Layout.vue';
import Swal from 'sweetalert2';
import { usePage } from '@inertiajs/vue3';
export default {
    components: {
        Layout
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: ''
            },
            isLoading: false
        }
    },
    methods: {
        tambahUser() {
            this.isLoading = true; // Set loading indicator to true before request
            this.$inertia.post('/users', this.form, {
                onSuccess: () => {
                    this.isLoading = false; // Set loading indicator to false after request succeeds
                    Swal.fire({
                        title: 'Success!',
                        text: 'User berhasil ditambahkan',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        allowEnterKey: true
                    });
                },
                onError: (errors) => {
                    this.isLoading = false; // Set loading indicator to false after request fails
                    let errorMessage = 'Gagal menambahkan user. periksa inputan anda kembali ';
                    if (errors.response && errors.response.data && errors.response.data.message) {
                        errorMessage += errors.response.data.message;
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        allowEnterKey: true
                    });
                }
            })
        }
    }
}
</script>
