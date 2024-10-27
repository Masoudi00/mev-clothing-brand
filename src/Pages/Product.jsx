import React from 'react';

function Product() {
  return (
    <>
      <section className="py-5">
        <div className="container px-4 px-lg-5 my-5">
          <div className="row gx-4 gx-lg-5 align-items-center">
            <div className="col-md-6">
              <div id="myCarousel" className="carousel slide" data-bs-ride="carousel">
                <div className="carousel-inner">
                  <div className="carousel-item active">
                    <img src="path_to_your_image1.jpg" className="card-img-top mb-5 mb-md-0" alt="Image 1" />
                  </div>
                  <div className="carousel-item">
                    <img src="path_to_your_image2.jpg" className="card-img-top mb-5 mb-md-0" alt="Image 2" />
                  </div>
                </div>
                <button className="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                  <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span className="visually-hidden">Previous</span>
                </button>
                <button className="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                  <span className="carousel-control-next-icon" aria-hidden="true"></span>
                  <span className="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div className="col-md-6">
              <form action="Cart.php" method="GET">
                <div className="small mb-1">SKU:</div>
                <h1 className="display-5 fw-bolder"></h1>
                <div className="fs-5 mb-5">
                  <span className="text-secondary"></span>
                </div>
                <button className="btn btn-outline-dark flex-shrink-0" type="submit">
                  <i className="bi-cart-fill me-1"></i>
                  Add to Cart
                </button>
                <input type="hidden" name="Reference" value="" />
              </form>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default Product;
