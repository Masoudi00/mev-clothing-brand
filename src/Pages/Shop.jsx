import React, { useState } from 'react';
import product from '../data/product';
import { useDispatch } from 'react-redux';
import { addToCart } from '../redux/cartSlice';

function Shop() {
  const dispatch = useDispatch();
  const [quantities, setQuantities] = useState(product.reduce((acc, item) => ({ ...acc, [item.id]: 1 }), {}));

  const handleQuantityChange = (id, value) => {
    setQuantities(prev => ({ ...prev, [id]: Number(value) }));
  };

  const handleAddToCart = (item) => {
    // Ensure we're sending the item with its quantity
    dispatch(addToCart({ ...item, quantity: quantities[item.id] }));
  };

  return (
    <div>
      <div className="row justify-content-center mt-5">
        {product.map((item) => (
          <div className="card col-4 m-4" style={{ width: '18rem' }} key={item.id}>
            <img src={process.env.PUBLIC_URL + `/images/${item.img}.png`} className="card-img-top" alt={item.name} />
            <div className="card-body">
              <h5 className="card-title">{item.title}</h5>
              <p className="card-text">{item.description}</p>
              <p className="card-text">{item.price}MAD</p>
              <label htmlFor={`qte-${item.id}`}>Qte:</label>
              <input
                type="number"
                name={`qte-${item.id}`}
                className="form-control mb-2"
                value={quantities[item.id]}
                onChange={(e) => handleQuantityChange(item.id, e.target.value)}
              />
              <button onClick={() => handleAddToCart(item)} className="btn btn-primary">Add To Cart</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default Shop;
