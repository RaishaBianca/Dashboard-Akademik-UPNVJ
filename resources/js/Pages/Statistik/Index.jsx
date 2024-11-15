import * as React from 'react'
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router } from "@inertiajs/react";
import { Chart } from "./Partials/Chart";
import { Input } from "@material-tailwind/react";

export default function Index({ dataPeminjaman, dataKendala }) {
  const [filterTanggal, setFilterTanggal] = React.useState('');

  const label = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']
  const series = [{
    name: 'Total Peminjaman',
    data: dataPeminjaman
  }, {
    name: 'Total Kendala',
    data: dataKendala
  }];

  const handleFilterTanggal = (value) => {
    setFilterTanggal(value);

    router.get(
      route(route().current()), {
        minggu: value
      }, {
        preserveState: true,
        replace: true
      }
    )
  }

  return (
    <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Statistik Peminjaman
                </h2>
            }
        >
        <Head  title="Statistik Peminjaman" />

        <div className="bg-white p-6 rounded-lg">
          <div className="flex justify-end">
            <div className="max-w-sm">
              <Input 
                value={filterTanggal}
                onChange={(e) => handleFilterTanggal(e.target.value)}
                type="week" 
                label="Pilih tanggal" 
                />
            </div>
          </div>
          <div className="mt-8">
            <Chart label={label} series={series}/>
          </div>
        </div>
      </AuthenticatedLayout>
  )
}