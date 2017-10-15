<footer class="footer">
    <div class="container">
        <span class="text-muted"><p>&copy; WURZ</p></span>
    </div>
</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script>

    $("#btnn").click(function () {
        $.ajax({
            type: "POST",
            url: "action.php",
            data:  "email = " + $("#email").val() + "&password = " + $("#pass").val(),
            success: function (result) {
                alert(result);
            }
        })


    })

</script>

</body>
</html>