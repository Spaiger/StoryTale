GALLERY = {
    // задаем дефолтные параметры, которые можно будет переопределить при инициализации.
        container: 'section.container',   // родительский контейнер
        item: 'section.item',   // отдельный элемент галереи
        img: 'section.item > img.hidden',   // изображение, которое мы будем изначально "прятать"
        interval: 200,  // задержка эффекта прозрачности
        count: 5,  // количество добавляемых элементов
        init: function(params) {
        var _self = this;
    // Переопределение параметров (если такие переданы. Если нет - используем по умолчанию.)
        if(params != undefined){
            for (var key in params) {
            _self[key] = params[key];
            }
        }
        return _self.setUp();
        },
        setUp: function() {
        var _self = this;
    // Вешаем обработчики событий. В нашем случае такие нужны окну (ресайз)
        $(window).bind('resize', function(){
            _self.adjust();
        });
    // ... на загрузку страницы
        $(document).ready(function(){
            _self.adjust();
            _self.play();
        });
    // ... на прокутку в родительском блоке
        $(_self.container).bind('scroll', function(){
            _self.checkScroll();
        });
        },
    // подгоняем ширину и количество элементов в ряду, зависимо от размера окна
        adjust: function() {
        var _self = this;
        var outWidth = $(_self.container).width();
        var outHeight = $(_self.container).height();
        var minWidth = 220;
        var cnt = Math.floor(outWidth / minWidth);
        var itemWidth = outWidth / cnt;
        $(_self.item).css({
            'width' : itemWidth + 'px'
        });
        },
    // Запускаем эффект постепенного появления элементов. Маленький нюанс: Класс hidden 
    // для изображения нужен не за тем чтобы его прятать (это будет делать метод ниже), а для поиска
    // первого элемента при каждом обновлении контента. Цикл метода play() проходит 
    // по всем изображениям с классом hidden (изначально такой есть у всех), после применения 
    // эффекта fadeIn(), удаляя класс. Таким образом, при подгрузке нового контента, цикл начинается 
    // не с первого элемента, а с первого подгруженного.
    // Впервые столкнулся с использованием метода queue().
        play: function() {
        var _self = this;
        var items = $(_self.container).find(_self.img);
        $(items).each(function(i) {
            var cur = $(this).hide();
            $(document).queue('myQueue', function(n) {
            cur.removeClass('hidden').fadeIn(_self.interval, n);
            });
        });
        $(document).dequeue('myQueue');
        },
    // Собственно подгрузка контента. Здесь все просто: отправляем запрос на сервер - получаем 
    // новое содержимое на страницу (если такое есть) и выводим его в самом конце родительского блока
        load: function() {
        var _self = this;
        $.ajax({
            url: '/load.php',
            type: 'POST',
            data: {'count': _self.count},
            dataType: 'json',
            success: function(json) {
            if(json.output) {
                $(_self.container).children('div.clearfix').before(json.output);
                _self.adjust();
                _self.play();
            }
            }
        });
        },
    // Проверяем состояние прокрутки. Если вертикальная прокрутка в родительском блоке 
    // равна максимально возможной - отправляем запрос за новым контентом. 
    // Таким образом, подгрузка содержимого будет выполняться только если мы 
    // докрутили страницу до конца.
        checkScroll: function() {
        var _self = this;
        var scrollH = $(_self.container).prop('scrollHeight');
        var scrollT = $(_self.container).prop('scrollTop');
        var scrollS = $(_self.container).prop('scrollTop') + $(_self.container).height();
        if(scrollS == scrollH) {
            _self.load();
        }
        }
    }