<script setup>
import {Head, useForm} from '@inertiajs/vue3';

const props = defineProps({

    meteoData: {
        type: Object,
    },
    errors: Object,
});
const meteoDateForm = useForm(props.meteoData.data);
const deleteDataEntry = (index) => {
    meteoDateForm.hourly_data.splice(index, 1);
}
</script>

<template>
    <Head title="Welcome"/>

    <div class="flex flex-col min-h-screen w-full p-8 gap-y-5 ">

        <div class="flex justify-between">
            <div>data</div>
            <div class="flex gap-x-4">
                <button v-if="meteoDateForm.isDirty" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @click="meteoDateForm.put(route('meteo.update'))">Save
                </button>
            </div>
        </div>
        <div class="relative max-h-[600px] overflow-y-auto w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Time
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Temperature
                    </th>
                    <th class="flex gap-x-2 px-6 py-3" scope="col">
                        <span>Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(dateEntry,index) in meteoDateForm.hourly_data"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">
                        {{ dateEntry.time }}
                    </th>
                    <td class="px-6 py-4">
                        <input v-model="meteoDateForm.hourly_data[index].temperature_2m" class="w-full rounded-xl px-5 bg-blue-50" step="0.1"
                               type="number">
                    </td>
                    <td class="flex gap-x-2 px-6 py-4">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                @click="deleteDataEntry(index)">Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style>
</style>
