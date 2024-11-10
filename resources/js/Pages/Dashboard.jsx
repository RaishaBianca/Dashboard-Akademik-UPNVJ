import SimpleLineChart from "../Partial/Chart";
import CustomDatePicker from "../Partial/CustomDatePicker";
import Notifs from "../Partial/Notifs";
import Main from "../Layouts/Main"; 
import { useState, useEffect } from 'react';

function Dashboard() {
    const [statData, setStatData] = useState([]);
    
    useEffect(() => {
        console.log('Effect running'); // Add this line
        fetchStatData();
        return () => {
            console.log('Effect cleanup'); // Add this line
        }
    }, []);

    const fetchStatData = async () => {
        try {
            const response = await fetch(`/data-stat`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            setStatData(data);
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    return (
            <div className="main">
                <div className="dash-head">
                    <h1 className="title">Dashboard</h1>
                    <div className="date-picker">
                        <CustomDatePicker />
                        <span>-</span>
                        <CustomDatePicker />
                    </div>
                </div>
                <div className="angka-total">
                    <div className="angka-total-item">
                        <h2>Total Peminjaman Lab</h2>
                        <div className="display">
                            <p>{statData['total_peminjaman']}</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                    <div className="angka-total-item">
                        <h2>Total Pelaporan Kendala Lab</h2>
                        <div className="display">
                            <p>{statData['total_kendala']}</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                    <div className="angka-total-item">
                        <h2>Total Pelaporan Kendala Kelas</h2>
                        <div className="display">
                            <p>{statData['total_kendala']}</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                    <div className="angka-total-item">
                        <h2>Total Pelaporan Kendala Kelas</h2>
                        <div className="display">
                            <p>{statData['total_kendala']}</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                </div>
                <SimpleLineChart/>
            </div>
    );
}

Dashboard.layout = page => <Main children={page} />

export default Dashboard;