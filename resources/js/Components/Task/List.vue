<script setup>
import { router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import CardGrid from '@/Components/CardGrid.vue';

const props = defineProps({
  tasks: {
    type: Array,
  },
});

const tasks = computed(() => props.tasks);

const editedTask = ref(null);

function editTask(task) {
  editedTask.value = task;
}

function editNewTask() {
  if (editedTask.value && !editedTask.value?.id) return;
  const newTask = { text: '' };
  tasks.value.unshift(newTask);
  editedTask.value = newTask;
}

function onSave(form) {
    if (form.id) {
      form.put(route('tasks.update', { task: form.id }));
    } else {
      form.post(route('tasks.store'));
    }

    onCancel();
}

function onCancel() {
    editedTask.value = null;
}

</script>

<template>

    <div class="p-1 bg-white shadow sm:rounded-lg">
        <v-btn
            variant="tonal"
            @click.stop="() => editNewTask()"
        >
            Создать задачу
        </v-btn>
    </div>
    <CardGrid
        :itemList="tasks"
        :editedItem="editedTask"
        :cardTextGetter="task => task.text"
        :onSave="onSave"
        :onCancel="onCancel"
        v-slot="slotProps"
    >
        <v-btn
            @click.stop="() => editTask(slotProps?.item)"
            variant="tonal"
        >Редактировать</v-btn>
        <v-btn
            @click.stop="router.delete(route('tasks.destroy', { task: slotProps?.item.id }))"
            variant="tonal"
        >Удалить</v-btn>
    </CardGrid>
</template>
