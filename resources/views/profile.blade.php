<!-- Hello {{$title}} </br>
WelcomeBack {{$name}} -->



@if (strlen($name < 7)){
    {{ $name }}
}@else {{'invalid length'}}
@endif
