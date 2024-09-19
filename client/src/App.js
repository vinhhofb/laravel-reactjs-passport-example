import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import LoginForm from './pages/LoginForm';
import RegisterForm from './pages/RegisterForm';
import Profile from './pages/Profile';
import CaptureModel from './pages/CaptureModel';
import ListImageModel from './pages/ListImageModel';
import Header from './components/Header/Header';

function App() {
  return (
    <Router>
      <Header /> {/* Add Header component */}
      <main className="p-4">
        <Routes>
          <Route path="/login" element={<LoginForm />} />
          <Route path="/register" element={<RegisterForm />} />
          <Route path="/capture-model" element={<CaptureModel />} />
          <Route path="/list-image-model" element={<ListImageModel />} />
          <Route path="/profile" element={<Profile />} />
        </Routes>
      </main>
    </Router>
  );
}

export default App;
