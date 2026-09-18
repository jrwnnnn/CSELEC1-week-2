<?php
$raw = file_get_contents(__DIR__ . "/src/data/hello_world.json");
$json = json_decode($raw, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World!</title>
      <link href="./src/styles/output.css" rel="stylesheet">
</head>
<body>
    <div id="background" class="flex flex-col items-center justify-center h-screen gap-3 bg-cover bg-center ">
        <?php foreach ($json as $value): ?>
            <p data-bg="<?= $value['bg']; ?>" class="text-center md:text-5xl text-2xl font-bold cursor-pointer hover:scale-110 transition-transform duration-300">
                <?= $value['message']; ?>
            </p>
        <?php endforeach; ?>
    </div>
</body>
</html>

<script>
    const background = document.getElementById("background");
    const textItems = document.querySelectorAll("[data-bg]");

    textItems.forEach((item) => {
        item.addEventListener("mouseover", () => {
            background.style.backgroundImage = `url('${item.dataset.bg}')`;
        });
    });
</script>
