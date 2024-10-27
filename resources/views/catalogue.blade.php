


<h2 style='margin-left:165;color:gray'> Liste des Prduits en solde  </h2>
<h5 style='margin-left:115;color:rgb(255, 0, 0)'>THIS PROMO CODE CAN ONLY BE USED ONCE PER ORDER</h1>



<table border='2'  style='margin:auto'>
    <thead>
      <tr>
        <th scope="col">Produit</th>
        <th scope="col">Prix_initial</th>
        <th scope="col">PromoCode</th>
		    <th scope="col">Prix_avec solde</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>

@foreach ($products as $item)
<tr>
    <td>{{$item['name']  }}</td>
    <td>{{$item['price']  }}DH</td>
    <td>CUSTOM12</td>
	<td>{{($item['price'])-10 }}DH</td>
<td><img src="{{ public_path('imgs/'.$item['image']) }}" alt="Image " width="100"></td>

  </tr>

@endforeach


    </tbody>
  </table>

    <div style='padding-top:200'>
      <p style='text-align:center'>Copyright &copy; Mev.</p>
    </div>
