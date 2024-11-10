// In resources/js/Partial/Chart.jsx
import React from 'react';
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts';

const data = [
  { 
    day: 'Senin',
    peminjaman: 20,
    kendala: 5
  },
  { 
    day: 'Selasa', 
    peminjaman: 15,
    kendala: 3
  },
  { 
    day: 'Rabu',
    peminjaman: 25,
    kendala: 7
  },
  { 
    day: 'Kamis',
    peminjaman: 18,
    kendala: 4
  },
  { 
    day: 'Jumat',
    peminjaman: 22,
    kendala: 6
  }
];

const SimpleBarChart = () => (
  <ResponsiveContainer width="100%" height={400}>
    <BarChart data={data}>
      <CartesianGrid strokeDasharray="3 3" />
      <XAxis dataKey="day" />
      <YAxis />
      <Tooltip />
      <Legend />
      <Bar dataKey="peminjaman" fill="#8884d8" name="Total Peminjaman" />
      <Bar dataKey="kendala" fill="#82ca9d" name="Total Kendala" />
    </BarChart>
  </ResponsiveContainer>
);

export default SimpleBarChart;