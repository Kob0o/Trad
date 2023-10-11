<?php
$word = isset($_POST['word']) ? strtolower($_POST['word']) : '';
$direction = isset($_POST['direction']) ? $_POST['direction'] : '';

function translate($word, $direction){
    $dictionary = [
        "bonjour" => "hello",
        "au revoir" => "goodbye",
        "merci" => "thank you",
        "s'il vous plaît" => "please",
        "pardon" => "sorry",
        "désolé" => "sorry",
        "voir" => "see",
        "regarder" => "watch",
        "écouter" => "listen",
        "entendre" => "hear",
        "manger" => "eat",
        "téléphoner" => "call",
        "appeler" => "call",
        "parler" => "speak",
        "dire" => "say",
        "tell" => "tell",
        "lire" => "read",
        "écrire" => "write",
        "chanter" => "sing",
        "dormir" => "sleep",
        "jouer" => "play",
    ];

    if ($direction == "toEnglish" && isset($dictionary[$word])) {
        return $dictionary[$word];
    } elseif ($direction == "toFrench") {
        $reverseDictionary = array_flip($dictionary);
        if (isset($reverseDictionary[$word])) {
            return $reverseDictionary[$word];
        }
    }

    return "Mot inconnu";
}

if (!empty($word) && !empty($direction)) {
    $translation = translate($word, $direction);
} else {
    $translation = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="traducteur.css">
    <title>Traducteur Anglais - Français</title>
</head>

<body>
    <h1>Traducteur Anglais - Français</h1>
    <?php if (empty($translation)) : ?>
        <form action="traducteur.php" method="post">
            <input type="text" name="word" id="word" placeholder="Texte à traduire" value="<?= $word ?>">
            <select name="direction" id="direction">
                <option value="toEnglish" <?= ($direction == 'toEnglish') ? 'selected' : '' ?>>Français vers Anglais</option>
                <option value="toFrench" <?= ($direction == 'toFrench') ? 'selected' : '' ?>>Anglais vers Français</option>
            </select>
            <input type="submit" value="Traduire">
        </form>
        
    <?php else : ?>
        <p>Traduction : <?= $translation ?></p>
    <?php endif; ?>
</body>


</html>
