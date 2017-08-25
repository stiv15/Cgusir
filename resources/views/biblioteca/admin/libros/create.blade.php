@extends('template.biblioteca')
@extends('template.menuBiblioteca')
@extends('template.mensajeValidacionErrores')

@section('tituloFormulario','Registro Recursos Bibliográficos')

@section('contenidoFormulario')
	
	
	{!! Form::open(['route'=>'libros.store','method'=> 'POST']) !!}


		<div class="form-group">
			{!! Form::label('titulo','Título') !!}
			{!! Form::text('titulo',null,
				['class'=>'form-control',
				 'placeholder'=>'Título o Nombre Recurso',
				 'maxlength'=>'255',
				 'minlength'=>'5',
				 'required'
				 ])!!}	
		</div>

		@php
		for ($i = date('Y'); $i >=1900; $i--){
    		 $anios[$i] = $i;
			}
		@endphp	
	

		<div class="form-group">
			{!! Form::label('anio','Año') !!}
			{!! Form::select('anio',
				$anios,		
				NULL,
				 [
				 'class'=>'form-control',
				 'placeholder'=>'',
				 'required'
				 ]			 
				 )!!}	
		</div>

		
		<div class="form-group">
			{!! Form::label('tipo','Tipo de Recurso') !!}
			{!! Form::select('tipo',
				['libro'=>'Libro',
				 'fotocopia'=>'Fotocopia',
				 ],'libro',
				 [
				 'class'=>'form-control',
				 'required'
				 ]
				 )!!}	
		</div>

		<div class="form-group">
			{!! Form::label('isbn','Código ISBN') !!}
			{!! Form::text('isbn',null,
				['class'=>'form-control',
				 'placeholder'=>'Código(tipo libro),Caracteres Númericos',
				 'pattern'=>'[0-9]+',
				 'maxlength'=>'13',
				 'minlength'=>'10'
				 ])!!}	
		</div>

		<div class="form-group">
			{!! Form::label('numero_edicion','Número de Edición') !!}
			{!! Form::number('numero_edicion',null,
				['class'=>'form-control',
				 'placeholder'=>'Número Edición Recurso',
				 'step'=>'Any',
				 'max'=>'50',
				 'min'=>'1',
				 ])!!}	
		</div>


		<div class="form-group">
			{!! Form::label('editorial','Editorial') !!}
			{!! Form::text('editorial',null,
				['class'=>'form-control',
				 'placeholder'=>'Editorial del Recurso',
				 'maxlength'=>'255',
				 'minlength'=>'4',
				 ])!!}	
		</div>


		<div class="form-group">
			{!! Form::label('autores','Autores') !!}
			{!! Form::select('autores[]',
				$autores,		
				NULL,
				 [
				 'class'=>'form-control select2Autores',
				 'multiple'=>'multiple',
				 'required'
				 ]			 
				 )!!}	
		</div>


		<div class="form-group">
			{!! Form::label('areas','Áreas Conocimiento') !!}
			{!! Form::select('areas[]',
				$areas,		
				NULL,
				 [
				 'class'=>'form-control select2Areas',
				 'multiple'=>'multiple',
				 'required'
				 ]			 
				 )!!}	
		</div>


		<div class="form-group centrado">
			{!! Form::submit('Registrar',
				['class'=>'btn btn-default'])
			 !!}
		</div>

	{!! Form::close() !!}

@endsection


@section('cssOpcional')
{{ Html::style('plugins/select2/css/select2.min.css') }}
{{ Html::style('plugins/select2/css/select2-bootstrap.min.css') }}
@endsection


@section('javascriptOpcional')
{{ Html::script('plugins/select2/js/select2.min.js') }}
{{ Html::script('plugins/select2/js/i18n/es.js') }}
{{ Html::script('js/estandarizacionNombre.js') }}
{{ Html::script('js/libros.js') }}
@endsection


