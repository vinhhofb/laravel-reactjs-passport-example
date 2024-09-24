import React from 'react';

const EmployeeDetail = ({ inputs, onInputChange }) => {
    const handleChange = (e) => {
        const { name, value } = e.target;
        const fieldName = name.split('.'); // Split the name to get the nested structure
        onInputChange(fieldName[0], { ...inputs, [fieldName[1]]: value });
    };

    return (
        <div>
            <input
                type="text"
                name="profile.name"
                value={inputs.name}
                onChange={handleChange}
                placeholder="Enter profile name"
                className="p-2 border border-gray-300 rounded mb-2"
            />
            <input
                type="email"
                name="profile.email"
                value={inputs.email}
                onChange={handleChange}
                placeholder="Enter profile email"
                className="p-2 border border-gray-300 rounded mb-2"
            />
            <input
                type="tel"
                name="profile.phone"
                value={inputs.phone}
                onChange={handleChange}
                placeholder="Enter profile phone"
                className="p-2 border border-gray-300 rounded"
            />
        </div>
    );
};

export default EmployeeDetail;
