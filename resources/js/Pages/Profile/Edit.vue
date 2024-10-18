<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const breadcrumbs = [
    { text: 'Dashboard', link: route('dashboard') },
    { text: 'Profile' },
];

</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout :breadcrumbs="breadcrumbs">

                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />

                    <UpdatePasswordForm class="max-w-xl" />

                    <DeleteUserForm class="max-w-xl" />



    </AuthenticatedLayout>
</template>
