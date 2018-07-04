var REST = {
  'path': 'xxx',
};
var SSID = 'xxx';
var PSWD = 'xxx';

// подключаем библиотеку DHT11 и создаём объект для работы с датчиком
var dht = require("DHT11").connect(P9);

// считываем данные с датчика
// выводим показания температуры и влажности в консоль
dht.read(function (a) {
  console.log("Temp is "+a.temp.toString()+" and RH is "+a.rh.toString());
});

// Барометр.
I2C1.setup({sda: SDA, scl: SCL, bitrate: 400000});
var baro = require('@amperka/barometer').connect({i2c: I2C1});
baro.init();
console.log("mmHg:" + baro.read('mmHg'));
console.log("C:" + baro.temperature('C'));


// Wifi
PrimarySerial.setup(115200);
var wifi = require('@amperka/wifi').setup(PrimarySerial, function(err) {
  wifi.getAPs(function(err, aps) { print(aps); });
  // подключаемся к Wi-Fi сети
  wifi.connect(SSID, PSWD, function(err) {
    console.log('wifi:: Connected');
    require("http").get(REST.path, function(res) {
      var contents = "";
      res.on('data', function(data) { contents += data; });
      res.on('close', function() { console.log(contents); });
    }).on('error', function(e) {
      console.log("ERROR", e);
    });
    console.log('wifi:: Done');
  });
});

function postData(event, data) {
  var url = REST.path + jsonToQueryString(data);
  require("http").get(url, function(res) {
    var contents = "";
    res.on('data', function(data) { contents += data; });
    res.on('close', function() { console.log(contents); });
  });
}

// Проверяем температуру, влажность и давление.
setInterval(function(a) {
  dht.read(function (a) {
    temp = a.temp.toString();
    rh = a.rh.toString();
    var data = {
        "temp": temp,
        "rh": rh,
        "C": baro.temperature('C'),
        "mm": baro.read('mmHg')
    };
    console.log(data);
    postData("meteo", data);
  });
}, 5000);

function jsonToQueryString(json) {
    return '?' + 
        Object.keys(json).map(function(key) {
            return encodeURIComponent(key) + '=' +
                encodeURIComponent(json[key]);
        }).join('&');
}
