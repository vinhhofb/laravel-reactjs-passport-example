import React from 'react';
import { useForm, Controller } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import * as yup from 'yup';

const schema = yup.object().shape({
    annual_leave_days: yup.number().required('Annual leave days are required').positive().integer(),
    used_leave_days: yup.number().required('Used leave days are required').min(0).max(yup.ref('annual_leave_days')),
    remaining_leave_days: yup.number().required('Remaining leave days are required').min(0).max(yup.ref('annual_leave_days')),
    hours_in_day: yup.number().required('Hours in a day are required').positive(),
});

const EmployeeLeaveBalance = () => {
    const { control, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(schema),
    });

    const onSubmit = (data) => {
        console.log(data);
    };

    return (
        <section className="bg-gray-50 dark:bg-gray-900">
            <div className="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div className="w-full max-w-4xl bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div className="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 className="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Employee Leave Balance
                        </h1>
                        <form className="space-y-4 md:space-y-6" onSubmit={handleSubmit(onSubmit)}>
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <Controller
                                    name="annual_leave_days"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Annual Leave Days</label>
                                            <input {...field} type="number" className={`bg-gray-50 border ${errors.annual_leave_days ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.annual_leave_days && <p className="text-red-500 text-xs">{errors.annual_leave_days.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="used_leave_days"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Used Leave Days</label>
                                            <input {...field} type="number" className={`bg-gray-50 border ${errors.used_leave_days ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.used_leave_days && <p className="text-red-500 text-xs">{errors.used_leave_days.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="remaining_leave_days"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remaining Leave Days</label>
                                            <input {...field} type="number" className={`bg-gray-50 border ${errors.remaining_leave_days ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.remaining_leave_days && <p className="text-red-500 text-xs">{errors.remaining_leave_days.message}</p>}
                                        </div>
                                    )}
                                />
                                <Controller
                                    name="hours_in_day"
                                    control={control}
                                    render={({ field }) => (
                                        <div>
                                            <label className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hours in a Day</label>
                                            <input {...field} type="number" className={`bg-gray-50 border ${errors.hours_in_day ? 'border-red-500' : 'border-gray-300'} rounded-lg block w-full p-2.5`} />
                                            {errors.hours_in_day && <p className="text-red-500 text-xs">{errors.hours_in_day.message}</p>}
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

export default EmployeeLeaveBalance;
