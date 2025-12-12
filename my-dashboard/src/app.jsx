import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import AdminDashboard from './pages/AdminDashboard';
import CommercialDashboard from './pages/CommercialDashboard';
import ControleurDashboard from './pages/ControleurDashboard';
import Login from './pages/Login';

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/login" element={<Login />} />
        <Route path="/admin" element={<AdminDashboard />} />
        <Route path="/commercial" element={<CommercialDashboard />} />
        <Route path="/controleur" element={<ControleurDashboard />} />
      </Routes>
    </BrowserRouter>
  );
}