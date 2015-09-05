$(document).ready(function () {
    $(".game-card").flip({
        trigger: 'manual'
    });

    var card = $(".game-card .card");
    card.css('width', parseInt(new String(card.css('width')).replace(/[^0-9]/, '')) - 20);
    card.css('height', parseInt(new String(card.css('height')).replace(/[^0-9]/, '')) - 20);

    $('.game-card-container').click(function () {
        var $card = $(this).find('.game-card');
        var $state = $card.data('state');
        var $isOk = parseInt($card.data('is-ok'));
        var $imgOk = './img/ok.jpg';
        var $imgWrong = './img/wrong.jpg';

        if (!isProcessed()) {
            if ($isOk) {
                flipOk();
            } else {
                console.log('wrong');
                flipWrong();
            }
        }

        function flipOk() {
            setBackImage($imgOk);
            $card.flip(true, function () {
                setTimeout(function () {
                    $card.flip(false, function () {
                        setProcessed();
                    });
                }, 1000);
            });
        }

        function flipWrong() {
            setBackImage($imgWrong);
            $card.flip(true, function () {
                setTimeout(function () {
                    $card.flip(false);
                }, 1000);
            });
        }

        function setProcessed() {
            $card.attr('data-state', 'processed');
            $card.find('.front').fadeTo("slow", 0.1);
        }

        function isProcessed() {
            return $state == 'processed';
        }

        function setBackImage($img) {
            $card.find('.back').css('background-image', 'url(' + $img + ')');
        }
    });
});
