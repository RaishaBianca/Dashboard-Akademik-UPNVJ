// resources/js/Layouts/Main.jsx
import React from 'react';
import Sidebar from '../Partial/Sidebar'; // Adjust the import path as needed

const Main = ({ children }) => {
  return (
    <div className="layout">
      <Sidebar />
      <div className="content">
        {children}
      </div>
    </div>
  );
};

export default Main;