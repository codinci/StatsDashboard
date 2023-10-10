import { Link } from "react-router-dom";
const NavBar = () => {
	return (
		<header className="nav">
			<button className="nav__button"><Link to='/login'>Login</Link></button>
		</header>
	)
}

export default NavBar;