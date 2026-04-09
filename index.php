<?php
include "data/movies.php";

$correct_movie = "Interstellar";

$guess_data = null;
$correct_data = null;

function compare($a, $b){
    if($a == $b){
        return "green";
    } else {
        return "red";
    }
}

function compare_year($a, $b){

    if($a == $b){
        return "green";
    }

    if(abs($a - $b) <= 5){
        return "yellow";
    }

    return "red";
}

if(isset($_POST["guess"])){

    $guess = $_POST["guess"];

    foreach($movies as $movie){

        if($movie["title"] == $guess){
            $guess_data = $movie;
        }

        if($movie["title"] == $correct_movie){
            $correct_data = $movie;
        }

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Guess The Movie</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Guess The Movie</h1>

<form method="POST">

<input 
type="text" 
name="guess" 
id="movie-input"
placeholder="Digite o nome do filme..."
autocomplete="off"
required
>

<button type="submit">Enviar</button>

</form>

<div id="suggestions"></div>

<?php if($guess_data && $correct_data){ ?>

<div class="result">

<div class="cell <?php echo compare_year($guess_data["year"], $correct_data["year"]); ?>">
<?php echo $guess_data["year"]; ?>
</div>

<div class="cell <?php echo compare($guess_data["director"], $correct_data["director"]); ?>">
<?php echo $guess_data["director"]; ?>
</div>

<div class="cell <?php echo compare($guess_data["genre"], $correct_data["genre"]); ?>">
<?php echo $guess_data["genre"]; ?>
</div>

</div>

<?php } ?>

</body>
</html>