import Dashboard from "./admin/Dashboard";
import ShowUsers from "./admin/showUsers";
import Posts from "./admin/Posts";
import AddUser from "./admin/AddUser";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
 import Register  from "./pages/Login/Register";
import  Login  from "./pages/Login/login";
import { Home } from "./pages/Home";
import { createContext, useState } from 'react';
import Comments from "./admin/Comments";

 const userContext = createContext();
 
function App() {

  const [userData, setUserData] = useState([]);

  return (
    <div >
     
     <userContext.Provider value={{ userData, setUserData }}>
    <Router>


      <Routes>
        <Route exact path="/dashboard" element={<Dashboard />} />
        <Route exact path="/register" element={<Register />} />
        <Route exact path="/Users" element={<ShowUsers/>} />
        <Route exact path="/addUser" element={<AddUser/>} />
        <Route exact path="/comments" element={<Comments/>} />
        <Route exact path="/Posts" element={<Posts/>} />
        <Route exact path="/login" element={<Login/>} />
        <Route exact path="/" element={<Home />} />

      </Routes>



    </Router>

    </userContext.Provider>
    </div>
  );
};

export default App;
