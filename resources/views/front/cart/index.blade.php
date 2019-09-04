@extends('front.layout.master')

@section('main')

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<thead>
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Produit</th>
								<th class="column-3">Prix</th>
								<th class="column-4 p-l-70">Quantité</th>
								<th class="column-5">Total</th>
							</tr>	
						</thead>
						<tbody class="liste-des-commandes">
							<!-- Ato le commandes avy any @jquery -->	
						</tbody>
						
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">				
				<div class="size15 trans-0-4">
					<!-- Button -->
					<!-- <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 modifcommand">
						Modifier la commande
					</button> -->

					<a href="{{ route('front_product') }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						<h6>Modifier la commande</h6>
					</a>
				</div>
			</div>

			
			<!-- Total -->
			<div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24 t-center">
					Total de commande
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Sous-total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Veuillez mettre ici votre nom:
					</span>

					<div class="w-size20 w-full-sm">
						<div class="bo4  size15 m-b-20">
							<input class="sizefull s-text7-1 p-l-22 p-r-22" type="text" name="name_client" placeholder="Mettez ici votre nom">
						</div>						
					</div>
				</div>

				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Veuillez mettre ici le numero de votre table:
					</span>

					<div class="w-size20 w-full-sm">
						<div class="bo4  size15 m-b-20">
							<input class="sizefull s-text7-1 p-l-22 p-r-22" type="number" name="name_client" placeholder="Mettez ici le numero de table">
						</div>						
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Commander
					</button>
				</div>
			</div>							
		</div>
	</section>
@endsection

@section('additional-js')

@endsection