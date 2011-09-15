<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{setting value="site.title"}{if isset($title)}: - {$title}{/if}</title>
</head>
<body>
    {block name="body"}<p>Your body content goes here.</p>{/block}

    {*
      ordinarily body will probably be wrapped with surrounding markup, so it
      makes sense to have a separate block to put script tags in
     *}
    {block name="script"}{/block}

    {* default tracking is GA *}
    {setting value="analytics.enabled" assign="stats_enabled"}
    {if $stats_enabled}
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '{setting value="analytics.account_no"}']);
            _gaq.push(['_setDomainName', 'none']);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    {/if}
</body>
</html>
