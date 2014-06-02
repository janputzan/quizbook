<script>
var seconds = null;
var ticker = null;

function startTimer( )
{
    seconds = -1;
    ticker = setInterval("tick( )", 1000);
    tick( );
}

function tick( )
{
    ++seconds;
    var secs = seconds;
    var hrs = Math.floor( secs / 3600 );
    secs %= 3600;
    var mns = Math.floor( secs / 60 );
    secs %= 60;
    var pretty = ( hrs < 10 ? "0" : "" ) + hrs
               + ":" + ( mns < 10 ? "0" : "" ) + mns
               + ":" + ( secs < 10 ? "0" : "" ) + secs;
    document.getElementById("ELAPSED").innerHTML = pretty;
}
</script>
<body onLoad="startTimer( )">
...
The elapsed time is now <span id="ELAPSED"></span>
...


<h1>{{$quiz->title}}</h1>
@foreach($quiz->question as $q)
	<h2>{{$q->question}}</h2>
	@foreach($q->answer as $a)
		<label for="{{$q->id}}[{{$a->id}}]">{{$a->answer}}</label> <input type="radio" value="{{$a->id}}"/>
	@endforeach
@endforeach


</body>