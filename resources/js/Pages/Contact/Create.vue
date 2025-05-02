<script setup>
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import FileInput from '@/Components/FileInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const initialValues = {
    name: "",
    phone: "",
    avatar: null,
    privacity: "private",
}
const form = useForm(initialValues);
const onSelectAavatar = (e) => {
    const files = e.target.files;
    if (files.length) {
        form.avatar = files[0]
    }
    console.log(form.avatar)
}
const submit = ()=>{
    console.log("Valor de privacidad: ", form.privacity)
    form.post(route('contact.store'))
}
</script>

<template>

    <Head title="Crea contacto" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Crear contacto
                </h2>
                <Link :href="route('contact.index')">
                Lista de contactos
                </Link>
            </div>

        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-center overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <form class="w-1/3 py-5 space-y-3" @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="Nombre" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                                autocomplete="name" placeholder="Neider Ruiz" />

                            <InputError class="mt-2" :message="form.errors.name" />

                        </div>
                        <div>
                            <InputLabel for="phone" value="Telefono" />

                            <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone"
                                placeholder="+57 315589894" />

                            <InputError class="mt-2" :message="form.errors.phone" />

                        </div>
                        <div>
                            <InputLabel for="avatar" value="Avatar" />
                            <FileInput name="avatar" @change="onSelectAavatar" />
                            <InputError class="mt-2" :message="form.errors.avatar" />
                        </div>
                        <div>
                            <InputLabel for="privacity" value="Privacidad" />

                            <SelectInput id="privacity" v-model="form.privacity" :options="[
                                { value: 'private', label: 'Privado' },
                                { value: 'public', label: 'Público' }
                            ]" class="mt-1 block w-full" />

                            <InputError class="mt-2" :message="form.errors.privacity" />
                        </div>
                        <div class="flex justify-center">
                            <PrimaryButton>
                                Crear contacto
                            </PrimaryButton>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
