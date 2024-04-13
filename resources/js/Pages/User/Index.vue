<template>
    <Layout>
        <div class="container mt-3">
            <h2 class="text-center">Daftar User</h2>
            <div class="d-flex justify-content-end mb-2">
                <Link href="/users/tambah" class="btn btn-primary">Tambah User</Link>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in datauser.data" :key="user.id">
                            <th scope="row">{{ (datauser.current_page - 1) * datauser.per_page + index + 1 }}</th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <Link :href="`/users/edit/${user.id}`" class="btn btn-sm btn-primary me-1">Edit</Link>
                                <button @click="deleteUser(user.id)" class="btn btn-sm btn-danger me-1">Delete</button>
                                <Link :href="`/users/detail/${user.id}`" class="btn btn-sm btn-info">Detail</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <Component
                :is="link.url ? 'Link' : 'span'"
                v-for="link in datauser.links"
               :href="link.url"
               v-html="link.label"
               class="px-1"
               :class="link.url ? '' : 'text-gray-500'"
               />


            </div>
            <!-- Pagination component is commented out due to import error -->
            <!-- <Pagination :links="datauser.links"></Pagination> -->
        </div>
    </Layout>
</template>
<script>
import Layout from '../../Shared/Layout.vue';
import { Link } from '@inertiajs/vue3';
import Swal from 'sweetalert2'; // Added import for Swal
// import Pagination from '../../Components/Pagination.vue'; // Corrected import path
export default {
    components: {
        Layout,
        Link,
        // Pagination // Added Pagination to components
    },
    props: {
        datauser: Object
    },
    methods: {

        deleteUser(userId) {
            // Perform delete operation here
            Swal.fire({
                title: 'Are you sure?',
                text: 'Yakin Hapus Data User ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(`/users/${userId}`).then(() => {
                        Swal.fire({
                            title: 'Success!',
                            text: 'User berhasil dihapus',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            allowEnterKey: true // Added allowEnterKey option
                        });
                    });
                }
            });
        }
    }
}
</script>
