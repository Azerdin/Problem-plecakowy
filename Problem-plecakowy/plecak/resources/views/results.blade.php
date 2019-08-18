@extends('layout')

@section('content')
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form action = "{{ action('PlecakController@algorithm') }}" method="post">
                            {{ csrf_field() }}
                            <h3> Kurier </h3>
                                <select name = "kurier_id">
                                    @foreach($kurier as $k)
                                        <option value = "{{$k->id}}" id = "<div> Numer telefonu: <b>{{$k->nr_tel}}</b> </div>
                                                                           <div> Ulica: <b>{{$k->adres->ulica}} {{$k->adres->nr_budynku}}/{{$k->adres->nr_lokalu}}</b> </div> 
                                                                           <div> Miasto: <b>{{$k->adres->miasto}} {{$k->adres->kod_pocztowy}}</b> </div><div>Auto</div>
                                                                           <div>Nr. rejestracyjny: <b>{{$k->auto->nr_rej}}</b></div><div>Pojemność: <b>{{$k->auto->pojemnosc}}kg</b></div>
                                                                           @foreach($wektor as $w)
                                                                            @if($w->kurier_id == $k->id)
                                                                           <h3>Wynik: </h3>
                                                                            <div>
                                                                                ID: {{$w->id_produkt}} <br />
                                                                                NAZWA: {{$w->nazwa}} <br />
                                                                                WAGA: {{$w->waga}} <br />
                                                                                WARTOSC: {{$w->wartosc}} <br />
                                                                            </div>
                                                                            @endif
                                                                           @endforeach
                                                                           "
                                                                           > {{$k->imie}} {{$k->nazwisko}} </option>
                                    @endforeach
                                </select> <br /><br />
                            </form>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('p1.png') }}" />
                        </div>
                        <div class="col">
                            <div class = "kurier">
                            </div>
                        </div>
                    </div>
                </div>
@endsection
