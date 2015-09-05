$(function () {
    $(".game-card").flip({
        trigger: 'manual'
    });

    $('.game-card-container').click(function () {
        var $card = $(this).find('.game-card');
        var $state = $card.data('state');
        var $isOk = $card.data('is-ok');
        var $imgOk = './img/ok.jpg';
        var $imgWrong = './img/wrong.jpg';

        if (!isProcessed()) {
            if ($isOk) {
                flipOk();
            } else {
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
            $card.find('.back img').attr('src', $img);
        }
    });
});
