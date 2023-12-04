<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kenno-widget</title>
</head>

<body>
    <div id="kenno-widget">
    </div>

</body>

</html>
<script src="https://amazon.betsfactory.net/RNGAPI/WidgetContent_v2/magicwin/?partner=988bet"></script>
<script>
    var setup = {
                                container: 'kenno-widget',
                                lang: 'th',
                                options: {
                                game: 'LuckySix'
                                },
                                UserToken: "{!! $reqCode !!}",
                                onLoad: function (instance) {
                                console.log('Game is loaded.');
                                },
                                onChangeBalance: function () {
                                console.log('Balance is changed');
                                }
                            };
                MagicGames.addWidget(setup);

</script>