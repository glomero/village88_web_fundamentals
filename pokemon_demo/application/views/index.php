<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gotta Catch'em All</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $.get("https://pokeapi.co/api/v2/pokemon/1/", function(res) {  // #1 Get response data from url
                    var html_str = "<h4>Types</h4><ul>";      // #2. Execute codes inside function                        
                    for(var i = 0; i < res.abilities.length; i++) {
                        html_str += "<li>" + res.abilities[i].ability.name + "</li>";
                    }
                    html_str += "</ul>";
                    $("#pokemon").html(html_str);
                }, "json");  // #3. Format the final response in JSON
            });
        </script>
    </head>
    <body>
        <h1>bulbazar</h1>
        <div id="pokemon">
        </div>
    </body>
</html>