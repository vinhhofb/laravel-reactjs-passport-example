import React, { useEffect, useState } from 'react';
import axios from 'axios';

const ListImageModel = () => {
    const [images, setImages] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchImages = async () => {
            const token = localStorage.getItem('token');
            try {
                const response = await axios.get(`${process.env.REACT_APP_API_URL}/api/user-image-models`, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });
                setImages(response.data.images);
            } catch (error) {
                setError('Failed to fetch images');
            } finally {
                setLoading(false);
            }
        };

        fetchImages();
    }, []);

    if (loading) return (
        <div className="flex items-center justify-center h-screen">
            <div className="w-16 h-16 border-4 border-blue-500 border-t-transparent border-solid rounded-full animate-spin"></div>
        </div>
    );
    if (error) return <p className="text-red-500 text-center">{error}</p>;

    return (
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
            {images.map((image) => (
                <div key={image.file_name} className="relative overflow-hidden rounded-lg shadow-lg bg-white">
                    <img
                        src={`${process.env.REACT_APP_API_URL}/user-image-models/${image.file_name}`}
                        alt="User model"
                        className="w-full h-auto object-cover transition-transform transform hover:scale-105"
                    />
                </div>
            ))}
        </div>
    );
};

export default ListImageModel;
