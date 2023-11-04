<template>
    <Head title="Create Client" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">Create Client</h2>
                <Link class="px-4 py-2 bg-gray-100 shadow border-gray-300 border hover:bg-white rounded" as="button" href="/clients">Back</Link>
            </div>
        </template>

        <!-- <div class="py-6">
            <div class="bg-white max-w-4xl p-4 mx-auto rounded-lg border w-[900px] px-4 mt-8 shadow">
                <form @submit.prevent="submit" class="flex">
                    <div class="flex-1 pr-4">
                        <h4 class="text-xl mb-4">Personal Details</h4>
                        <div class=" flex flex-col mb-3 form-field ">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" v-model="form.last_name">
                            <div class="text-red-600" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>
                        </div>

                        <div class="flex flex-col mb-3 form-field">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" v-model="form.first_name">
                            <div class="text-red-600" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>
                        </div>

                        <div class="flex flex-col mb-3 form-field">
                            <label for="address">Address</label>
                            <input type="text" id="address" v-model="form.address">
                            <div class="text-red-600" v-if="form.errors.address">{{ form.errors.address }}</div>
                        </div>

                        <div class="flex flex-col mb-3 form-field">
                            <label for="bdate">Birth Date</label>
                            <input type="date" id="bdate" v-model="form.bdate">
                        </div>

                        <div class=" flex flex-col mb-3 form-field">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" v-model="form.phone">
                            <div class="text-red-600" v-if="form.errors.phone">{{ form.errors.phone }}</div>
                        </div>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="profile_pic">Profile Picture</label>
                        <input type="file" @input="form.profile_pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/jpeg" />
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h4 class="text-xl">Biography</h4>
                        <textarea cols="30" v-model="form.bio" class="flex-1 border border-gray-400 rounded "></textarea>
                        <button class="px-4 py-2 mt-3 bg-blue-200 w-full rounded border border-blue-300 shadow hover:bg-white" type="submit">Create Client</button>
                    </div>
                </form>
            </div>
        </div> -->
        <div class="flex flex-col justify-center items-center h-[100vh]">
            <div class="relative flex flex-col items-center rounded-[20px] w-[800px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                <div class="mt-2 mb-8 w-full">
                    <form @submit.prevent="submit" class="flex">
                        <div class="flex-1 pr-4">
                            <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-black">
                                Personal Details
                            </h4>
                            <div class="px-5 py-5">
                                <label class="font-semibold text-sm text-gray-600  block" for="last_name">Last Name</label>
                                <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.last_name"/>
                                <div class="text-red-600" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>

                                <label class="font-semibold text-sm text-gray-600  block" for="first_name">First Name</label>
                                <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.first_name" />
                                <div class="text-red-600" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>

                                <label class="font-semibold text-sm text-gray-600  block" for="address">Address</label>
                                <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.address" />
                                <div class="text-red-600" v-if="form.errors.address">{{ form.errors.address }}</div>

                                <label class="font-semibold text-sm text-gray-600  block" for="bdate" >Birthday</label>
                                <input type="date" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.bdate" />
                                <div class="text-red-600" v-if="form.errors.bdate">{{ form.errors.bdate }}</div>

                                <label class="font-semibold text-sm text-gray-600  block" for="phone" >Phone</label>
                                <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 "  v-model="form.phone" />
                                <div class="text-red-600" v-if="form.errors.phone">{{ form.errors.phone }}</div>

                                <label class="font-semibold text-sm text-gray-600  block" for="phone" >Profile Picture</label>
                                <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-800 rounded text-center text-gray-600 "    accept="image/jpeg" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                              </div>
                        </div>
                        <div class="flex-1 flex flex-col">
                            <h4 class="px-2 text-xl  text-navy-700 dark:text-black">Biography</h4>
                            <textarea cols="30" v-model="form.bio" class=" flex-1 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 "></textarea>
                            <button class="px-4 py-2 mt-2 bg-blue-500 w-full rounded border border-blue-400 shadow hover:bg-blue-300">
                                Create Client
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    last_name: '',
    first_name: '',
    address: '',
    phone: '',
    bdate: '',
    bio: '',
    profile_pic: null,
})

function submit() {
    form.post('/clients/')
}

</script>
