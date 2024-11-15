import * as React from 'react'
import TabsDefault from "@/Components/TabsDefault";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import Table from '@/Components/Table';

export default function Index({ laporanKendala }) {
  console.log(laporanKendala)
  const dataLaporanKendala = laporanKendala.data

  const columnLaporanKendala = React.useMemo(
    () => [
      {
        accessorKey: 'pelapor',
        header: 'Pelapor'
      },
      {
        accessorKey: 'ruangan',
        header: 'Ruangan'
      },
      {
        accessorKey: 'jenisKendala',
        header: 'Jenis Kendala'
      },
      {
        accessorKey: 'bentukKendala',
        header: 'Bentuk Kendala'
      },
      {
        accessorKey: 'deskripsiKerusakan',
        header: 'Deskripsi Kerusakan',
      },
      {
        accessorKey: 'status',
        header: 'Status',
      },
    ],
    []
  )

  const tabs = [
    {
      label: "Kendala Aset Lab",
      value: "kendalaAsetLab",
      desc: <Table allData={dataLaporanKendala} columns={columnLaporanKendala}/>,
    },
    {
      label: "Kendala Aset Kelas",
      value: "kendalaAsetKelas",
      desc: <Table allData={[]} columns={columnLaporanKendala}/>,
    }
  ]

  return (
    <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Pelaporan Kendala
                </h2>
            }
        >
        <Head title="Pelaporan Kendala" />
        <div>
          <div className="">
            <TabsDefault tabs={tabs} active={'kendalaAsetLab'}/>
          </div>
        </div>
    </AuthenticatedLayout>
  )
}