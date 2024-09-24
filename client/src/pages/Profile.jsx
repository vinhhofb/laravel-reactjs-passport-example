import React, { useState } from 'react';
import { useForm, Controller } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import * as yup from 'yup';
import EmployeeInformation from './Tabs/EmployeeInformation';
import EmployeeLeaveBalance from './Tabs/EmployeeLeaveBalance';

const validationSchema = yup.object().shape({
    name: yup.string().required('Name is required'),
    phone: yup.string().required('Phone is required'),
    email: yup.string().email('Email is not valid').required('Email is required'),
    salary: yup.number().positive('Salary must be a positive number').required('Salary is required'),
});

const Profile = () => {
    const [activeTab, setActiveTab] = useState('employeeDetail');
    const { control, handleSubmit, getValues } = useForm({
        resolver: yupResolver(validationSchema),
    });

    const onSubmit = () => {
        const formData = getValues();
        console.log(formData);
    };

    return (
        <div className="flex flex-col md:flex-row">
            <div className="w-full md:w-2/3 p-4"> {/* 8 parts out of 12 */}
                <EmployeeInformation />
            </div>
            {/* <div className="w-full md:w-1/3 p-4"> 
        <EmployeeLeaveBalance />
    </div> */}
        </div>

    );
};

export default Profile;
