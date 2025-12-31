import './App.css'
import {BrowserRouter , Routes, Route} from 'react-router-dom';
import { Login } from './pages/Login';
import { Register } from './pages/Register';
import Home from './pages/Home';
import { Navbar } from './components/Navbar';

function App() {
  
  return (

    <BrowserRouter>
    <Navbar/>
    <Routes>
      <Route path='/Home' element={<Home/>}/>
      <Route path='/Login' element={<Login/>}/>
      <Route path='/Register' element={<Register/>}/>
    </Routes>
    </BrowserRouter>
  )
}

export default App
