import React, { useState } from 'react';
import styled from 'styled-components';

const Timetable =({columns, data}) => {
    return (
        <StyledWrapper>
            <table className=''>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                    </tr>
                </thead>
                <tbody>
                    {Array.from({ length: 11 }, (_, i, j) => 
                    (
                        <tr key={i}>
                            <td>{(i + 7) < 10 ? '0' : ''}{i + 7}:{j === 0 ? '00' : '00'}</td>
                            <td>
                            </td>
                            <td className='filled'>
                                <div>
                                    <p>John Doe</p>
                                    <p>IF-42-01</p>
                                </div>
                            </td>
                            <td className='filled'>
                                <div >
                                    <p>John Doe</p>
                                    <p>IF-42-01</p>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </StyledWrapper>
  );
};

const StyledWrapper = styled.div`
    table {
        width: 100%;
        border-collapse: collapse;
        margin-block: 20px;
    }
    th {
        color: #fff;
        font-size: 0.8rem;
        font-weight: 600;
        background-color: var(--secondary);
        border: 1px solid #ddd;
        padding: 8px;
    }
    td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .filled {
        background-color: var(--light);
        border: 1px solid #ddd;
    }
`;

export default Timetable;
