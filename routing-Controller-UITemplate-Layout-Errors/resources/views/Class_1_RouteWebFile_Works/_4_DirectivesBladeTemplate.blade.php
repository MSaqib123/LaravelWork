<!-- _______________ 1 _____________ -->
<h1>________1. Blade Template________</h1>

<p>jub hum koi value  bakend sa  front pa show krni hot hum PHP ka tag bar bar nhin kholain ga</p>
<p>we will use   <b>php  Blade Template Engin</b> </p>
<b>backend : {{$value}}</b>
<br><br>

<!-- _______________ 2 _____________ -->
<h1>________2. Directive_________</h1>
<p>in Laravel  @  is directve  like  .net</p>
<p>its provide  php functionality in html without opning PHP tag</p>
<p>Direct open & close krta han </p>
<p>Syntax <br>
    &#64;if() <br>
    &#64;endif</p>

<h3>List of Directives </h3>
<ul>
    <li>php</li>
    <li>If</li>
    <li>foreach</li>
    <li>for</li>
    <li>while</li>
    <li>switch</li>
    <li>include</li>
    <li>extends</li>
    <li>section , yield</li>
    <li>auth , guest</li>
    <li>can , cannot</li>
    <li>isset ,empty</li>
    <li>stack, push</li>
    <li>component</li>
    <li>error</li>
    <li>csrf</li>
</u>

<h3>Exemple (for,  directive)</h3>

@for($i = 0; $i < 10; $i++)
    <p>Pakistan Zinbad</p>
@endfor


<h3>Exemple (if,  directive)</h3>

@if(1 == 1)
    <p>True</p>
@endif

@if(1 == 1)
    <p>True</p>

    @else
    <p>false</p>
@endif



<h3>Exemple (php and foreach,  directive)</h3>
@php
 $array = ['ali' , 'noman' , 'Billal' , 'Ahmad' , 'Ahtesham'];
@endphp

@foreach ($array as $item)
    <p>{{$item}}</p>
@endforeach