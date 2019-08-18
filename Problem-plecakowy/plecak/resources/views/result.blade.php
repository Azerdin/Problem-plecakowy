@extends('layout')

@section('content')
                <h1>Pamiec HM po przekształceniach</h1>
                <table>
                
                <tr>
                @for($j = 0; $j < $hms+1; $j++)
                    <td> </td>
                @endfor
                <td> Suma </td>
                </tr>
                @for($i = 0; $i < $iloscProduktow; $i++)
                <tr>
                    <td>
                    id
                    </td>
                    @for($j = 0; $j < $hms; $j++)
                        <td>
                        
                        {{$id[$i][$j]}}
                        </td>
                    @endfor
                    </tr>

                    <tr>
                    <td>
                    Waga
                    </td>
                    @for($j = 0; $j < $hms+1; $j++)
                        <td>
                        
                        {{$waga[$i][$j]}}
                        </td>
                    @endfor
                    </tr>
                    <tr>

                    <td>
                    Wartosc
                    </td>
                    @for($j = 0; $j < $hms+1; $j++)
                        <td>
                        
                        {{$wartosc[$i][$j]}}
                        </td>
                    @endfor
                    </tr>
                    <tr>
                    <td>
                    Nazwa
                    </td>
                    @for($j = 0; $j < $hms; $j++)
                        <td>
                        
                        {{$nazwa[$i][$j]}}
                        </td>
                    @endfor
                    </tr>
                @endfor
                </table>
                <div class="kurier">
                    Imie i nazwisko: <b> {{$kurier->imie}} {{$kurier->nazwisko}} </b> <br/>
                    Numer telefonu: <b> {{$kurier->nr_tel}} </b> <br/>
                    Ulica: <b> {{$kurier->adres->ulica}} {{$kurier->adres->numer}} {{$kurier->adres->miasto}} {{$kurier->adres->kod_pocztowy}} </b> <br/>
                    Auto
                    Nr. rejestracyjny: <b>{{$kurier->auto->nr_rej}}</b> <br/>
                    Pojemnosc: <b> {{ $kurier->auto->pojemnosc}} kg</b> <br/>
                </div>
                <h1>Najlepszy wynik</h1>
                @if($indeks != -1)
                <table>
                <tr>
                @for($j = 0; $j < $hms+1; $j++)
                    <td> </td>
                @endfor
                <td> Suma </td>
                </tr>
                    <tr>
                    <td>
                    Wartosc
                    </td>
                    @for($j = 0; $j < $hms+1; $j++)
                        <td>
                        
                        {{$wartosc[$indeks][$j]}}
                        </td>
                    @endfor

                    </tr>
                    <tr>
                    <td>
                    Waga
                    </td>
                    @for($j = 0; $j < $hms+1; $j++)
                        <td>
                        
                        {{$waga[$indeks][$j]}}
                        </td>
                    @endfor

                    </tr>
                    <tr>
                    <td>
                    Nazwa
                    </td>
                    @for($j = 0; $j < $hms; $j++)
                        <td>
                        
                        {{$nazwa[$indeks][$j]}}
                        </td>
                    @endfor

                    </tr>

                </table>
                @else
                <h5> Program nie zanalazł rozwiązania </h5>
                @endif
            </div>
@endsection
