import Dashboard from "./components/Dashboard"
import Layout from "./components/Layout"
import Login from "./components/Login"
import { Routes, Route } from "react-router-dom"

import 'bootstrap/dist/css/bootstrap.min.css';

const App = () => {
  return (
    <Routes>
      <Route path="/" element={<Layout />}>
        <Route path="dashboard" element={<Dashboard />} />
        <Route path="login" element={<Login/>}/>
      </Route>
   </Routes>
  )
}

export default App
