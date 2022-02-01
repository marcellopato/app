<h1>Short URL</h1>
<form action="{{ url('/short/') }}" method="POST">
	@csrf
	<input type="text" name="url" id="url">
	<br>
	<button type="submit">Short URL</button>
</form>
<hr>
@foreach ($tops as $top)
	* {{ $top->url }} <a href="{{ url('/short/' . $top->short) }}" target="_blank"> {{ $top->short}} </a><br>
@endforeach