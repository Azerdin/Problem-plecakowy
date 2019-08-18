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
                                        <option value = "{{$k->id}}" id = "<div> Numer telefonu: <b>{{$k->nr_tel}}</b> </div> <div> Ulica: <b>{{$k->adres->ulica}} {{$k->adres->nr_budynku}}/{{$k->adres->nr_lokalu}}</b> </div> <div> Miasto: <b>{{$k->adres->miasto}} {{$k->adres->kod_pocztowy}}</b> </div><div>Auto</div><div>Nr. rejestracyjny: <b>{{$k->auto->nr_rej}}</b></div><div>Pojemność: <b>{{$k->auto->pojemnosc}}kg</b></div> "> {{$k->imie}} {{$k->nazwisko}} </option>
                                    @endforeach
                                </select> <br /><br />
                                <input type="text" id = "liczba_paczek" name="liczba_paczek" placeholder="Podaj liczbę paczek" required/> <br /><br />
                                <button type="submit" required>
                                    <img src="{{ asset('szukaj.png')}}"
                                 </button>
                            </form>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('p1.png') }}" />
                        </div>
                        <div class="col">
                            <div class="kurier">
                            </div>
                        <!--@foreach($kurier as $k)
                            <div class = "{{$k->id}}">
                            <div> Imie i nazwisko: <b> {{$k->imie}} {{$k->nazwisko}} </b>
                            <div> Numer telefonu: <b>{{$k->nr_tel}}</b> </div> 
                            <div> Ulica: <b>{{$k->adres->ulica}} {{$k->adres->nr_budynku}}/{{$k->adres->nr_lokalu}}</b> </div> 
                            <div> Miasto: <b>{{$k->adres->miasto}} {{$k->adres->kod_pocztowy}}</b> </div>
                            <div>Auto</div>
                            <div>Nr. rejestracyjny: <b>{{$k->auto->nr_rej}}</b></div>
                            <div>Pojemność: <b>{{$k->auto->pojemnosc}}kg</b></div>
                            </div>
                        @endforeach-->
                        </div>
                    </div>
                </div>
            </div>
@endsection
