import './App.css';
import { Routes, Route } from 'react-router-dom';

import Home from './Pages/Home';
import Shop from './Pages/Shop';
import Product from './Pages/Product';
import Cart from './Pages/Cart';
import Success from './Pages/Success';
import Navbar from './Components/Navbar';

function App() {
  return (
  <>

<Navbar/>

     <Routes>
      
        <Route path='/' element={<Home/>}/>
        <Route path='/shop' element={<Shop/>}/>
        <Route path='/product' element={<Product/>}/>
        <Route path='/cart' element={<Cart/>}/>
        <Route path='/success' element={<Success/>}/>

     </Routes>
  
  </>
  );
}

export default App;
