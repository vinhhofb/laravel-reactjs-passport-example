import React from 'react';

const EmployeeSalary = ({ inputs, onInputChange }) => (
    <div>
        <input
            type="text"
            name="contacts.name"
            value={inputs.name}
            onChange={onInputChange}
            placeholder="Enter profile name"
            className="p-2 border border-gray-300 rounded mb-2"
        />
        <input
            type="email"
            name="contacts.email"
            value={inputs.email}
            onChange={onInputChange}
            placeholder="Enter profile email"
            className="p-2 border border-gray-300 rounded mb-2"
        />
        <input
            type="tel"
            name="contacts.phone"
            value={inputs.phone}
            onChange={onInputChange}
            placeholder="Enter profile phone"
            className="p-2 border border-gray-300 rounded"
        />
    </div>
);

export default EmployeeSalary;
