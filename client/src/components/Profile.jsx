import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import FaceRecognition from './FaceRecognition';

const Profile = () => {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);
  const navigate = useNavigate();
  const [status, setStatus] = useState('Scan face');
  const [dataAttendances, setDataAttendances] = useState([]);
  const [attendanceToday, setAttendanceToday] = useState();

  useEffect(() => {
    const token = localStorage.getItem('token');
    if (!token) {
      navigate('/login');
    }
  }, [navigate]);

  useEffect(() => {
    fetchUserData();
  }, []);

  const fetchUserData = async () => {
    try {
      const token = localStorage.getItem('token');
      const response = await axios.get('http://127.0.0.1:8000/api/user', {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      setUser(response.data.user);
      setDataAttendances(response.data.attendances)
      setAttendanceToday(response.data.attendanceToday)
      setLoading(false);
    } catch (error) {
      console.error('Failed to fetch user data', error);
      setLoading(false);
    }
  };

  const handleLogout = () => {
    localStorage.removeItem('token');
    navigate('/login');
  };

  return (
    <div className="flex justify-center items-center h-screen bg-gray-100">
      <div className="flex bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
        <div className="w-1/2 pr-4">
          <h2 className="text-2xl font-bold mb-4">User Data</h2>
          <table className="table-auto w-full border-collapse border border-gray-300">
            <thead>
              <tr className="bg-gray-200">
                <th className="border border-gray-300 px-4 py-2">ID</th>
                <th className="border border-gray-300 px-4 py-2">Name</th>
                <th className="border border-gray-300 px-4 py-2">Email</th>
                <th className="border border-gray-300 px-4 py-2">CheckIn</th>
              </tr>
            </thead>
            <tbody>
              {dataAttendances.length > 0 ? (
                dataAttendances.map((attendances) => (
                  <tr key={attendances.id}>
                    <td className="border border-gray-300 px-4 py-2">{attendances.id}</td>
                    <td className="border border-gray-300 px-4 py-2">{user.name}</td>
                    <td className="border border-gray-300 px-4 py-2">{user.email}</td>
                    <td className="border border-gray-300 px-4 py-2">{attendances.checkin_time}</td>
                  </tr>
                ))
              ) : (
                <tr>
                  <td colSpan="3" className="border border-gray-300 px-4 py-2 text-center">
                    No data available
                  </td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
        <div className="w-1/2 p-4">
          <h2 className="text-2xl font-bold">Profile</h2>
          {loading ? (
            <div className="flex justify-center items-center">
              <div className="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
            </div>
          ) : (
            <div>
              {status === 'Checkin Success' || attendanceToday ? (
                  <div className='p-5 flex justify-center items-center'>
                    <img src="check.png" alt="Checkin Success" className='w-20 h-20' />
                  </div>
              ) : (
                  <FaceRecognition status={status} setStatus={setStatus} fetchUserData={fetchUserData} />
              )}
              <p className="text-lg font-medium">Name: {user.name}</p>
              <p className="text-lg font-medium">Email: {user.email}</p>
              <button
                onClick={handleLogout}
                className="w-full bg-blue-600 text-white py-2 mt-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
              >
                Logout
              </button>
            </div>
          )}
        </div>
      </div>
    </div>
  );
};

export default Profile;
