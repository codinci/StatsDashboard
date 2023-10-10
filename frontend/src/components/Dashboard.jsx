import Chart from "chart.js/auto";
import { CategoryScale } from "chart.js";
import { Data } from "../utils/Data";
import PieChart from "./charts/PieChart";
import LineChart from "./charts/LineChart";
import KenyaMap from "./KenyaMap";
import NavBar from "./NavBar";
// import PopulationDensityData from "../utils/PopulationDensityData";

Chart.register(CategoryScale);
const Dashboard = () => {

	const chartData = {
		labels: Data.map((data) => data.year),
		datasets: [
			{
				label: "Users Gained ",
				data: Data.map((data) => data.userGain),
				backgroundColor: [
					"rgba(75,192,192,1)",
					"#ecf0f1",
					"#50AF95",
					"#f3ba2f",
					"#2a71d0"
				],
				borderColor: "black",
				borderWidth: 2
			}
		]
	}



	return (
		<section>
			<NavBar/>
			<h1>Dashboard</h1>
			<div className="charts">
				<PieChart chartData={chartData} />
				<LineChart chartData={chartData} />
			</div>

			<div className="map">
				<KenyaMap/>
			</div>
		</section>
	)
}

export default Dashboard;