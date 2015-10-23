$(function () {

    $.fn.serializeObject = function(){
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    var curFigure = 'rectangle',
        history = {}
        indexFigure = 0;

    var draw = function(canvas, $btn, data) {
        var c=canvas;
        var ctx=c.getContext("2d");

        ctx.beginPath();

        if (typeof(data) != 'undefined' && data.clear)
        {
            ctx.clearRect(0, 0, 200, 150);
        }

        ctx.lineWidth=$('.lineBorder').val();
        ctx.strokeStyle=$('.colorBorder').val();

        if (curFigure == 'rectangle')
        {
            ctx.rect(
                data.x1 ? data.x1 : 20,
                data.y1 ? data.y1 : 20,
                data.x2 ? data.x2 : 150,
                data.y2 ? data.y2 : 100
            );
        }
        else {
            ctx.arc(
                data.x1 ? data.x1 : 100,
                data.y1 ? data.y1 : 75,
                data.x2 ? data.x2 : 50,
                data.y2 ? data.y2 : 0,
                (data.radian ? data.radian : 2)*Math.PI
            );
        }

        ctx.stroke();
    }

    $('.panel').on('click', '.rectangle, .circle', function() {
        var $this = $(this),
            param = $this.data('param');
        curFigure = $this.hasClass('rectangle') ? 'rectangle' : 'circle';

        param.lineColor = $('.colorBorder').val();
        param.lineSize = $('.lineBorder').val();

        history['figure_' + (indexFigure++)] = {
            type: curFigure,
            param: param
        };

        draw(document.getElementById("signature"), $this, param);
    });

    $('.panel .save').on('click', function() {
        $.ajax({
            url: '/run/view',
            type: 'post',
            dataType: 'json',
            data: history,
            success: function(res) {
                console.log(res);
            }
        });
    });

    $('.add').on('click', function() {

        var radian = $('#radian');

        $('.new_figure').show();

            $('.new_figure #obj').on('click', function() {
                var $this = $(this),
                    data = {
                        clear: true
                    },
                    param = {};

                if (curFigure == 'rectangle') {
                    curFigure = 'circle';
                    $('#radian, .radian').show();
                    radian.removeAttr('disabled');
                    param = $('#circle').data('param');
                    $('#x1').val(param.x1);
                    $('#y1').val(param.y1);
                    $('#x2').val(param.x2);
                    $('#y2').val(param.y2);
                    $('#radian').val(param.radian);
                }
                else {
                    curFigure = 'rectangle';
                    $('#radian, .radian').hide();
                    radian.attr('disabled', 'disabled');
                    param = $('#rectangle').data('param');
                    $('#x1').val(param.x1);
                    $('#y1').val(param.y1);
                    $('#x2').val(param.x2);
                    $('#y2').val(param.y2);
                }

                draw(document.getElementById("obj"), $this, data);
            });

            $('.new_figure .apply').on('click', function() {
                var $this = $(this),
                    data = {
                        clear: true,
                        x1: $('#x1').val(),
                        y1: $('#y1').val(),
                        x2: $('#x2').val(),
                        y2: $('#y2').val()
                    };

                if (!radian.prop('disabled')) {
                    data.radian = radian.val()
                }

                draw(document.getElementById("obj"), $this, data);
            });

            $('.new_figure .save').on('click', function() {
                $('.draw .panel')
                    .prepend('<button class="btn btn-default '
                            + (curFigure) + '" data-param=\''
                            + JSON.stringify($('.param').serializeObject()) + '\' type="submit">'
                            + $('#name').val() + '</button>');
                $('.new_figure').hide();
            });
    });

});
