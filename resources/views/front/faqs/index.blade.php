@extends('front.layout.master')

@section('main')
    	
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="accordion" id="accordionExample">
			@foreach($faqss as $keys=>$faqs)
			  <div class="card flex-c-m bg1 trans-0-4">
			    <div class="card-header" id="headingOne{{ $keys }}">
			      <h5 class="mb-0">
			        <button class="btn btn-link s-text7" type="button" data-toggle="collapse" data-target="#collapseOne{{ $keys }}" aria-expanded="true" aria-controls="collapseOne">
			          {{ ($faqs) ? $faqs->questions : '' }}
			        </button>
			      </h5>
			    </div>		    
			    <div id="collapseOne{{ $keys }}" class="collapse s-text7" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">
			        {{ ($faqs) ? $faqs->answers : '' }}
			      </div>
			    </div>
			  </div>
		 	 @endforeach  
			</div>
    	</div>        
	</section>
@endsection