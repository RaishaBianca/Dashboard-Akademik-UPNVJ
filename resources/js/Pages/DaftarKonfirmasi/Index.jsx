import * as React from 'react'
import Table from "@/Components/Table";
import TabsDefault from "@/Components/TabsDefault";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Typography } from "@material-tailwind/react";

export default function Index({ peminjamanRuangan }) {
  console.log(peminjamanRuangan)
  const dataPeminjamanLab = JSON.parse(peminjamanRuangan)

  const columnPeminjamanLab = React.useMemo(
    () => [
      {
        accessorKey: 'tanggal',
        header: 'Tanggal'
      },
      {
        accessorKey: 'nama',
        header: 'Nama'
      },
      {
        accessorKey: 'nim',
        header: 'Nim'
      },
      {
        accessorKey: 'lab',
        header: 'Lab'
      },
      {
        accessorKey: 'keterangan',
        header: 'Keterangan',
      },
      {
        accessorKey: 'konfirmasi',
        header: 'Konfirmasi',
      },
    ],
    []
  )

  const tabs = [
    {
      label: "Peminjaman Lab",
      value: "peminjamanLab",
      desc: <Table allData={dataPeminjamanLab} columns={columnPeminjamanLab}/>,
    },
    {
      label: "Peminjaman Kelas",
      value: "peminjamanKelas",
      desc: <Table allData={[]} columns={columnPeminjamanLab}/>,
    }
  ]
  return (
    <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Daftar Konfirmasi
                </h2>
            }
        >
            <Head title="Daftar Konfirmasi" />
            <div>
              <div className="">
                <TabsDefault tabs={tabs} active={'peminjamanLab'}/>
              </div>
            </div>
        </AuthenticatedLayout>
  );
}