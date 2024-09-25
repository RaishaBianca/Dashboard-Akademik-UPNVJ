import {createBrowserRouter, Navigate} from 'react-router-dom';
import DefaultLayout from './components/DefaultLayout.jsx';
import GuestLayout from './components/GuestLayout.jsx';
import Dashboard from './views/Dashboard.jsx';
import Login from './views/Login.jsx';
import NotFound from './views/NotFound.jsx';
import Konfirmasi from './views/Konfirmasi.jsx';
import Jadwal from './views/Jadwal.jsx';
import Kendala from './views/Kendala.jsx';

const router = createBrowserRouter([
   {
      path: '/', 
      element: <DefaultLayout />,
      children: [
         {
            path: '/',
            element: <Navigate to="/dashboard" />
         },
         {
            path: '/dashboard',
            element: <Dashboard />
         },
         {
            path:'/daftar-konfirmasi',
            element: <Konfirmasi/>
         },
         {
            path:'/jadwal-pemakaian',
            element: <Jadwal/>
         },
         {
            path:'/pelaporan-kendala',
            element: <Kendala/>
         }
      ]
   },
   {
      path: '/', 
      element: <GuestLayout />,
      children: [
         {
            path: '/',
            element: <Navigate to="/login" />
         },
         {
            path: '/login',
            element: <Login />
         }
      ]
   },
   {
    path: '*',
    element: <NotFound />,
   },
]);

export default router;