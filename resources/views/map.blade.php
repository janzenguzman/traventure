<html>
    <head>
        <script type='text/javascript'>
            var centreGot = false;
        </script>

        
        {!! $map['js'] !!}
    </head>
<body>
    <div class="container">
        <div class="content">
                {!! $map['html'] !!}
        </div>
    </div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&libraries=places&sensor=false"
        type="text/javascript"></script>
    </scipt>
</body>

</html>