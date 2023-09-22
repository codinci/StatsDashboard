import { Line } from "react-chartjs-2";
const LineChart = ({ chartData }) => {
  return (
    <div className="chart-container"  style={{width: 320}}>
      <h2 style={{ textAlign: "center" }}>Line Chart</h2>
      <Line
        data={chartData}
        options={{
          plugins: {
            title: {
              display: true,
              text: "Users Gained between 2016-2020"
            },
            legend: {
              display: false
            }
          }
        }}
      />
    </div>
  );
}
export default LineChart;