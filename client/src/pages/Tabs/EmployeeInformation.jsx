import React, { useState } from 'react';
import { useForm, Controller } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import * as yup from 'yup';

// Validation schema
const schema = yup.object().shape({
    full_name: yup.string().required('Full name is required'),
    gender: yup.string().required('Gender is required'),
    date_of_birth: yup.date().required('Date of birth is required').nullable(),
    nationality: yup.string().required('Nationality is required'),
    identity_number: yup.string().required('Identity number is required'),
    address: yup.string().required('Address is required'),
    phone_number: yup.string().required('Phone number is required').matches(/^[0-9]+$/, 'Phone number must be numeric'),
    email: yup.string().email('Invalid email').required('Email is required'),
    avatar: yup.mixed().required('Avatar is required'),
});

const EmployeeInformation = () => {
    const { control, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(schema),
    });

    const [avatar, setAvatar] = useState(null);
    const [preview, setPreview] = useState(null);

    const onSubmit = (data) => {
        console.log(data);
        // Handle the uploaded file (avatar) here as needed
    };

    const handleFileChange = (event) => {
        const file = event.target.files[0];
        setAvatar(file);
        setPreview(URL.createObjectURL(file)); // Create a preview URL for the image
    };

    return (
        <section className="bg-gray-50 dark:bg-gray-900">
            <div className="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div className="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div className="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 className="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            User Information Form
                        </h1>
                        <form className="space-y-4 md:space-y-6" onSubmit={handleSubmit(onSubmit)}>
                            <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <Controller
                                    name="full_name"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                                            <input {...field} className={`bg-gray-50 border ${errors.full_name ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.full_name && <p className="text-red-500 text-xs">{errors.full_name.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="gender"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                            <select {...field} className={`bg-gray-50 border ${errors.gender ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`}>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            {errors.gender && <p className="text-red-500 text-xs">{errors.gender.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="date_of_birth"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                                            <input type="date" {...field} className={`bg-gray-50 border ${errors.date_of_birth ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.date_of_birth && <p className="text-red-500 text-xs">{errors.date_of_birth.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="nationality"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nationality</label>
                                            <input {...field} className={`bg-gray-50 border ${errors.nationality ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.nationality && <p className="text-red-500 text-xs">{errors.nationality.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="identity_number"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identity Number</label>
                                            <input {...field} className={`bg-gray-50 border ${errors.identity_number ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.identity_number && <p className="text-red-500 text-xs">{errors.identity_number.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="address"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                            <input {...field} className={`bg-gray-50 border ${errors.address ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.address && <p className="text-red-500 text-xs">{errors.address.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="phone_number"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                            <input {...field} className={`bg-gray-50 border ${errors.phone_number ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.phone_number && <p className="text-red-500 text-xs">{errors.phone_number.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="email"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" {...field} className={`bg-gray-50 border ${errors.email ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.email && <p className="text-red-500 text-xs">{errors.email.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="avatar"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                                            <input 
                                                type="file" 
                                                accept="image/*" 
                                                onChange={(event) => {
                                                    handleFileChange(event);
                                                    field.onChange(event); // Update react-hook-form state
                                                }} 
                                                className="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" 
                                            />
                                            {errors.avatar && <p className="text-red-500 text-xs">{errors.avatar.message}</p>}
                                            {preview && (
                                                <img src={preview} alt="Preview" className="mt-4 rounded-lg border w-32 h-32 object-cover" />
                                            )}
                                        </div>
                                    )}
                                />
                            </div>
                            <button type="submit" className="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default EmployeeInformation;
