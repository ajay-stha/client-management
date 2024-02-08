<style>
.dp__input{
    width: 82%;
    height: 41.6px;
}</style>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { useForm, Head } from '@inertiajs/vue3';
 
const form = useForm({
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

const validateForm = (field) => {
    const val = form[field];

    switch (field){
        case 'name':
        case 'address':
        case 'nationality':
        case 'gender':
            if (!val) form.errors[field] = `The ${field} field is required.`;
            else form.errors[field] = null;
            break;
        case 'email':
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!val) form.errors[field] = `The ${field} field is required.`;
            else if(!emailRegex.test(form.email)) form.errors.email = 'Please enter a valid email address.';
            else form.errors[field] = null;
            break;
        case 'phone':
            const mobileRegx = new RegExp(/^[\d]{10}$/);
            if (!val) form.errors[field] = `The ${field} field is required.`;
            else if (!mobileRegx.test(val)) form.errors[field] = 'Please enter a valid phone.';
            else form.errors[field] = null;
            break;
    }
}

const submitData = () => {
    Object.keys(form).forEach(field => {
        validateForm(field);
    });

    if (Object.values(form.errors).filter(x => x != null).length > 0) {
        return;
    }
    else{
        form.post(route('clients.store'), { onSuccess: () => form.reset() })
    }
}
</script>

<template>
    <Head title="Clients" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <form @submit.prevent="submitData">
                <div class="row">
                    <div class="col-6">
                        <InputLabel><span class="requiredLabel">Name</span><span v-if="form.errors.name" class="ml-4 font-medium text-sm text-red-500">{{ form.errors.name }}</span></InputLabel>
                        <input 
                            type="text" 
                            v-model="form.name"
                            placeholder="Name"
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            @change="validateForm('name')"
                        />
                    </div>
                    <div class="col-6">
                        <InputLabel><span class="requiredLabel">Gender</span> <span v-if="form.errors.gender" class="ml-4 font-medium text-sm text-red-500">{{ form.errors.gender }}</span></InputLabel>
                        <input type="radio" name="taxregistration" value="Male" v-model="form.gender">
                        <label class="font-medium mr-2 text-sm text-gray-700">Male</label>
                        <input type="radio" name="taxregistration" value="Female" v-model="form.gender">
                        <label class="font-medium text-sm text-gray-700">Female</label>
                    </div>
                </div>
                
                    
                <div class="row mt-4">
                    <div class="col-6">
                        <InputLabel><span class="requiredLabel">Phone</span> <span v-if="form.errors.phone" class="ml-4 font-medium text-sm text-red-500">{{ form.errors.phone }}</span></InputLabel>
                        <input 
                            type="text" 
                            v-model="form.phone"
                            placeholder="Phone"
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            @change="validateForm('phone')"
                        />
                    </div>
                    <div class="col-6">
                        <InputLabel><span class="requiredLabel">Email</span> <span v-if="form.errors.email" class="ml-4 font-medium text-sm text-red-500">{{ form.errors.email }}</span></InputLabel>
                        <input 
                            type="text" 
                            v-model="form.email"
                            placeholder="Email"
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            @change="validateForm('email')"
                        />
                    </div>
                </div>
                    
                <div class="row mt-4">
                    <div class="col-6">
                        <InputLabel><span class="requiredLabel">Address</span> <span v-if="form.errors.address" class="ml-4 font-medium text-sm text-red-500">{{ form.errors.address }}</span></InputLabel>
                        <input 
                            type="text" 
                            v-model="form.address"
                            placeholder="Address"
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            @change="validateForm('address')"
                        />
                    </div>
                    <div class="col-6">
                        <InputLabel><span class="requiredLabel">Nationality</span> <span v-if="form.errors.nationality" class="ml-4 font-medium text-sm text-red-500">{{ form.errors.nationality }}</span></InputLabel>
                        <input 
                            type="text" 
                            v-model="form.nationality"
                            placeholder="Nationality"
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            @change="validateForm('nationality')"
                        />
                    </div>
                </div>
                    
                <div class="row mt-4">
                    <div class="col-6">
                        <InputLabel>Date of Birth</InputLabel>
                        <VueDatePicker 
                            v-model="form.dob" 
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :enable-time-picker="false">
                        </VueDatePicker>
                    </div>
                    <div class="col-6">
                        <InputLabel>Education Background</InputLabel>
                        <input 
                            type="text" 
                            v-model="form.educationBackground"
                            placeholder="Education Background"
                            class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <InputLabel>Preferred mode of contact</InputLabel>
                        <select v-model="form.preferredModeofContact" class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                            <option :value="'none'">None</option>
                            <option :value="'email'">Email</option>
                            <option :value="'phone'">Phone</option>
                        </select>
                    </div>
                </div>
                <InputError>{{  }}</InputError>
                <PrimaryButton class="mt-4">Save</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>