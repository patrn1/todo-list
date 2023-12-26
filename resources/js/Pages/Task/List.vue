<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import TasksList from '@/Components/Task/List.vue';

defineProps({
  tasks: {
    type: Array,
  },
});

</script>

<template>
    <Head title="Задачи" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">TODO:</h2>
        </template>

        <div class="pt-1 pb-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <TasksList
                    :tasks="tasks"
                />
            </div>
        </div>
    </GuestLayout>
</template>
