@extends('adminlte::page')

@section('title', 'FAQs')

@section('content_header')
    @if($faqs)
      <h1>Modification FAQs</h1>
    @else
      <h1>Ajout FAQs</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations FAQs</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($faqs) ? route('faqs.update', ['faqs' => $faqs->id]) : route('faqs.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-faqs','method'=>($faqs) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="questions" class="col-sm-2 control-label">Questions</label>
                    <input type="hidden" name="id" value="{{($faqs) ? $faqs->id : ''}}">
                    <div class="col-sm-9">
                      <input type="text" name="questions" class="form-control" id="questions" placeholder="Questions" value="{{ ($faqs) ? $faqs->questions : '' }}">
                    </div>
                  </div>    
                   <div class="form-group">
                    <label for="answers" class="col-sm-2 control-label">Réponses</label>
                    <input type="hidden" name="id" value="{{($faqs) ? $faqs->id : ''}}">
                    <div class="col-sm-9">
                      <input type="text" name="answers" class="form-control" id="answers" placeholder="Réponses" value="{{ ($faqs) ? $faqs->answers : '' }}">
                    </div>
                  </div>  
                  <div class="form-group">
                    <div class="col-sm-11">
                      <button type="submit" class="btn pull-right  btn-success">Enregistrer</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
    </section>
@stop

@section('js')
  {!! Html::script('js/admin/listFAQs.js') !!}
@stop