import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import Calendar from "./Partials/Calendar";

export default function Index({ jadwalPemakaian }) {
  return (
    <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Jadwal Pemakaian
                </h2>
            }
        >
        <Head  title="Jadwal Pemakaian" />

        <div className="bg-white p-6 rounded-lg">
          <Calendar events={jadwalPemakaian}/>
        </div>
      </AuthenticatedLayout>
  )
}