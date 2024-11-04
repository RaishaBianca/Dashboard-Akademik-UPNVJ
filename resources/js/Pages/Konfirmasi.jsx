import React, { useState, useEffect } from 'react';
import Tabs from '../Partial/Tabs';
import DataTable from '../Partial/Table';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch, faFilter } from '@fortawesome/free-solid-svg-icons';

export default function Konfirmasi() {
    const [activeTab, setActiveTab] = useState('tab1');
    const [peminjamanData, setPeminjamanData] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetchPeminjamanData();
    }, []);

    const fetchPeminjamanData = async () => {
        try {
            const response = await fetch('/data-peminjaman');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            const formattedData = data.map(item => ({
                id: item.id,
                tanggal: item.tanggal,
                nama: item.nama,
                nim: item.nim,
                lab: item.lab,
                ket: item.keterangan,
                kon: item.status
            }));
            setPeminjamanData(formattedData);
        } catch (error) {
            console.error('Error fetching data:', error);
            setError('Failed to load data');
        } finally {
            setIsLoading(false);
        }
    };

      const columns1 = [
      { Header: 'Tanggal', accessor: 'tanggal' },
      { Header: 'Nama', accessor: 'nama' },
      { Header: 'NIM', accessor: 'nim' },
      { Header: 'Lab', accessor: 'lab' },
      { Header: 'Keterangan', accessor: 'ket' },
      { Header: 'Konfirmasi', accessor: 'kon' }
    ];

    const tabs = [
        { id: 'tab1', label: 'Peminjaman Lab' },
        { id: 'tab2', label: 'Peminjaman Kelas' }
    ];

    if (isLoading) return <div>Loading...</div>;
    if (error) return <div>Error: {error}</div>;

    return (
        <div className="main">
            <h1 className="title">Daftar Konfirmasi</h1>
            <div className='konfirm-header'>
                <Tabs tabs={tabs} onTabChange={setActiveTab} />
                <div className='find-filter'>
                    <div className='search-main'>
                        <input type="text" placeholder="Search..." className='search-field-main' />
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
            {activeTab === 'tab1' && <DataTable columns={columns1} data={peminjamanData} />}
            {activeTab === 'tab2' && <DataTable columns={columns1} data={[]} />}
        </div>
    );
}