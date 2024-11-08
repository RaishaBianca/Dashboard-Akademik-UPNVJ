import React, { useState, useEffect } from 'react';
import Tabs from '../Partial/Tabs';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch, faFilter } from '@fortawesome/free-solid-svg-icons';
import DataTable from '../Partial/Table';


export default function Kendala(){
    const [activeTab, setActiveTab] = useState('tab1');
    const [laporanData, setLaporanData] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetchLaporanData();
    }, []);

    const fetchLaporanData = async (search = '') => {
        try {
            const response = await fetch(`/data-kendala?search=${search}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            const formattedData = data.map(item => ({
                id: item.id,
                pelapor: item.nama,
                ruangan: item.lab,
                jenis: item.jenis_kendala,
                bentuk: item.bentuk_kendala,
                deskripsi: item.deskripsi,
                kon: item.status
            }));
            setLaporanData(formattedData);
        } catch (error) {
            console.error('Error fetching data:', error);
            setError('Failed to load data');
        } finally {
            setIsLoading(false);
        }
    };
    
    
    const columns1 = [
        { Header: 'Pelapor', accessor: 'pelapor' },
        { Header: 'Ruangan', accessor: 'ruangan' },
        { Header: 'Jenis Kendala', accessor: 'jenis' },
        { Header: 'Bentuk Kendala', accessor: 'bentuk' },
        { Header: 'Deskripsi Kerusakan', accessor: 'deskripsi' },
        { Header: 'Status', accessor: 'kon' },
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
            <input type="text" placeholder="Search..." className='search-field-main' onChange={(e) => fetchLaporanData(e.target.value)} />
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
        {activeTab === 'tab1' && <DataTable columns={columns1} data={laporanData} />}
        {activeTab === 'tab2' && <DataTable columns={columns1} data={[]} />}
        </div>
    );
}