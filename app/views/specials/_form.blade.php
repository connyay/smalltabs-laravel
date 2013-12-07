<?php $types = SmallTabs::getTypes();
$days = SmallTabs::getDays();
$bar = null;
$type = null;
$day = null;

if ( !is_null( Input::get( 'type' ) ) ) { $type = array_search( Input::get( 'type' ), $types ); }
if ( !is_null( Input::old( 'type' ) ) ) { $type = Input::old( 'type' ); }

if ( !is_null( Input::get( 'day' ) ) ) { $day = array_search( Input::get( 'day' ), $days ); }
if ( !is_null( Input::old( 'day' ) ) ) { $day = Input::old( 'day' ); }

if ( !is_null( Input::get( 'bar' ) ) ) { $bar = Input::get( 'bar' ); }
if ( !is_null( Input::old( 'bar' ) ) ) { $bar = Input::old( 'bar' ); }

if ( is_null( $bar ) ) {
	$bars = SmallTabs::barDropDown();
}
?>

{{ Form::label('description', "Description") }}
{{ Form::text('description', Input::old('description'), array('autofocus' => 'autofocus')) }}

{{ Form::label('bar', "Bar") }}
@if(!is_null($bar))
{{ Form::text('bar', $bar, array('readonly'=>'true')) }}
@else
{{ Form::select('bar', $bars) }}
@endif

{{ Form::label('type', "Type") }}
{{ Form::select('type', $types, $type) }}

{{ Form::label('day', "Day") }}
{{ Form::select('day', $days, $day) }}

<br><br>
{{ Form::submit('Save', array('class'=>'button expand')) }}
