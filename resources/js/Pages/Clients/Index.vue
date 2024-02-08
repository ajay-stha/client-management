<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import '@fortawesome/fontawesome-free/css/all.css';
import { Head,Link,useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
defineProps(['clients']);
let showDetail = ref(false);
const closeModal = () => {
    showDetail.value = false;
}

let form = useForm({
    name: '',
    gender: '',
    phone: '',
    email: '',
    address: '',
    nationality: '',
    dob: '',
    educationBackground: '',
    preferredModeofContact: 'none'
});

const showDetailModal = (item) => {
    showDetail.value = true;
    form = item;
}
</script>
 
<template>
    <Head title="Clients" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Client</h2>
        </template>

        
                

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="flex items-center justify-end mt-2">
                <Link
                    :href="route('clients.create')"
                    class="mt-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150"
                    >Create
                </Link>
            </div>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in clients">
                      <td>{{item.name}}</td>  
                      <td>{{item.phone}}</td>  
                      <td>{{item.gender}}</td>  
                      <td>{{item.email}}</td> 
                      <td>{{item.address}}</td> 
                      <td>
                        <button title="View" class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center space-x-2" @click="showDetailModal(item)">
                            <i class="fas fa-eye"></i>
                        </button>
                      </td>  
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Main modal -->
        <div v-if="showDetail" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-1/4 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-gray-100 rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-black dark:text-white">
                            CLient Detail
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" @click="closeModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
                            <div class="row">
                                <div class="col-6">
                                    <InputLabel>Name</InputLabel>
                                    <input 
                                        type="text" 
                                        v-model="form.name"
                                        placeholder="Name"
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        disabled
                                    />
                                </div>
                                <div class="col-6">
                                    <InputLabel>Gender</InputLabel>
                                    <input type="radio" name="taxregistration" value="Male" v-model="form.gender" disabled>
                                    <label class="font-medium mr-2 text-sm text-gray-700">Male</label>
                                    <input type="radio" name="taxregistration" value="Female" v-model="form.gender" disabled>
                                    <label class="font-medium text-sm text-gray-700">Female</label>
                                </div>
                            </div>
                            
                                
                            <div class="row mt-4">
                                <div class="col-6">
                                    <InputLabel>Phone</InputLabel>
                                    <input 
                                        type="text" 
                                        v-model="form.phone"
                                        placeholder="Phone"
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        disabled
                                    />
                                </div>
                                <div class="col-6">
                                    <InputLabel>Email</InputLabel>
                                    <input 
                                        type="text" 
                                        v-model="form.email"
                                        placeholder="Email"
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        disabled
                                    />
                                </div>
                            </div>
                                
                            <div class="row mt-4">
                                <div class="col-6">
                                    <InputLabel>Address</InputLabel>
                                    <input 
                                        type="text" 
                                        v-model="form.address"
                                        placeholder="Address"
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        disabled
                                    />
                                </div>
                                <div class="col-6">
                                    <InputLabel>Nationality</InputLabel>
                                    <input 
                                        type="text" 
                                        v-model="form.nationality"
                                        placeholder="Nationality"
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        disabled
                                    />
                                </div>
                            </div>
                                
                            <div class="row mt-4">
                                <div class="col-6">
                                    <InputLabel>Date of Birth</InputLabel>
                                    <input 
                                        type="text"
                                        v-model="form.dob" 
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        disabled
                                    />
                                </div>
                                <div class="col-6">
                                    <InputLabel>Education Background</InputLabel>
                                    <input 
                                        type="text" 
                                        v-model="form.educationBackground"
                                        placeholder="Education Background"
                                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        disabled
                                        />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <InputLabel>Preferred mode of contact</InputLabel>
                                    <input 
                                        v-model="form.preferredModeofContact" 
                                        class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                        disabled
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>