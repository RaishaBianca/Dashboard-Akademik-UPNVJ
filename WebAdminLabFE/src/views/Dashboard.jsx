import SimpleLineChart from "../partials/Chart";
import CustomDatePicker from "../partials/CustomDatePicker";
import Notifs from "../partials/Notifs";

export default function Dashboard() {
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
                        <h2>Total Peminjaman Laboratorium</h2>
                        <div className="display">
                            <p>100</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                    <div className="angka-total-item">
                        <h2>Total Peminjaman Kelas</h2>
                        <div className="display">
                            <p>100</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                    <div className="angka-total-item">
                        <h2>Total Peminjaman Aset</h2>
                        <div className="display">
                            <p>100</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                    <div className="angka-total-item">
                        <h2>Total Pelaporan Kendala</h2>
                        <div className="display">
                            <p>100</p>
                            <Notifs display='+2%'/>
                        </div>
                    </div>
                </div>
                <SimpleLineChart/>
            </div>
    );
}