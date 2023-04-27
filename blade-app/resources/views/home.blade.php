<!DOCTYPE html>
<!-- creo la home con il linguaggio dinamico blade -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
<h1>Home</h1>

<!-- ogni volta che refresho la pagina l'html
cambia l'orario prendendolo dal server, cambia solo il codice che
è blade e non php. I vantiaggi sono riguardo la sicurezza perchè i controlli
if for sono vincolati al formato di blade non puoi inventare

{{date('H:i:s')}}

<?//è euivalente a sopra => php echo date('H:i:s'); ?>-->

<!-- chiamo le varibili dell' home controller -->
{{ $time }} {{ $date }}



{{-- se chiamo delle viste inesistenti da errore {{asdasdasdasd}}
questo è un commento in blade perchè i commenti che lasci in formato
html blade li legge e potrebbe darti errori, i commenti html vengono igno
rati solo dal browser --}}

<div>
    {!! $content !!}
</div>

<!-- facciamo una struttura dati in blade -->
@if($number > 5)
    Il numero è maggiore di 5
@else
    Il numero è minore o uguale di 5
@endif

{{-- facciamo un elenco non numerato con l'array del controller --}}
<ul>
    @foreach($rows as $element)
        <li>{{$element}}</li>
    @endforeach
</ul>

{{-- funzione helper dump and die serve per strutture particolari e aiuta a livello visivo come il
    vardump di php
    @dd($rows)--}}


{{-- metto un link nella viev per cliccare sulal pagina hotels --}}
<a href="/hotels">Vai all'elenco degli hotel</a>
</body>
</html>

