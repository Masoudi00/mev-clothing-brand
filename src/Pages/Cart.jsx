import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { removeFromCart , updateQuantity} from '../redux/cartSlice';

function Cart() {
  const cartItems = useSelector((state) => state.cart.items); // Retrieve cart items from Redux store
  const dispatch = useDispatch();

  const handleRemoveFromCart = (itemId) => {
    dispatch(removeFromCart(itemId)); // Pass itemId to removeFromCart action creator
  };

  const handleQuantityChange = (id, newQuantity) => {
    dispatch(updateQuantity({ id, quantity: Number(newQuantity) }));
};


  return (
    <section className="h-100" style={{ backgroundColor: '#eee' }}>
      <div className="container h-100 py-5">
        <div className="row d-flex justify-content-center align-items-center h-100">
          <div className="col-10">

            <div className="d-flex justify-content-between align-items-center mb-4">
              <h3 className="fw-normal mb-0 text-black">Shopping Cart</h3>
              <div>
                <p className="mb-0"><span className="text-muted">Sort by:</span> <a href="#!" className="text-body">price <i
                      className="fas fa-angle-down mt-1"></i></a></p>
              </div>
            </div>

            {cartItems.length === 0 ? (
              <p>Your cart is empty.</p>
            ) : (
              cartItems.map((item, index) => (
                <div key={index} className="card rounded-3 mb-4">
                  <div className="card-body p-4">
                    <div className="row d-flex justify-content-between align-items-center">
                      <div className="col-md-2 col-lg-2 col-xl-2">
                        <img src={process.env.PUBLIC_URL + `/images/${item.img}.png`} className="img-fluid rounded-3" alt={item.title} />              
                      </div>
                      <div className="col-md-3 col-lg-3 col-xl-3">
                        <h3 className="lead fw-normal mb-2">{item.title}</h3>
                        <p>{item.description}</p>
                      </div>
                      <div className='col-md-3'>
                                <input 
                                    type="number" 
                                    className="form-control mb-2" 
                                    value={item.quantity}
                                    onChange={(e) => handleQuantityChange(item.id, e.target.value)}
                                />
                            </div>
                      <div className="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button className="btn btn-link px-2" onClick={() => handleRemoveFromCart(item.id)}>
                          <i className="fas fa-trash fa-lg">Remove</i>
                        </button>
                      </div>
                      
                      <div className="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h5 className="mb-0">{item.price}MAD</h5>
                      </div>
                    </div>
                  </div>
                </div>
              ))
            )}

            <div className="card">
              <div className="card-body">
                <button type="button" className="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  );
}

export default Cart;
