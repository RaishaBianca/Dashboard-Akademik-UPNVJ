import {
  List,
  Card,
  ListItem,
  Typography,
  ListItemPrefix,
} from "@material-tailwind/react";

import {
  ChatBubbleLeftEllipsisIcon,
  HomeIcon,
  ChartBarIcon,
  ClipboardDocumentCheckIcon,
  CalendarDaysIcon,
  ExclamationCircleIcon,
} from "@heroicons/react/24/solid";
import {
  ArrowLeftStartOnRectangleIcon,
} from "@heroicons/react/24/outline";
import { Link } from "@inertiajs/react";

export default function Sidebar() {

  const LIST_ITEM_STYLES = "select-none hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-100 hover:text-gray-900 focus:text-gray-900 active:text-gray-900 data-[selected=true]:text-gray-900";

  return (
    <Card className="min-h-screen w-full max-w-[20rem] p-6 rounded-none shadow-none">
      <div className="mb-2 flex flex-col justify-center p-4">
        <Typography color="blue-gray" className="text-lg font-bold text-center">
          Layanan Akademik
        </Typography>
        <Typography color="blue-gray" className="text-sm font-medium text-gray-500 text-center">
        UPN Veteran Jakarta
        </Typography>
      </div>
      <hr className="my-2 border-gray-200" />
      <List>
        <Link href={route('dashboard')}>
          <ListItem className={LIST_ITEM_STYLES}>
            <ListItemPrefix>
              <HomeIcon className="h-5 w-5" />
            </ListItemPrefix>
            Dashboard
          </ListItem>
        </Link>
        <ListItem className={LIST_ITEM_STYLES}>
          <ListItemPrefix>
            <ChartBarIcon className="h-5 w-5" />
          </ListItemPrefix>
          Stat Peminjaman
        </ListItem>
        <Link href={route('daftar-konfirmasi.index')}>
          <ListItem className={LIST_ITEM_STYLES}>
            <ListItemPrefix>
              <ClipboardDocumentCheckIcon className="h-5 w-5" />
            </ListItemPrefix>
            Daftar Konfirmasi
          </ListItem>
        </Link>
        <ListItem className={LIST_ITEM_STYLES}>
          <ListItemPrefix>
            <CalendarDaysIcon className="h-5 w-5" />
          </ListItemPrefix>
          Jadwal Pemakaian
        </ListItem>
        <ListItem className={LIST_ITEM_STYLES}>
          <ListItemPrefix>
            <ExclamationCircleIcon className="h-5 w-5" />
          </ListItemPrefix>
          Pelaporan Kendala
        </ListItem>
      </List>
      <hr className="my-2 border-gray-200" />
      <List>
        <ListItem className={LIST_ITEM_STYLES}>
          <ListItemPrefix>
            <ChatBubbleLeftEllipsisIcon className="h-5 w-5" />
          </ListItemPrefix>
          Help & Support
        </ListItem>
        <ListItem className={LIST_ITEM_STYLES}>
          <ListItemPrefix>
            <ArrowLeftStartOnRectangleIcon
              strokeWidth={2.5}
              className="h-5 w-5"
            />
          </ListItemPrefix>
          Sign Out
        </ListItem>
      </List>
    </Card>
  )
}