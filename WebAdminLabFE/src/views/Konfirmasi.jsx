import React, { useState } from 'react';
import Tabs from '../partials/Tabs';
import DataTable from '../partials/Table'; // Assuming you have a DataTable component
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch, faFilter } from '@fortawesome/free-solid-svg-icons';

export default function Konfirmasi() {
  const [activeTab, setActiveTab] = useState('tab1');

  const columns1 = [
    { Header: 'Tanggal', accessor: 'tanggal' },
    { Header: 'Nama', accessor: 'nama' },
    { Header: 'NIM', accessor: 'nim' },
    { Header: 'Lab', accessor: 'lab' },
    { Header: 'Keterangan', accessor: 'ket' },
    { Header: 'Konfirmasi', accessor: 'kon' },
  ];

  const data1 = [
    { tanggal: '01/01/2021', nama: 'Foo', nim: '123', lab: 'Lab 1', ket: 'Bar', kon: 'accepted' },
    { tanggal: '02/01/2021', nama: 'Baz', nim: '456', lab: 'Lab 2', ket: 'Qux', kon: 'accepted' },
    { tanggal: '03/01/2021', nama: 'Lorem', nim: '789', lab: 'Lab 3', ket: 'Ipsum', kon: 'accepted' },
    { tanggal: '04/01/2021', nama: 'Dolor', nim: '012', lab: 'Lab 4', ket: 'Sit', kon: 'rejected' },
    { tanggal: '05/01/2021', nama: 'Amet', nim: '345', lab: 'Lab 5', ket: 'Consectetur', kon: 'rejected' },
    { tanggal: '06/01/2021', nama: 'Adipiscing', nim: '678', lab: 'Lab 6', ket: 'Elit', kon: 'rejected' },
  ];

  const columns2 = [
    { Header: 'Column A', accessor: 'colA' },
    { Header: 'Column B', accessor: 'colB' },
  ];

  const data2 = [
    { colA: 'Foo', colB: 'Bar' },
    { colA: 'Baz', colB: 'Qux' },
    { colA: 'Lorem', colB: 'Ipsum' },
  ];

  const tabs = [
    { id: 'tab1', label: 'Peminjaman Lab' },
    { id: 'tab2', label: 'Peminjaman Kelas' },
  ];

  return (
    <div className="main">
      <h1 className="title">Daftar Konfirmasi</h1>
      <div className='konfirm-header'>
        <Tabs tabs={tabs} onTabChange={setActiveTab} />
        <div className='find-filter'>
          <div className='search-main'>
            <input type="text" placeholder="  Search..." className='search-field-main' />
            <FontAwesomeIcon icon={faSearch} className='search-icon-main' />
          </div>
          <div className='filter'>
            <FontAwesomeIcon icon={faFilter} className='filter-icon' />
            Filter
            <div className='filter-box'>
              <ul>
                <li>
                  <input type="checkbox" />
                  <label>Filter 1</label>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      {activeTab === 'tab1' && <DataTable columns={columns1} data={data1} />}
      {activeTab === 'tab2' && <DataTable columns={columns2} data={data2} />}
    </div>
  );
}