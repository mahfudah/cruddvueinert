<template>
    <Layout>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ user.name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ user.email }}</h6>
                <p class="card-text">Here you can add more details about the user.</p>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../Shared/Layout.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

export default {
    components: {
        Layout
    },
    setup() {
        const { props } = usePage();
        const user = ref(props.user);
        return { user };
    }
}
</script>
