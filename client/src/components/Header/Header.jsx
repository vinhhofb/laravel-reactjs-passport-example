import React from 'react';
import { Link, useNavigate } from 'react-router-dom';

const Header = () => {
  const navigate = useNavigate();
  const user = JSON.parse(localStorage.getItem('user'));

  const handleLogout = () => {
    localStorage.removeItem('user');
    localStorage.removeItem('token');
    navigate('/login'); // Redirect to login page after logout
  };

  return (
    <header className="fixed top-0 w-full bg-gray-800 text-white p-4 flex justify-between items-center z-50">
      <div className="text-xl font-bold">
        <Link to="/" className="hover:text-gray-300">
          Logo
        </Link>
      </div>
      <nav className="flex space-x-4">
        {user ? (
          <button
            onClick={handleLogout}
            className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          >
            Logout
          </button>
        ) : (
          <>
            <Link
              to="/login"
              className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
              Login
            </Link>
            <Link
              to="/signup"
              className="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
              Signup
            </Link>
          </>
        )}
      </nav>
    </header>
  );
};

export default Header;
