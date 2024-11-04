import React, { useState, useRef, useEffect } from 'react';
import styled from 'styled-components';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCircleUser, faGear, faSearch, faChartColumn, faListCheck, faCalendarAlt, faCircleExclamation } from '@fortawesome/free-solid-svg-icons';
import { Link, usePage } from '@inertiajs/react';

const Sidebar = () => {
  const [isUserActionVisible, setIsUserActionVisible] = useState(false);
  const userActionRef = useRef(null);
  const userIconRef = useRef(null);
  const { url, component } = usePage()

  const toggleUserAction = () => {
    setIsUserActionVisible(!isUserActionVisible);
  };

  const handleClickOutside = (event) => {
    if (
      userActionRef.current &&
      !userActionRef.current.contains(event.target) &&
      !userIconRef.current.contains(event.target)
    ) {
      setIsUserActionVisible(false);
    }
  };

  useEffect(() => {
    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, []);

  return (
    <StyledWrapper>
      <div className="sidebar">
        <div className="sidebar-header">
          <h3 className='title'>Layanan Akademik</h3>
          <h4>UPN Veteran Jakarta</h4>
        </div>
        <div className='conf-opt'>
          <div className='user-opt' ref={userIconRef} onClick={toggleUserAction}>
            <FontAwesomeIcon icon={faCircleUser} className='icon' />
            <div ref={userActionRef} className='user-action' style={{ display: isUserActionVisible ? 'flex' : 'none' }}>
              <Link href="">
                <h4>User</h4>
              </Link>
              <Link href="">
                <h4>Log Out</h4>
              </Link>
            </div>
          </div>
          <FontAwesomeIcon icon={faGear} className='icon' />
        </div>
        <div className='search'>
          <div className='search-container'>
            <FontAwesomeIcon icon={faSearch} className='search-icon' />
            <input type="text" placeholder="Search..." className='search-field' />
          </div>
        </div>
        <ul className="sidebar-list">
          <li className={`sidebar-list-item ${url === '/dashboard' ? 'active' : ''}`}>
            <Link href="/dashboard" className="sidebar-link">
              <FontAwesomeIcon icon={faChartColumn} className="menu-icon" />
              <span>Stat Peminjaman</span>
            </Link>
          </li>
          <li className={`sidebar-list-item ${url === '/daftar-konfirmasi' ? 'active' : ''}`}>
            <Link href="/daftar-konfirmasi" className="sidebar-link">
              <FontAwesomeIcon icon={faListCheck} className="menu-icon" />
              <span>Daftar Konfirmasi</span>
            </Link>
          </li>
          <li className={`sidebar-list-item ${url === '/jadwal-pemakaian' ? 'active' : ''}`}>
            <Link href="/jadwal-pemakaian" className="sidebar-link">
              <FontAwesomeIcon icon={faCalendarAlt} className="menu-icon" />
              <span>Jadwal Pemakaian</span>
            </Link>
          </li>
          <li className={`sidebar-list-item ${url === '/lapor-kendala' ? 'active' : ''}`}>
            <Link href="/lapor-kendala" className="sidebar-link">
              <FontAwesomeIcon icon={faCircleExclamation} className="menu-icon" />
              <span>Pelaporan Kendala</span>
            </Link>
          </li>
        </ul>
      </div>
    </StyledWrapper>
  );
};

const StyledWrapper = styled.div`
  .sidebar {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    width: 250px;
    height: 100%;
    background-color: var(--light);
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 30px;
  }

  .sidebar-header {
    color: var(--darkgrey);
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    justify-content: center;
    align-items: center;
    height: 5rem;
  }

  .sidebar-header .title {
    font-size: 1rem;
    color: var(--darkgrey);
  }

  .sidebar-list {
    list-style: none;
    padding: 0;
  }

  .sidebar-list-item {
    border-bottom: 1px solid var(--lightgrey);
  }

  .sidebar-link {
    color: var(--darkgrey);
    display: flex;
    align-items: center;
    text-decoration: none;
    gap: 10px;
    font-size: 0.9rem;
    padding: 1rem;
    font-weight: 500;
    transition: background-color 0.4s linear;
  }

  .sidebar-link:hover {
    background-color: var(--lightgrey);
  }

  .sidebar-link i {
    margin-right: 10px;
  }

  .sidebar-link.active {
    background-color: var(--lightgrey);
  }

  .icon {
    font-size: 1.5rem;
    color: var(--darkgrey);
  }

  .icon[data-icon="circle-user"] {
    color: var (--grey);
  }

  .conf-opt {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
  }

  .search {
    display: flex;
    align-items: center;
    padding: 0 1rem;
    width: 11rem;
    margin-block: 1.5rem;
  }

  .search-container {
    position: relative;
    width: 100%;
  }

  .search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    font-size: 1rem;
    color: var(--darkgrey);
    transition: opacity 0.3s ease;
  }

  .search-field {
    background-color: var(--lightgrey);
    width: 100%;
    padding: 0.5rem 0.5rem 0.5rem 2rem;
    border: none;
    font-size: 0.9rem;
    color: var(--darkgrey);
    border-bottom: 2px solid transparent;
    transition: border-bottom 0.3s ease;
  }

  .search-field:focus {
    outline: none;
    border-bottom: 2px solid var(--darkgrey);
  }

  .user-opt {
    position: relative;
    cursor: pointer;
  }

  .user-action {
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border: 1px solid var(--grey);
    border-radius: 0.5rem;
    font-size: 0.8rem;
    flex-direction: column;
    position: absolute;
    background-color: var(--light);
    z-index: 1;
  }

  .user-action h4 {
    width: 100px;
    padding: 0.5rem;
  }

  .user-action h4:hover {
    background-color: var(--grey);
  }

  a {
    text-decoration: none;
    color: var(--darkgrey);
  }

  .menu-icon {
    font-size: 1rem;
    color: var(--darkgrey);
  }

  .sidebar-list-item.active .sidebar-link {
    background-color: var(--lightgrey);
  }
`;

export default Sidebar;