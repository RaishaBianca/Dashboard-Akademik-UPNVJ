import React, { useState } from 'react';
import DataTable from "../partials/Table";

const columns1 = [
  { Header: 'Column 1', accessor: 'col1' },
  { Header: 'Column 2', accessor: 'col2' },
];

const data1 = [
  { col1: 'Hello', col2: 'World' },
  { col1: 'react-table', col2: 'rocks' },
  { col1: 'whatever', col2: 'you want' },
];

const columns2 = [
  { Header: 'Column A', accessor: 'colA' },
  { Header: 'Column B', accessor: 'colB' },
];

const data2 = [
  { colA: 'Foo', colB: 'Bar' },
  { colA: 'Baz', colB: 'Qux' },
  { colA: 'Lorem', colB: 'Ipsum' },
];

export default function Konfirmasi() {
  const [activeTab, setActiveTab] = useState('tab1');

  const handleTabChange = (tab) => {
    setActiveTab(tab);
  };

  return (
    <div className="main">
      <h1 className="title">Daftar Konfirmasi</h1>
      <div className="tabs">
        <button onClick={() => handleTabChange('tab1')}>Tab 1</button>
        <button onClick={() => handleTabChange('tab2')}>Tab 2</button>
      </div>
      <div className="tab-content">
        {activeTab === 'tab1' && <DataTable columns={columns1} data={data1} />}
        {activeTab === 'tab2' && <DataTable columns={columns2} data={data2} />}
      </div>
    </div>
  );
}