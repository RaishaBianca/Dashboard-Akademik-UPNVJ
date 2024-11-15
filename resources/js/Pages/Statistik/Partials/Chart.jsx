import React from 'react';
import ReactApexChart from 'react-apexcharts';

export function Chart({ label, series}) {
  // const label = label
  const chartOptions = {
    chart: {
      type: 'bar',
      height: 500
    },
    labels: label,
    responsive: [{
      breakpoint: 480,
      options: {
        chart: {
          width: 200
        },
        legend: {
          position: 'bottom'
        }
      }
    }]
  };

  const chartSeries = series

  return (
    <div>
      <ReactApexChart options={chartOptions} series={chartSeries} type="bar" height={500}/>
    </div>
  )
}