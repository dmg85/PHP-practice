<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Initialize a new cURL sesion; ch = cURL handle
$ch = curl_init(API_URL);
// Indicate that we want the result of the request and not to be shown on screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Execite the request
and save the result
*/
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

var_dump($data)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="despcription" content="The new Marvel Movie">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Centered viewport -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
  <title>Next Marvel Movie</title>
  <link>
</head>

<body>
  <main>
    <pre style="font-size: 10px; overflow: scroll; height: 300px;">
      <?php var_dump($data); ?>
    </pre>
    <section>
      <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px" />
    </section>

    <hgroup>
      <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h3>
      <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
      <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
  </main>
</body>

</html>


<style>
  body {
    background-color: #333;
    color: #f3f3f3;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    padding: 0 1.5rem;
  }


  section {
    display: flex;
    justify-content: center;
  }

  hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }


  img {}
</style>