import * as React from 'react';
import styled from 'styled-components';
import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import { DatePicker } from '@mui/x-date-pickers/DatePicker';
import dayjs from 'dayjs';

const CustomDatePicker = () => {
  const [selectedDate, setSelectedDate] = React.useState(dayjs());

  return (
    <StyledWrapper>
      <LocalizationProvider dateAdapter={AdapterDayjs}>
        <DatePicker
          className='date'
          label="Select a Date"
          value={selectedDate}
          onChange={(newValue) => setSelectedDate(newValue)}
          renderInput={(params) => <TextField {...params} />}
          format='DD/MM/YYYY'
        />
      </LocalizationProvider>
    </StyledWrapper>
  );
}

const StyledWrapper = styled.div`
  .date {
    width:200px;
  }
`;

export default CustomDatePicker;