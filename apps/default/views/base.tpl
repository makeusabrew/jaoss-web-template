<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jaoss Web Template{if isset($title)}: - {$title}{/if}</title>
</head>
<body>
    {if $smarty.capture.body}
        {$smarty.capture.body}
    {else}
        <p>Your body content goes here.</p>
    {/if}
</body>
</html>
