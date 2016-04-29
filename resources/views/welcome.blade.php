<!DOCTYPE html>
<html>
    <head>
        <title>FastShip</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
              crossorigin="anonymous"
        >

        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
        >
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Enter your tracking code bellow:</h4>
                    <div class="input-group">
                        <input type="text" name="trackingCode" class="form-control" placeholder="Search for tracking code...">
                    <span class="input-group-btn">
                        <button id="search" class="btn btn-default" type="button">Find!</button>
                    </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </body>

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <!-- jQuery rest -->
    <script src="http://jpillora.com/jquery.rest/dist/1/jquery.rest.min.js"></script>

    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"
    ></script>

    <script type="text/javascript">
        var client = new $.RestClient('/');
        client.add('shipping');
        $(document).on("click", "#search", function() {
            var trackingCodeInput = $("input[name='trackingCode']");
            var trackingCode = trackingCodeInput.val();
            var request = client.shipping.read(trackingCode);
            request.done(function (data, textStatus, xhrObject){
                $("input[name='trackingCode']").val("");
                if (data != 0) {
                    swal(data.deliveryDate, 'This is the delivery date for parcel no. ' + trackingCode, "success");
                } else {
                    swal('Nothing found!', 'Parcel code (' + trackingCode + ') seems to be invalid!', "warning");
                }
            });
        });
    </script>

</html>
