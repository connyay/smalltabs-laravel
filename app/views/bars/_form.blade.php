@if($dd = SmallTabs::neighborhoodDropDown()) @endif

{{ Form::label('name', "Name") }}
{{ Form::text('name', Input::old('name'), array('autofocus' => 'autofocus')) }}

{{ Form::label('slug', "Slug") }}
{{ Form::text('slug', Input::old('slug'), array('placeholder' => 'Will be generated if blank')) }}

{{ Form::label('address', "Address") }}
{{ Form::text('address', Input::old('address')) }}

{{ Form::label('phonenumber', "Phone") }}
{{ Form::text('phonenumber', Input::old('phonenumber')) }}

{{ Form::label('website', "Website") }}
{{ Form::text('website', Input::old('website')) }}

{{ Form::label('facebook', "Facebook") }}
{{ Form::text('facebook', Input::old('facebook')) }}

{{ Form::label('twitter', "Twitter") }}
{{ Form::text('twitter', Input::old('twitter')) }}

{{ Form::label('yelp', "Yelp") }}
{{ Form::text('yelp', Input::old('yelp')) }}

{{ Form::select('neighborhood_id', $dd, Input::old('neighborhood_id')) }}

<br><br>
{{ Form::submit('Save', array('class'=>'button expand')) }}
