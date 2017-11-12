<html>
	<head>
		<title>Traventure</title>
	</head>
	
  <body>
  	<h1>List of Names</h1>
  	<ol>
  		@foreach ($names as $name)
	      <li>{{ $name }}</li>
	    @endforeach
  	</ol>
  	<ul>
  		@foreach ($names as $name)
	      <li>{{ $name }}</li>
	    @endforeach
  	</ul>
  </body>
</html>