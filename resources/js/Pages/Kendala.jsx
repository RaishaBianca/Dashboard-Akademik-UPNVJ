import React, { useState } from 'react';
import Tabs from '../Partial/Tabs';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch, faFilter } from '@fortawesome/free-solid-svg-icons';
import DataTable from '../Partial/Table';


export default function Kendala(){
    const [activeTab, setActiveTab] = useState('tab1');
    const [peminjamanData, setPeminjamanData] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);

    
    
    const columns1 = [
        { Header: 'Pelapor', accessor: 'pelapor' },
        { Header: 'Ruangan', accessor: 'ruangan' },
        { Header: 'Jenis Kendala', accessor: 'jenis' },
        { Header: 'Perangkat', accessor: 'perangkat' },
        { Header: 'Deskripsi Kerusakan', accessor: 'deskripsi' },
        { Header: 'Status', accessor: 'status' },
      ];

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