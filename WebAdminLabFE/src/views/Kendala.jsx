import React, { useState } from 'react';
import Tabs from '../partials/Tabs';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch, faFilter } from '@fortawesome/free-solid-svg-icons';
import DataTable from '../partials/Table';


export default function Kendala(){
    const [activeTab, setActiveTab] = useState('tab1');
    const columns1 = [
        { Header: 'Pelapor', accessor: 'pelapor' },
        { Header: 'Ruangan', accessor: 'ruangan' },
        { Header: 'Jenis Kendala', accessor: 'jenis' },
        { Header: 'Perangkat', accessor: 'perangkat' },
        { Header: 'Deskripsi Kerusakan', accessor: 'deskripsi' },
        { Header: 'Status', accessor: 'status' },
      ];

    const data1 = [
        { pelapor: 'Foo', ruangan: 'Lab 1', jenis: 'Kendala 1', perangkat: 'Perangkat 1', deskripsi: 'Deskripsi 1', status: 'Dalam Proses' },
        { pelapor: 'Baz', ruangan: 'Lab 2', jenis: 'Kendala 2', perangkat: 'Perangkat 2', deskripsi: 'Deskripsi 2', status: 'Selesai' },
        { pelapor: 'Lorem', ruangan: 'Lab 3', jenis: 'Kendala 3', perangkat: 'Perangkat 3', deskripsi: 'Deskripsi 3', status: 'Dalam Proses' },
        { pelapor: 'Dolor', ruangan: 'Lab 4', jenis: 'Kendala 4', perangkat: 'Perangkat 4', deskripsi: 'Deskripsi 4', status: 'Selesai' },
        { pelapor: 'Amet', ruangan: 'Lab 5', jenis: 'Kendala 5', perangkat: 'Perangkat 5', deskripsi: 'Deskripsi 5', status: 'Dalam Proses' },
        { pelapor: 'Adipiscing', ruangan: 'Lab 6', jenis: 'Kendala 6', perangkat: 'Perangkat 6', deskripsi: 'Deskripsi 6', status: 'Selesai' },
    ]
    
      const tabs = [
        { id: 'tab1', label: 'Kendala Aset Lab' },
        { id: 'tab2', label: 'Kendala Aset Kelas' },
      ];
    return (
        <div className='main'>
              <h1 className="title">Pelaporan Kendala</h1>
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