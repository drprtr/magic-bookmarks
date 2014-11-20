<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magic Bookmarks</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Wow</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"> </a>
                    </li>
                    <li>
                        <a href="#"> </a>
                    </li>
                    <li>
                        <a href="#"> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Magic Bookmarks</h1>
                <p class="lead">Pulling content straight from a Google Spreadsheet.</p>
                <ul class="list-unstyled">
                    <li>Using <a target="_blank" href="https://drive.google.com/open?id=1s3y1CP3PeQrV1ktRuSGDzX4AyrNhbN9S2BeXVBWnTFg&authuser=0">this Google Spreadsheet</a></li>
                    
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<p>
        		<a onCLick="window.location.reload()"><button  class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Refresh</button></a> 
        		<a href="https://drive.google.com/open?id=1s3y1CP3PeQrV1ktRuSGDzX4AyrNhbN9S2BeXVBWnTFg&authuser=0"><button  class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
        	</p>
    	</div>

        <div class="row">

        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>URL</th>
                <th>Description</th>
            </tr>

            <script type="text/javascript">
            /*
                importGSS() is called from the callback at the end of the Google Spreadsheet reference in the second script
                creates a JSON object that contains all the data from the spreadsheet
                we loop through json.feed.entry which contains each row of the spreadsheet
                we split each row into individual cells (known) then parse them into user friendly html
            */

                function importGSS(json) {
                    console.log('finished');
                    console.dir(json);


                     for (var i = 0; i < json.feed.entry.length; i++) {
                        var entry = json.feed.entry[i];
                        var row = entry.content.$t;

                        document.write('<tr>');

                        var cells = row.split(",")

                        var name = cells[0].replace(/[a-z]*: /i, '');
                        var url = cells[1].replace(/[a-z]*: /i, '');
                        var link = '<a href="' + url + '" target="_blank">' + url + '</a>';
                        var description = cells[2].replace(/[a-z]*: /i, '');

                        var line = '<td>' + name + '</td>' + '<td>' + link + '</td>' + '<td>' + description + '</td>';
                        document.write(line);
                        }

                        document.write('</tr>');

                    

                }



            </script>

            <script src="https://spreadsheets.google.com/feeds/list/1s3y1CP3PeQrV1ktRuSGDzX4AyrNhbN9S2BeXVBWnTFg/od6/public/values?alt=json-in-script&callback=importGSS"></script>

        </table>

        </div>


    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
