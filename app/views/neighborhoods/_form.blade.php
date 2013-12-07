
{{ Form::label('name', "Name") }}
{{ Form::text('name', Input::old('name'), array('autofocus' => 'autofocus')) }}

{{ Form::label('note', "Note") }}
{{ Form::textarea('note', Input::old('note')) }}

<br><br>
{{ Form::submit('Save', array('class'=>'button expand')) }}