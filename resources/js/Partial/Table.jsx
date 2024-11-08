import React from 'react';
import { useTable, useSortBy, usePagination } from 'react-table';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAlignCenter, faEllipsis } from '@fortawesome/free-solid-svg-icons';
import styled from 'styled-components';

const DataTable = ({ columns, data }) => {
  const {
    getTableProps,
    getTableBodyProps,
    headerGroups,
    rows,
    prepareRow,
    page,
    canPreviousPage,
    canNextPage,
    pageOptions,
    pageCount,
    gotoPage,
    nextPage,
    previousPage,
    setPageSize,
    state: { pageIndex, pageSize },
  } = useTable(
    { columns, data },
    useSortBy,
    usePagination
  );

  return (
    <StyledWrapper>
      <table {...getTableProps()} className='table-main'>
        <thead>
          {headerGroups.map(headerGroup => {
            const { key, ...rest } = headerGroup.getHeaderGroupProps();
            return (
              <tr key={key} {...rest}>
                {headerGroup.headers.map(column => {
                  const { key: columnKey, ...columnRest } = column.getHeaderProps(column.getSortByToggleProps());
                  return (
                    <th key={columnKey} {...columnRest}>
                      {column.render('Header')}
                      <span>
                        {column.isSorted
                          ? column.isSortedDesc
                            ? ' 🔽'
                            : ' 🔼'
                          : ''}
                      </span>
                    </th>
                  );
                })}
                <th className='detail-column'></th>
              </tr>
            );
          })}
        </thead>
        <tbody {...getTableBodyProps()}>
          {page.map(row => {
            prepareRow(row);
            const { key, ...rest } = row.getRowProps();
            return (
              <tr key={row.original.id} {...rest}> {/* row.original.id */}
                {row.cells.map(cell => {
                  if (cell.column.id === 'kon') {
                    const { key, ...cellProps } = cell.getCellProps();
                    return (
                      <td key={cell.column.id} {...cellProps} style={{ textAlign: 'center', verticalAlign: 'middle', width: 120 }}>
                        <div className={`status-${cell.value} status`}>{cell.render('Cell')}</div>
                      </td>
                    );
                  }
                  console.log(cell.value);
                  const { key, ...cellProps } = cell.getCellProps();
                  return <td key={cell.column.id} {...cellProps}>{cell.render('Cell')}</td>;
                })}
                <td style={{ textAlign: 'center', verticalAlign: 'middle' }} class="more">
                  <button className='more-button'><FontAwesomeIcon icon={faEllipsis} /></button>
                </td>
              </tr>
            );
          })}
        </tbody>
      </table>
      <div className='paging'>
        <button onClick={() => gotoPage(0)} disabled={!canPreviousPage}>
          {'<<'}
        </button>
        <button onClick={() => previousPage()} disabled={!canPreviousPage}>
          {'<'}
        </button>
        <button onClick={() => nextPage()} disabled={!canNextPage}>
          {'>'}
        </button>
        <button onClick={() => gotoPage(pageCount - 1)} disabled={!canNextPage}>
          {'>>'}
        </button>
        <span>
          Page{' '}
          <strong>
            {pageIndex + 1} of {pageOptions.length}
          </strong>{' '}
        </span>
        <select
          value={pageSize}
          onChange={e => {
            setPageSize(Number(e.target.value));
          }}
        >
          {[10, 20, 30, 40, 50].map(pageSize => (
            <option key={pageSize} value={pageSize}>
              Show {pageSize}
            </option>
          ))}
        </select>
      </div>
      </StyledWrapper>
  );
};

const StyledWrapper = styled.div`
  .table-main {
    font-size: 14px;
    width: 100%;
    border-collapse: collapse;
    margin-block: 20px;
  }

  .table-main th {
    background-color: var(--secondary);
    color: var(--light);
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  .table-main td {
    border: 1px solid var(--lightgrey);
    text-align: left;
    padding: 10px;
    cursor: default;
    white-space: nowrap; 
    overflow: hidden; 
    text-overflow: ellipsis;
    max-width: 200px;
    font-size: 14px;
  }

  .table-main tr:nth-child(even) {
    background-color: var(--light);
  }

  .table-main tr:hover {
    background-color: var(--lightgrey);
  }

  button {
    margin: 5px;
  }

  select {
    margin: 5px;
  }

  .status {
    color: var(--light);
    padding: 0.5rem 0.2rem;
    display:flex;
    justify-content: center;
    align-items: center;
    border-radius: 24px;
    font-size: 12px;
    text-align: center;
    font-weight: 500;
    max-width: 100px;
  }

  .status-new {
    background-color: var(--grey);
    color: var(--dark);
  }
  
  .status-approved {
    background-color: var(--safe);
  }
  
  .status-rejected {
    background-color: var(--alert);
  }

  .status-pending {
    background-color: var(--warning);
  }

  .more-button {
    background-color: transparent;
    color: var(--dark);
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 0.7rem;
    max-width: 50px;
  }

  .paging {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    margin-block: 1rem;
    font-size: 0.8rem;
  }

  .paging button {
    background-color: var(--light);
    border: none;
    cursor: pointer;
    padding: 0.5rem 1rem;
    border-radius: 5px;
  }

  .paging select {
    background-color: var(--light);
    border: none;
    cursor: pointer;
    padding: 0.5rem 1rem;
    border-radius: 5px;
  }
`;


export default DataTable;