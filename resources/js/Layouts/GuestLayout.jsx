import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import LoginImg from '../../images/login.svg';

export default function GuestLayout({ children }) {
    return (
        <div className='flex'>
            <div className='w-7/12 relative bg-gradient-to-b from-[#00bbe1]  to-[#060160] to-90% flex justify-center items-center'>
                <img src={LoginImg} className='absolute left-0 bottom-0 w-1/3' alt="" />
                <div className='text-white'>
                    <p className='font-semibold text-4xl'>Portal Layanan Akademik</p>
                    <p className='mt-4'>UPN Veteran Jakarta</p>
                </div>
            </div>
            <div className="w-5/12 flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
                <div className="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
                    {children}
                </div>
            </div>
        </div>
    );
}
