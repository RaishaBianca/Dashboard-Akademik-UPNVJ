import React, { useState } from 'react';
import Tabs from '../Partial/Tabs';
import CustomDatePicker from '../Partial/CustomDatePicker';
import Timetable from '../Partial/Timetable';

export default function Jadwal() {
  const [activeTab, setActiveTab] = useState('tab1'); // Updated initial state to match tab ID

  const tabs = [
    {
      id: 'tab1',
      label: 'Peminjaman Lab',
      content: <div>Content for Peminjaman Lab</div>,
    },
    {
      id: 'tab2',
      label: 'Peminjaman Kelas',
      content: <div>Content for Peminjaman Kelas</div>,
    },
  ];

  const columns = [
    {
      Header: 'No',
      accessor: 'no',
    },
    {
      Header: 'Nama',
      accessor: 'nama',
    },
    {
      Header: 'NIM',
      accessor: 'nim',
    },
    {
      Header: 'Tanggal',
      accessor: 'tanggal',
    },
    {
      Header: 'Waktu',
      accessor: 'waktu',
    },
    {
      Header: 'Status',
      accessor: 'status',
    },
    {
      Header: 'Aksi',
      accessor: 'aksi',
    },
  ];

  const data = [
    {
      no: 1,
      nama: 'John Doe',
      nim: 'A11.2018.12345',
      tanggal: '12/12/2021',
      waktu: '08:00 - 10:00',
      status: 'pending',
      aksi: 'detail',
    },
    {
      no: 2,
      nama: 'Jane Doe',
      nim: 'A11.2018.54321',
      tanggal: '12/12/2021',
      waktu: '10:00 - 12:00',
      status: 'approved',
      aksi: 'detail',
    },
  ];

  const lab_options = [
    { value: 'L301', label: 'FIKLAB 301 - Ki Hajar Dewantara' },
    { value: 'L302', label: 'FIKLAB 302 - Ki Hajar Dewantara' },
    { value: 'L303', label: 'FIKLAB 303 - Ki Hajar Dewantara' },
    { value: 'L304', label: 'FIKLAB 304 - Ki Hajar Dewantara' },
    { value: 'L305', label: 'FIKLAB 305 - Ki Hajar Dewantara' },
  ];

  return (
    <div className="main">
      <h1 className="title">Jadwal</h1>
      <div className='jadwal-header'>
        <Tabs tabs={tabs} onTabChange={setActiveTab} />
      </div>
      <div className='jadwal-choice'>
        <div className='room-dropdown'>
          <label htmlFor="opsi_lab">Ruang </label>
          <select name="opsi_lab" id="opsi_lab" className='room-options'>
            {lab_options.map((lab) => (
              <option key={lab.value} value={lab.value}>
                {lab.label}
              </option>
            ))}
          </select>
        </div>
        <div className="date-picker">
          <CustomDatePicker />
          <span>-</span>
          <CustomDatePicker />
        </div>
      </div>
      <div>
        {activeTab === 'tab1' && <Timetable columns={columns} data={data} />} {/* Updated condition */}
      </div>
    </div>
  );
}