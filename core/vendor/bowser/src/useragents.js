/**
 * Example User Agents and their expected bowser objects.
 * Most of them where found at http://www.useragentstring.com/
 *
 * @see  test/test.js
 * @author hannes.diercks@jimdo.com
 */
module.exports.useragents = {
    Chrome: {
      'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 9 Build/LMY48T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Safari/537.36': {
        chrome: true
      , android: true
      , osversion: '5.1.1'
      , tablet: true
      , version: '47.0'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 7 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.99 Safari/537.36': {
        chrome: true
      , android: true
      , osversion: '4.4.2'
      , tablet: true
      , version: '32.0'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Linux; Android 4.3; Galaxy Nexus Build/JWR66Y) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.99 Mobile Safari/537.36': {
        chrome: true
      , android: true
      , osversion: '4.3'
      , mobile: true
      , version: '32.0'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Linux; Android 4.1; Galaxy Nexus Build/JRN84D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Mobile Safari/535.19': {
        chrome: true
      , android: true
      , osversion: '4.1'
      , mobile: true
      , version: '18.0'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Linux; U; Android-4.0.3; en-us; Xoom Build/IML77) AppleWebKit/535.7 (KHTML, like Gecko) CrMo/16.0.912.75 Safari/535.7': {
        chrome: true
      , android: true
      , osversion: '4.0.3'
      , tablet: true
      , version: '16.0'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Linux; U; Android-4.0.3; en-us; Galaxy Nexus Build/IML74K) AppleWebKit/535.7 (KHTML, like Gecko) CrMo/16.0.912.75 Mobile Safari/535.7': {
        chrome: true
      , android: true
      , osversion: '4.0.3'
      , mobile: true
      , version: '16.0'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 5_1_1 like Mac OS X; en) AppleWebKit/534.46.0 (KHTML, like Gecko) CriOS/19.0.1084.60 Mobile/9B206 Safari/7534.48.3': {
        chrome: true
      , iphone: true
      , ios: true
      , osversion: '5.1.1'
      , mobile: true
      , version: '19.0'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (iPad; U; CPU OS 5_1_1 like Mac OS X; en-us) AppleWebKit/534.46.0 (KHTML, like Gecko) CriOS/19.0.1084.60 Mobile/9B206 Safari/7534.48.3': {
        chrome: true
      , ipad: true
      , ios: true
      , osversion: '5.1.1'
      , tablet: true
      , version: '19.0'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.17 Safari/537.36': {
        chrome: true
      , version: '30.0'
      , windows: true
      , osversion: '8'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36': {
        chrome: true
      , version: '29.0'
      , windows: true
      , osversion: '7'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (X11; CrOS i686 4319.74.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.57 Safari/537.36': {
        chrome: true
      , chromeBook: true
      , version: '29.0'
      , chromeos: true
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.2 Safari/537.36': {
        chrome: true
      , version: '29.0'
      , windows: true
      , osversion: '8'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1468.0 Safari/537.36': {
        chrome: true
      , version: '28.0'
      , windows: true
      , osversion: '7'
      , blink: true
      , a: true
      }
    , 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_7) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.57 Safari/534.24': {
        chrome: true
      , version: '11.0'
      , mac: true
      , osversion: '10.6.7'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/534.3 (KHTML, like Gecko) Chrome/6.0.462.0 Safari/534.3': {
        chrome: true
      , version: '6.0'
      , linux: true
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X) AppleWebKit/601.1 (KHTML, like Gecko) CriOS/50.0.2661.95 Mobile/13E238 Safari/601.1.46': {
        chrome: true
      , version: '50.0'
      , osversion: '9.3.1'
      , webkit: true
      , ios: true
      , iphone: true
      , mobile: true
      , a: true
      }
    , 'Mozilla/5.0 (Linux; Android 5.0.2; SM-T705 Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Safari/537.36': {
          chrome: true
        , android: true
        , version: '49.0'
        , osversion: '5.0.2'
        , blink: true
        , a: true
        , tablet: true
      }
    , 'Mozilla/5.0 (Linux; Android 6.0.99; Build/NPC91K) AppleWebKit/537.36(KHTML, like Gecko) Chrome/50.0.2661.86 Safari/537.36': {
          chrome: true
        , android: true
        , tablet: true
        , osversion: '6.0.99'
        , version: '50.0'
        , blink: true
        , a: true
      }
    }
  , 'Amazon Silk': {
      'Mozilla/5.0 (Linux; U; Android 4.0.3; en-us; KFTT Build/IML74K) AppleWebKit/535.19 (KHTML, like Gecko) Silk/3.4 Mobile Safari/535.19 Silk-Accelerated=true': {
        name: 'Amazon Silk'
      , silk: true
      , webkit: true
      , android: true
      , osversion: '4.0.3'
      , tablet: true
      , version : '3.4'
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; en-us; KFTT Build/IML74K) AppleWebKit/535.19 (KHTML, like Gecko) Silk/3.4 Safari/535.19 Silk-Accelerated=true': {
        name: 'Amazon Silk'
      , silk: true
      , webkit: true
      , android: true
      , tablet: true
      , version : '3.4'
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Android 2.3.4; en-us; Silk/1.0.13.81_10003810) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1 Silk-Accelerated=true': {
        name: 'Amazon Silk'
      , silk: true
      , webkit: true
      , android: true
      , osversion: '2.3.4'
      , tablet: true
      , version : '1.0'
      , x: true
      }
    , 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-us; Silk/1.0.22.153_10033210) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16 Silk-Accelerated=true': {
        name: 'Amazon Silk'
      , silk: true
      , webkit: true
      , android: true
      , tablet: true
      , version : '1.0'
      , x: true
      }
    }
  , Opera: {
      'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 7 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.72 Safari/537.36 OPR/19.0.1340.69721': {
        opera: true
      , blink: true
      , android: true
      , osversion: '4.4.2'
      , tablet: true
      , version: '19.0'
      , a: true
      }
    , 'Mozilla/5.0 (Linux; Android 4.3; Galaxy Nexus Build/JWR66Y) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.72 Mobile Safari/537.36 OPR/19.0.1340.69721': {
        opera: true
      , blink: true
      , android: true
      , osversion: '4.3'
      , mobile: true
      , version: '19.0'
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36 OPR/15.0.1147.100': {
        opera: true
      , windows: true
      , osversion: '7'
      , blink: true
      , version: '15.0'
      , a: true
      }
    , 'Opera/9.80 (Android 4.3; Linux; Opera Mobi/ADR-1309251116) Presto/2.11.355 Version/12.10': {
        opera: true
      , version: '12.10'
      , android: true
      , osversion: '4.3'
      , mobile: true
      , a: true
      }
    , 'Opera/9.80 (Android 4.4.2; Linux; Opera Tablet/ADR-1309251116) Presto/2.11.355 Version/12.10': {
        opera: true
      , version: '12.10'
      , android: true
      , osversion: '4.4.2'
      , tablet: true
      , a: true
      }
    , 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14': {
        opera: true
      , version: '12.14'
      , windows: true
      , osversion: 'Vista'
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14': {
        opera: true
      , version: '12.14'
      , windows: true
      , osversion: 'Vista'
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0) Opera 12.14': {
        opera: true
      , version: '12.14'
      , windows: true
      , osversion: 'Vista'
      , a: true
      }
    , 'Opera/12.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02': {
        opera: true
      , version: '12.02'
      , windows: true
      , osversion: 'XP'
      , a: true
      }
    , 'Opera/9.80 (X11; Linux i686; U; es-ES) Presto/2.8.131 Version/11.11': {
        opera: true
      , version: '11.11'
      , linux: true
      , a: true
      }
    , 'Opera/9.80 (Macintosh; Intel Mac OS X 10.6.7; U; en) Presto/2.7.62 Version/11.01': {
        opera: true
      , version: '11.01'
      , mac: true
      , osversion: '10.6.7'
      , a: true
      }
    , 'Opera/9.80 (Windows NT 5.2; U; zh-cn) Presto/2.6.30 Version/10.63': {
        opera: true
      , version: '10.63'
      , windows: true
      , osversion: '2003'
      , a: true
      }
    , 'Opera/9.80 (X11; Linux i686; U; it) Presto/2.5.24 Version/10.54': {
        opera: true
      , version: '10.54'
      , linux: true
      , a: true
      }
    , 'Opera/9.70 (Linux ppc64 ; U; en) Presto/2.2.1': {
        opera: true
      , version: '9.70'
      , linux: true
      , c: true
      }
    , 'Opera/9.63 (X11; Linux i686)': {
        opera: true
      , version: '9.63'
      , linux: true
      , c: true
      }
    , 'Mozilla/5.0 (X11; Linux i686; U; en) Opera 8.52': {
        opera: true
      , version: '8.52'
      , linux: true
      , c: true
      }
    , 'Mozilla/5.0 (iPod touch; CPU iPhone OS 9_3_4 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) OPiOS/14.0.0.104835 Mobile/13G35 Safari/9537.53': {
      opera: true
      , version: '14.0'
      , mobile: true
      , ipod: true
      , ios: true
      , a: true
      , osversion: '9.3.4'
      , webkit: true
    }
    , 'Mozilla/5.0 (Linux; U; Android 6.0; R1 HD Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/52.0.2743.98 Mobile Safari/537.36 OPR/18.0.2254.106542': {
      opera: true
      , version: '18.0'
      , blink: true
      , mobile: true
      , android: true
      , a: true
      , osversion: '6.0'
    }
  }
  , 'Opera Coast': {
    'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Coast/5.02.99991 Mobile/13E238 Safari/7534.48.3': {
        coast: true
      , version: '5.02'
      , osversion: '9.3.1'
      , iphone: true
      , ios: true
      , mobile: true
      , a: true
      , webkit: true
    }
  }
  , 'Yandex Browser': {
    'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 YaBrowser/15.4.2272.3420 (beta) Yowser/2.0 Safari/537.36': {
        yandexbrowser: true
      , blink: true
      , version: '15.4'
      , mac: true
      , osversion: '10.10.3'
      , a: true
    },
      'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 5 Build/LMY48B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 YaBrowser/15.4.2272.3608.00 Mobile Safari/537.36': {
          yandexbrowser: true
        , android: true
        , osversion: '5.1.1'
        , mobile: true
        , version: '15.4'
        , blink: true
        , a: true
      }
    }
  , Safari: {
      'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2': {
        safari: true
      , version: '5.1'
      , mac: true
      , osversion: '10.6.8'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; en-us) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1': {
        safari: true
      , version: '5.0'
      , mac: true
      , osversion: '10.6.7'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU) AppleWebKit/533.18.1 (KHTML, like Gecko) Version/5.0.2 Safari/533.18.5': {
        safari: true
      , version: '5.0'
      , windows: true
      , osversion: 'XP'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (X11; U; Linux x86_64; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/531.2+': {
        safari: true
      , version: '5.0'
      , linux: true
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-en) AppleWebKit/533.16 (KHTML, like Gecko) Version/4.1 Safari/533.16': {
        safari: true
      , version: '4.1'
      , windows: true
      , osversion: '2000'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_6_1; en_GB, en_US) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Safari/531.21.10': {
        safari: true
      , version: '4.0'
      , mac: true
      , osversion: '10.6.1'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_7; de-de) AppleWebKit/525.28.3 (KHTML, like Gecko) Version/3.2.3 Safari/525.28.3': {
        safari: true
      , version: '3.2'
      , mac: true
      , osversion: '10.5.7'
      , webkit: true
      , c: true
      }
    , 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Mobile/11B554a': {
      ios: true
      , osversion: '7.0.4'
      , iphone: true
      , mobile: true
      , webkit: true
      , safari: true
      , a: true
    }
    , 'Mozilla/5.0 (iPhone Simulator; U; CPU iPhone OS 4_3_2 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8H7 Safari/6533.18.5': {
      ios: true
      , osversion: '4.3.2'
      , version: '5.0'
      , iphone: true
      , mobile: true
      , safari: true
      , webkit: true
      , c: true
    }
    , 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A543a Safari/419.3': {
      ios: true
      , version: '3.0'
      , iphone: true
      , mobile: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B5097d Safari/6531.22.7': {
      ios: true
      , osversion: '4.1'
      , version: '4.0'
      , iphone: true
      , mobile: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_5_2; en-gb) AppleWebKit/526+ (KHTML, like Gecko) Version/3.1 iPhone': {
      ios: true
      , version: '3.1'
      , iphone: true
      , mobile: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_0 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13A344 Safari/601.1': {
      ios: true
      , osversion: '9.0'
      , version: '9.0'
      , iphone: true
      , mobile: true
      , webkit: true
      , safari: true
      , a: true
    }
    , 'Mozilla/5.0 (iPad; CPU OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B554a Safari/9537.53': {
      ios: true
      , osversion: '7.0.4'
      , name: 'Safari'
      , version: '7.0'
      , ipad: true
      , tablet: true
      , webkit: true
      , safari: true
      , a: true
    }
    , 'Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25': {
      ios: true
      , osversion: '6.0'
      , name: 'Safari'
      , version: '6.0'
      , ipad: true
      , tablet: true
      , webkit: true
      , safari: true
      , a: true
    }
    , 'Mozilla/5.0 (iPad; CPU OS 5_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko ) Version/5.1 Mobile/9B176 Safari/7534.48.3': {
      ios: true
      , osversion: '5.1'
      , name: 'Safari'
      , version: '5.1'
      , ipad: true
      , tablet: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPad; U; CPU OS 4_3_2 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8H7 Safari/6533.18.5': {
      ios: true
      , osversion: '4.3.2'
      , name: 'Safari'
      , version: '5.0'
      , ipad: true
      , tablet: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; es-es) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B360 Safari/531.21.10': {
      ios: true
      , osversion: '3.2'
      , name: 'Safari'
      , version: '4.0'
      , ipad: true
      , tablet: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPod touch; CPU iPhone OS 7_0_3 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B511 Safari/9537.53': {
      ios: true
      , osversion: '7.0.3'
      , version: '7.0'
      , ipod: true
      , mobile: true
      , webkit: true
      , safari: true
      , a: true
    }
    , 'Mozilla/5.0 (iPod; CPU iPhone OS 5_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B176 Safari/7534.48.3': {
      ios: true
      , osversion: '5.1'
      , version: '5.1'
      , ipod: true
      , mobile: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5': {
      ios: true
      , osversion: '4.3.3'
      , version: '5.0'
      , ipod: true
      , mobile: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPod; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/4A93 Safari/419.3': {
      ios: true
      , version: '3.0'
      , ipod: true
      , mobile: true
      , webkit: true
      , safari: true
      , c: true
    }
    , 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E238 Safari/601.1': {
        ios: true
      , iphone: true
      , safari: true
      , version: '9.0'
      , mobile: true
      , osversion: '9.3.1'
      , a: true
      , webkit: true
    }
  }
  , 'Internet Explorer': {
      'Mozilla/5.0 (Windows NT 6.3; Win64; x64; Trident/7.0; MAARJS; rv:11.0) like Gecko': {
        msie: true
      , version: '11.0'
      , windows: true
      , osversion: '8.1'
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko': {
        msie: true
      , version: '11.0'
      , windows: true
      , osversion: '8.1'
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; ARM; Touch; WPDesktop)': {
        msie: true
      , version: '10.0'
      , windows: true
      , osversion: '8'
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; .NET4.0E; .NET4.0C; Media Center PC 6.0; rv:11.0) like Gecko': {
        msie: true
      , version: '11.0'
      , windows: true
      , osversion: '8.1'
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 10.6; Windows NT 6.1; Trident/5.0; InfoPath.2; SLCC1; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET CLR 2.0.50727) 3gpp-gba UNTRUSTED/1.0': {
        msie: true
      , version: '10.6'
      , windows: true
      , osversion: '7'
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/4.0; InfoPath.2; SV1; .NET CLR 2.0.50727; WOW64)': {
        msie: true
      , version: '10.0'
      , windows: true
      , osversion: '7'
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET CLR 2.0.50727; Media Center PC 6.0)': {
        msie: true
      , version: '9.0'
      , windows: true
      , osversion: '7'
      , c: true
      }
    , 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C)': {
        msie: true
      , version: '8.0'
      , windows: true
      , osversion: '7'
      , c: true
      }
    , 'Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1; .NET CLR 1.1.4322; InfoPath.1; .NET CLR 2.0.50727)': {
        msie: true
      , version: '7.0'
      , windows: true
      , osversion: 'XP'
      , c: true
      }
    , 'Mozilla/4.0 (compatible; MSIE 6.1; Windows XP; .NET CLR 1.1.4322; .NET CLR 2.0.50727)': {
        msie: true
      , version: '6.1'
      , windows: true
      , osversion: 'XP'
      , c: true
      }
    , 'Mozilla/4.0 (Compatible; Windows NT 5.1; MSIE 6.0) (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)': {
        msie: true
      , version: '6.0'
      , windows: true
      , osversion: 'XP'
      , c: true
      }
    , 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT)': {
        msie: true
      , version: '5.01'
      , windows: true
      , osversion: 'NT'
      , c: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; Xbox; Xbox One)': {
        xbox: true
      , msie: true
      , version: '10.0'
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.3; ARM; Trident/7.0; Touch; rv:11.0) like Gecko': {
        msie: true
      , version: '11.0'
      , a: true
      , windows: true
      , osversion: '8.1'
      }
    , 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; Touch; LCTE; rv:11.0)': {
        msie: true
      , version: '11.0'
      , a: true
      , windows: true
      , osversion: '10'
      }
    }
  , 'Microsoft Edge': {
      'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0': {
        msedge: true
      , version: '12.0'
      , windows: true
      , osversion: '10'
      , a: true
      }
    }
  , Firefox: {
      'Mozilla/5.0 (Mobile; rv:26.0) Gecko/26.0 Firefox/26.0': {
        gecko: true
      , firefox: true
      , version: '26.0'
      , mobile: true
      , firefoxos: true
      , a: true
      }
    , 'Mozilla/5.0 (Tablet; rv:26.0) Gecko/26.0 Firefox/26.0': {
        gecko: true
      , firefox: true
      , version: '26.0'
      , tablet: true
      , firefoxos: true
      , a: true
      }
    , 'Mozilla/5.0 (Mobile; LG-D300; rv:18.1) Gecko/18.1 Firefox/18.1': {
        gecko: true
      , firefox: true
      , version: '18.1'
      , mobile: true
      , firefoxos: true
      , c: true
      }
    , 'Mozilla/5.0 (Android; Mobile; rv:27.0) Gecko/27.0 Firefox/27.0': {
        gecko: true
      , firefox: true
      , version: '27.0'
      , mobile: true
      , android: true
      , a: true
      }
    , 'Mozilla/5.0 (Android; Tablet; rv:26.0) Gecko/26.0 Firefox/26.0': {
        gecko: true
      , firefox: true
      , version: '26.0'
      , tablet: true
      , android: true
      , a: true
      }
    , 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0': {
        gecko: true
      , firefox: true
      , version: '25.0'
      , windows: true
      , osversion: '7'
      , a: true
      }
    , 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:24.0) Gecko/20100101 Firefox/24.0': {
        gecko: true
      , firefox: true
      , version: '24.0'
      , mac: true
      , osversion: '10.8'
      , a: true
      }
    , 'Mozilla/5.0 (X11; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0': {
        gecko: true
      , firefox: true
      , version: '21.0'
      , linux: true
      , a: true
      }
    , 'Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20121202 Firefox/17.0 Iceweasel/17.0.1': {
        gecko: true
      , firefox: true
      , version: '17.0'
      , linux: true
      , c: true
      }
    , 'Mozilla/5.0 (X11; Linux x86_64; rv:15.0) Gecko/20120724 Debian Iceweasel/15.0': {
        gecko: true
      , firefox: true
      , version: '15.0'
      , linux: true
      , c: true
      }
    , 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:15.0) Gecko/20120910144328 Firefox/15.0.2': {
        gecko: true
      , firefox: true
      , version: '15.0'
      , windows: true
      , osversion: '8'
      , c: true
      }
    , 'Mozilla/5.0 (Windows; U; Windows NT 6.1; WOW64; en-US; rv:2.0.4) Gecko/20120718 AskTbAVR-IDW/3.12.5.17700 Firefox/14.0.1': {
        gecko: true
      , firefox: true
      , version: '14.0'
      , windows: true
      , osversion: '7'
      , c: true
      }
    , 'Mozilla/5.0 (Windows NT 5.1; rv:6.0) Gecko/20100101 Firefox/6.0 FirePHP/0.6': {
        gecko: true
      , firefox: true
      , version: '6.0'
      , windows: true
      , osversion: 'XP'
      , c: true
      }
    , 'Mozilla/5.0 (X11; Linux x86_64; rv:2.2a1pre) Gecko/20100101 Firefox/4.2a1pre': {
        gecko: true
      , firefox: true
      , version: '4.2'
      , linux: true
      , c: true
      }
    , 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:2.0) Gecko/20100101 Firefox/4.0': {
        gecko: true
      , firefox: true
      , version: '4.0'
      , mac: true
      , osversion: '10.6'
      , c: true
      }
    , 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2b1) Gecko/20091014 Firefox/3.6b1 GTB5': {
        gecko: true
      , firefox: true
      , version: '3.6'
      , windows: true
      , osversion: '7'
      , c: true
      }
    , 'Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.0.15) Gecko/2009101601 Firefox 2.1 (.NET CLR 3.5.30729)': {
        gecko: true
      , firefox: true
      , version: '2.1'
      , windows: true
      , osversion: 'Vista'
      , c: true
      }
    , 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.7) Gecko/20061014 Firefox/1.5.0.7': {
        gecko: true
      , firefox: true
      , version: '1.5'
      , linux: true
      , c: true
      }
    , 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) FxiOS/3.0 Mobile/13E238 Safari/601.1.46': {
        firefox: true
      , version: '3.0'
      , osversion: '9.3.1'
      , ios: true
      , iphone: true
      , mobile: true
      , a: true
      , webkit: true
    }
  }
  , SeaMonkey: {
      'Mozilla/5.0 (Windows NT 5.2; rv:10.0.1) Gecko/20100101 Firefox/10.0.1 SeaMonkey/2.7.1': {
        gecko: true
      , seamonkey: true
      , version: '2.7'
      , windows: true
      , osversion: '2003'
      , x: true
      }
    , 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.5; rv:10.0.1) Gecko/20100101 Firefox/10.0.1 SeaMonkey/2.7.1': {
        gecko: true
      , seamonkey: true
      , version: '2.7'
      , mac: true
      , osversion: '10.5'
      , x: true
      }
    , 'Mozilla/5.0 (X11; Linux i686; rv:10.0.1) Gecko/20100101 Firefox/10.0.1 SeaMonkey/2.7.1': {
        gecko: true
      , seamonkey: true
      , version: '2.7'
      , linux: true
      , x: true
      }
    }
  , BlackBerry: {
      'Mozilla/5.0 (BB10; Touch) AppleWebKit/537.10+ (KHTML, like Gecko) Version/10.1.0.4633 Mobile Safari/537.10+': {
        blackberry: true
      , version: '10.1'
      , webkit: true
      , mobile: true
      , a: true
      }
    , 'Mozilla/5.0 (BB10; Kbd) AppleWebKit/537.10+ (KHTML, like Gecko) Version/10.1.0.1429 Mobile Safari/537.10+': {
        blackberry: true
      , version: '10.1'
      , webkit: true
      , mobile: true
      , a: true
      }
    , 'Mozilla/5.0 (PlayBook; U; RIM Tablet OS 2.1.0; en-US) AppleWebKit/536.2+ (KHTML, like Gecko) Version/7.2.1.0 Safari/536.2+': {
        blackberry: true
      , osversion: '2.1.0'
      , version: '7.2'
      , webkit: true
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (PlayBook; U; RIM Tablet OS 1.0.0; en-US) AppleWebKit/534.11 (KHTML, like Gecko) Version/7.1.0.7 Safari/534.11': {
        blackberry: true
      , osversion: '1.0.0'
      , version: '7.1'
      , webkit: true
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (BlackBerry; U; BlackBerry 9900; en) AppleWebKit/534.11+ (KHTML, like Gecko) Version/7.1.0.346 Mobile Safari/534.11+': {
        blackberry: true
      , version: '7.1'
      , webkit: true
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (BlackBerry; U; BlackBerry 9360; en) AppleWebKit/534.11+ (KHTML, like Gecko) Version/7.0.0.530 Mobile Safari/534.11+': {
        blackberry: true
      , version: '7.0'
      , webkit: true
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (BlackBerry; U; BlackBerry 9800; en-US) AppleWebKit/534.8+ (KHTML, like Gecko) Version/6.0.0.450 Mobile Safari/534.8+': {
        blackberry: true
      , version: '6.0'
      , webkit: true
      , mobile: true
      , x: true
      }
    , 'BlackBerry9800/5.0.0.862 Profile/MIDP-2.1 Configuration/CLDC-1.1 VendorID/331 UNTRUSTED/1.0 3gpp-gba': {
        blackberry: true
      , version: '5.0'
      , mobile: true
      , x: true
      }
    , 'BlackBerry8320/4.5.0.52 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/179': {
        blackberry: true
      , version: '4.5'
      , mobile: true
      , x: true
      }
    , 'BlackBerry8700/4.1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/179': {
        blackberry: true
      , version: '4.1'
      , mobile: true
      , x: true
      }
    }
  , 'Windows Phone': {
      'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Lumia 920; Vodafone)': {
        windowsphone: true
      , osversion: '8.0'
      , msie: true
      , version: '10.0'
      , mobile: true
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Lumia 920)': {
        windowsphone: true
      , osversion: '8.0'
      , msie: true
      , version: '10.0'
      , mobile: true
      , a: true
      }
    , 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0)': {
        windowsphone: true
      , osversion: '7.5'
      , msie: true
      , version: '9.0'
      , mobile: true
      , c: true
      }
    , 'Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.0; Trident/3.1; IEMobile/7.0; Nokia;N70)': {
        windowsphone: true
      , osversion: '7.0'
      , msie: true
      , version: '7.0'
      , mobile: true
      , c: true
      }
    , 'Mozilla/5.0 (Windows Phone 10.0; Android 4.2.1; DEVICE INFO) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Mobile Safari/537.36 Edge/12.0': {
        windowsphone: true
      , osversion: '10.0'
      , msedge: true
      , version: '12.0'
      , mobile: true
      , a: true
      }
    , 'Mozilla/5.0 (Mobile; Windows Phone 8.1; Android 4.0; ARM; Trident/7.0; Touch; rv:11.0; IEMobile/11.0; Microsoft; Lumia 640 LTE) like iPhone OS 7_0_3 Mac OS X AppleWebKit/537 (KHTML, like Gecko) Mobile Safari/537': {
        windowsphone: true
      , webkit: true
      , osversion: '8.1'
      , msie: true
      , version: '11.0'
      , mobile: true
      , a: true
      }
    }
  , WebOS: {
      'Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.5; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/234.83 Safari/534.6 TouchPad/1.0': {
        touchpad: true
      , webos: true
      , osversion: '3.0.5'
      , version: '234.83'
      , webkit: true
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.2; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/234.40.1 Safari/534.6 TouchPad/1.0': {
        touchpad: true
      , webos: true
      , osversion: '3.0.2'
      , version: '234.40'
      , webkit: true
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.0; U; de-DE) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/233.70 Safari/534.6 TouchPad/1.0': {
        touchpad: true
      , webos: true
      , osversion: '3.0.0'
      , version: '233.70'
      , webkit: true
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; webOS/2.1.2; U; xx-xx) AppleWebKit/534.6 (KHTML, like Gecko) webOSBrowser/221.11 Safari/534.6 Pre/3.0': {
        webos: true
      , osversion: '2.1.2'
      , webkit: true
      , version: '221.11'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (webOS/1.4.1.1; U; en-US) AppleWebKit/532.2 (KHTML, like Gecko) Version/1.0 Safari/532.2 Pre/1.0': {
        webos: true
      , osversion: '1.4.1.1'
      , webkit: true
      , version: '1.0'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (webOS/1.0; U; en-US) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/1.0 Safari/525.27.1 Pre/1.0': {
        webos: true
      , osversion: '1.0'
      , webkit: true
      , version: '1.0'
      , mobile: true
      , x: true
      }
    }
  , Android: {
      'Mozilla/5.0 (Linux; U; Android 4.4.2; de-de; Nexus 7 Build/KOT49H) AppleWebKit/537.16 (KHTML, like Gecko) Version/4.0 Mobile Safari/537.16': {
        android: true
      , osversion: '4.4.2'
      , webkit: true
      , version: 4.0
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Android 4.3; de-de; Galaxy Nexus Build/JWR66Y) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30': {
        android: true
      , osversion: '4.3'
      , webkit: true
      , version: 4.0
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Android 4.2; en-us; Nexus 10 Build/JVP15I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30': {
        android: true
      , osversion: '4.2'
      , webkit: true
      , version: 4.0
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Android 3.2; de-de; A100 Build/HTJ85B) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13': {
        android: true
      , osversion: '3.2'
      , webkit: true
      , version: 4.0
      , tablet: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Android 2.3.4; en-us; T-Mobile G2 Build/GRJ22) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1': {
        android: true
      , osversion: '2.3.4'
      , webkit: true
      , version: 4.0
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Android 1.6; ar-us; SonyEricssonX10i Build/R2BA026) AppleWebKit/528.5+ (KHTML, like Gecko) Version/3.1.2 Mobile Safari/525.20.1': {
        android: true
      , osversion: '1.6'
      , webkit: true
      , version: 3.1
      , mobile: true
      , x: true
      }
    }
  , Bada: {
      'Mozilla/5.0 (SAMSUNG; SAMSUNG-GT-S8500/S8500XPKJ1; U; Bada/2.0; it-it) AppleWebKit/534.20 (KHTML, like Gecko) Dolfin/3.0 WVGA SMM-MMS/1.2.0 OPN-B': {
        bada: true
      , osversion: '2.0'
      , webkit: true
      , version: '3.0'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (SAMSUNG; SAMSUNG-GT-S8500/S8500XXJL2; U; Bada/1.2; de-de) AppleWebKit/533.1 (KHTML, like Gecko) Dolfin/2.2 Mobile WVGA SMM-MMS/1.2.0 OPN-B': {
        bada: true
      , osversion: '1.2'
      , webkit: true
      , version: '2.2'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (SAMSUNG; SAMSUNG-GT-S8500/S8500XXJF4; U; Bada/1.0; fr-fr) AppleWebKit/533.1 (KHTML, like Gecko) Dolfin/2.0 Mobile WVGA SMM-MMS/1.2.0 OPN-B': {
        bada: true
      , osversion: '1.0'
      , webkit: true
      , version: '2.0'
      , mobile: true
      , x: true
      }
    }
  , Tizen: {
      'Mozilla/5.0 (Linux; Tizen 2.2; sdk) AppleWebKit/537.3 (KHTML, like Gecko) Version/2.2 Mobile Safari/537.3': {
        tizen: true
      , osversion: '2.2'
      , webkit: true
      , version: '2.2'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; Tizen 2.1; sdk) AppleWebKit/537.3 (KHTML, like Gecko) Version/2.1 Mobile Safari/537.3': {
        tizen: true
      , osversion: '2.1'
      , webkit: true
      , version: '2.1'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Tizen 2.0; en-us) AppleWebKit/537.1 (KHTML, like Gecko) Mobile TizenBrowser/2.0': {
        tizen: true
      , osversion: '2.0'
      , webkit: true
      , version: '2.0'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Tizen/1.0 like Android; en-us; AppleWebKit/534.46 (KHTML, like Gecko) Tizen Browser/1.0 Mobile': {
        tizen: true
      , osversion: '1.0'
      , webkit: true
      , version: '1.0'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (SAMSUNG; SAMSUNG-GT-i9500/1.0; U; Tizen/1.0 like Android; en-us) AppleWebKit/534.46 (KHTML, like Gecko) SLP Browser/1.0 Mobile': {
        tizen: true
      , osversion: '1.0'
      , webkit: true
      , version: '1.0'
      , mobile: true
      , x: true
      }
    }
  , Sailfish: {
      'Mozilla/5.0 (Maemo; Linux; U; Jolla; Sailfish; Mobile; rv:26.0) Gecko/26.0 Firefox/26.0 SailfishBrowser/1.0 like Safari/538.1': {
        sailfish: true
      , gecko: true
      , version: '1.0'
      , mobile: true
      , x: true
      }
    , 'Mozilla/5.0 (Linux; U; Jolla; Sailfish; Mobile; rv:20.0) Gecko/20.0 Firefox/20.0 Sailfish Browser/1.0 like Safari/535.19': {
        sailfish: true
      , gecko: true
      , version: '1.0'
      , mobile: true
      , x: true
      }
    }
  , PhantomJS: {
      'Mozilla/5.0 (Macintosh; Intel Mac OS X) AppleWebKit/534.34 (KHTML, like Gecko) PhantomJS/1.5.0 Safari/534.34': {
        phantom: true
      , webkit: true
      , version: '1.5'
      , mac: true
      , x: true
      }
    }
	, Vivaldi: {
		'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.99 Safari/537.36 Vivaldi/1.0.303.52' : {
			vivaldi: true
			, version: '1.0'
			, mac: true
      , osversion: '10.11.1'
			, blink: true
			, a: true
		},
		'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.99 Safari/537.36 Vivaldi/1.0.303.52': {
			vivaldi: true
			, version: '1.0'
			, windows: true
      , osversion: '10'
			, blink: true
			, a: true
		}
	}
  , Generic: {
    'Generic/2.15 libww': {
      name: 'Generic'
    , version: '2.15'
    , x: true
    }
  }
  , Googlebot: {
    'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)': {
      googlebot: true
    , version: '2.1'
    , x: true
    }
  }
  , "UC Browser": {
    'Mozilla/5.0 (iPad; U; CPU OS 9 like Mac OS X; en-us; iPad4,4) AppleWebKit/534.46 (KHTML, like Gecko) UCBrowser/2.4.0.367 U3/1 Safari/7543.48.3': {
      ucbrowser: true,
      version: '2.4.0.367',
      webkit: true,
      ipad: true,
      ios: true,
      osversion: 9,
      tablet: true,
      a: true
    },
    'Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; SM-T210R Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30 UCBrowser/2.3.2.300': {
      android: true,
      osversion: '4.1.2',
      tablet: true,
      ucbrowser: true,
      version: '2.3.2.300',
      webkit: true,
      x: true
    }
    , 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X; en-US) AppleWebKit/537.51.1 (KHTML, like Gecko) Mobile/13E238 UCBrowser/10.7.0.782 Mobile': {
        iphone: true
      , ios: true
      , mobile: true
      , osversion: '9.3.1'
      , version: '10.7.0.782'
      , webkit: true
      , a: true
      , ucbrowser: true
    }
  }
  , "QupZilla": {
    'Mozilla/5.0 (Macintosh; Intel Mac OS X) AppleWebKit/538.1 (KHTML, like Gecko) QupZilla/1.8.2 Safari/538.1': {
      mac: true,
      qupzilla: true,
      version: '1.8.2',
      webkit: true,
      x: true
    },
    'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.21 (KHTML, like Gecko) QupZilla/1.8.6 Safari/537.21': {
      windows: true,
      osversion: '8',
      qupzilla: true,
      version: '1.8.6',
      webkit: true,
      x: true
    }
  }
  , 'Maxthon': {
    'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E238 Safari/601.1 MXiOS/4.8.6.59': {
        mobile: true
      , ios: true
      , iphone: true
      , version: '4.8.6.59'
      , osversion: '9.3.1'
      , webkit: true
      , maxthon: true
      , a: true
    }
  }
  , 'Epiphany': {
    'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/602.1 (KHTML, like Gecko) Version/8.0 Safari/602.1 Debian/buildd-unstable (3.18.5-1) Epiphany/3.18.5': {
      epiphany: true
      , x: true
      , webkit: true
      , version: '3.18.5'
      , linux: true
    }
  }
  , 'Puffin': {
    'Mozilla/5.0 (X11; U; Linux x86_64; zh-TW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.114 Safari/537.36 Puffin/3.7.0IT': {
        linux: true
      , blink: true
      , puffin: true
      , version: '3.7'
      , x: true
    }
  }, 'Sleipnir': {
    'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36 Sleipnir/6.1.4': {
      sleipnir: true
      , blink: true
      , windows: true
      , osversion: '7'
      , x: true
      , version: '6.1.4'
    }
  }
  , 'K-Meleon': {
    'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20140105 Firefox/24.0 K-Meleon/74.0': {
      windows: true
      , osversion: '7'
      , kMeleon: true
      , version: '74.0'
      , gecko: true
      , x: true
    }
  }
  , 'Chromium': {
    'Mozilla/5.0 (Linux; Ubuntu 14.04 like Android 4.4) AppleWebKit/537.36 Chromium/35.0.1870.2 Mobile Safari/537.36': {
        mobile: true
      , linux: true
      , chromium: true
      , version: '35.0'
      , blink: true
      , a: true
    }
    , 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/50.0.2661.102 Chrome/50.0.2661.102 Safari/537.36': {
      chromium: true
      , a: true
      , version: '50.0'
      , linux: true
      , blink: true
    }
  }
  , 'SlimerJS' : {
    'Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 SlimerJS/0.7': {
      linux: true
      , slimer: true
      , version: '0.7'
      , gecko: true
      , x: true
    }
  }
  , 'Samsung Internet for Android' : {
    'Mozilla/5.0 (Linux; Android 5.0.2; SAMSUNG SM-G925F Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36': {
      mobile: true
      , android: true
      , osversion: '5.0.2'
      , samsungBrowser: true
      , version: '4.0'
      , a: true
      , blink: true
    }
  }
}
