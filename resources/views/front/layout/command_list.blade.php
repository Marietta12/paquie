@if($commands)
	<ul class="header-cart-wrapitem">
		@foreach($commands as $command)
		<li class="header-cart-item">
			<div class="header-cart-item-img">
				<img src="{{ url('image/Products/'.$command->photo.'') }}" alt="IMG">
			</div>

			<div class="header-cart-item-txt">
				<a href="#" class="header-cart-item-name">
					{{ $command->name }}
				</a>

				<span class="header-cart-item-info">
					{{ $command->price }}
				</span>
			</div>
		</li>
		@endforeach					
	</ul>
@endif
<div class="header-cart-total" data-total="{{$total}}">
	{{ "Total: $ " . ($total)? $total : 0 }}
</div>