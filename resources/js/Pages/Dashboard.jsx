import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, usePage } from '@inertiajs/react';

export default function Dashboard({ totalPeminjamanLab, totalKendalaLab }) {
    const user = usePage().props.auth.user;

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="">
                <div className="mx-auto max-w-7xl">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            Selamat datang <span className='font-semibold'>{user.nama}!</span>
                        </div>
                    </div>
                </div>

                <div className='grid grid-cols-4 gap-12 mt-8'>
                    <div className="overflow-hidden bg-white shadow rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-sm font-normal">Total Peminjaman Lab</h3>
                            <p className="text-2xl font-semibold mt-6">{totalPeminjamanLab}</p>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-sm font-normal">Total Pelaporan Kendala Lab</h3>
                            <p className="text-2xl font-semibold mt-6">{totalKendalaLab}</p>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
