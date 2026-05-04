$(function(){

    //매핑 함수
    function mapWeatherIcon(icon) {
    switch (icon) {
        case '01d': return 'Sun';
        case '01n': return 'Moon';

        case '02d':
        case '02n':
        case '03d':
        case '03n':
        case '04d':
        case '04n':
            return 'Cloud';

        case '09d':
        case '09n':
        case '10d':
        case '10n':
            return 'Rain';

        case '11d':
        case '11n':
            return 'Storm';

        case '13d':
        case '13n':
            return 'Snow';

        case '50d':
        case '50n':
            return 'Haze';

        default:
            return 'Cloud';
    }
    }

    $.getJSON(
        'https://api.openweathermap.org/data/2.5/weather?lat=37.5652129&lon=126.9773517&appid=f2a940db2e2e3154cdd7a019acf72840&units=Metric',
        function(data){
            //날짜,요일
            var now = new Date();
            var b = now.getDay();
            var c = "";

            switch(b){
                case 0:
                    c = 'Sun';
                    break;
                case 1:
                    c = 'Mon';
                    break;
                case 2:
                    c = 'Tue';
                    break;
                case 3:
                    c = 'Wed';
                    break;
                case 4:
                    c = 'Thu';
                    break;
                case 5:
                    c = 'Fri';
                    break;
                case 6:
                    c = 'Sat';
                    break;
            }

            //오늘 '일' 가져오기
            var dayOfMonth = now.getDate();

            //한자리 숫자일 경우에 앞에 '0'붙이기
            // dayOfMonth가 10보다 작으면 '0'을 붙이고, 아니면 그냥 둠
            var formattedDay = dayOfMonth < 10 ? '0' + dayOfMonth : dayOfMonth;

            var $cDate = c + ' ' + formattedDay + '  |  ';

            var $cTemp = Math.round(data.main.temp);

            var $wIcon = data.weather[0].icon;
            var iconName = mapWeatherIcon($wIcon);
            
            $('.date').append($cDate);
            $('.cicon').html('<img src="./img/weather/' + iconName + '.svg" alt="weather">');
            $('.ctemp').append($cTemp + '℃');

        }
    )

})

