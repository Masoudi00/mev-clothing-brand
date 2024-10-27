import React from 'react'
import { Link } from 'react-router-dom'

function Navbar() {
  return (
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <Link as={Link} to="/" class="navbar-brand" href="#">Home</Link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
        <li class="nav-item">
        <Link as={Link} to="/shop" className='text-decoration-none nav-link'>
               Shop
        </Link>
        </li>
        
        <li class="nav-item ">
        <Link as={Link} to="/cart" className='text-decoration-none mx-auto nav-link'>
          Cart
          </Link>
        </li>
       
      </ul>
    </div>
  </div>
</nav>  )
}

export default Navbar