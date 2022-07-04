<?php
require_once "./TypeDevice.php";

$typeDevice = GET('typeDevice', "");
$id = GET('id', "0");
$title = GET('nameDevice', "Thêm công tắc hunonic");
$categoryIrId = GET('categoryIrId', null);


$path = selectIcon($typeDevice, $categoryIrId);
$typeIMG = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$imgBase64 = 'data:image/' . $typeIMG . ';base64,' . base64_encode($data);



function GET($parameter, $defaultString)
{
    $rs = $defaultString;
    if (isset($_GET[$parameter])) {
        $rs = $_GET[$parameter];
    }
    return $rs;
}


function getIconIR($catIrId): string
{

    $linkImage = "img/icon_widget_swt.png";
    if (isset($catIrId)) {
        switch ($catIrId) {
            case IR_CATEGORY_CODE::$CATEGORY_CUSTOM_AC:
            case IR_CATEGORY_CODE::$CATEGORY_AC :
            {
                return "img/icon_wiget_fan.png";
            }
            case IR_CATEGORY_CODE::$CATEGORY_TV:
            {
                return "img/icon_widget_tv.png";
            }
            case IR_CATEGORY_CODE::$CATEGORY_CUSTOM_TV:
            {
                return "img/icon_widget_custom_tv.png";
            }
            case IR_CATEGORY_CODE::$CATEGORY_CUSTOM_USER:
            {
                return "img/icon_widget_user_custom_ir.png";
            }
        }
    }

    return $linkImage;
}

function selectIcon($type, $categoryIrId)
{
    $linkImage = "";
    switch ($type) {
        case TypeDevice::$ROOT_TYPE_DOOR:
        case TypeDevice::$ROOT_TYPE_DOOR_2:
        case TypeDevice::$ROOT_TYPE_DOOR_3:
        case TypeDevice::$ROOT_TYPE_DOOR_4:
        {
            $linkImage = "img/icon_widget_door.png";
            break;
        }
        case TypeDevice::$ROOT_TYPE_BLIND:
        case TypeDevice::$ROOT_TYPE_BLIND_V2:
        {
            $linkImage = "img/icon_widget_blind.png";
            break;
        }
        case TypeDevice::$ROOT_TYPE_GATE:
        {
            $linkImage = "img/icon_widget_gate.png";
            break;
        }
        case TypeDevice::$ROOT_TYPE_SIM_SWITCH:
        {
            $linkImage = "img/icon_widget_sim.png";
            break;
        }
        case TypeDevice::$ROOT_TYPE_IR_WIFI:
        {
            $linkImage = "img/icon_widget_ir.png";
            break;
        }
        case TypeDevice::$ROOT_TYPE_IR_CHILD:
        {
            $linkImage =  getIconIR($categoryIrId);
            break;
        }
        default:
        {
            $linkImage = "img/icon_widget_swt.png";
            break;
        }
    }
    return $linkImage;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="text/html charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title><?= $title ?></title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            padding: 0;
            margin: 0;
            font-family: PingFangSC-Regular, Helvetica, Roboto, Droid Sans, Droid Sans Fallback;
            font-size: calc(100vw / 3.75);
        }

        body {
            height: 100%;
            margin: 0;
            font-size: 16px;
        }

        div.txt {
            font-family: PingFangSC-Medium, Helvetica, Roboto, Droid Sans, Droid Sans Fallback;
            text-align: center;
            font-size: 14px;
            color: #778798;
            margin-bottom: 18px;
        }

        .hideSpan {
            display: block;
            width: 0;
            height: 0;
            overflow: hidden;
        }

        .container {
            height: 100vh;
            background: #f8f8f8;
            overflow: hidden;
            padding: 0.7rem 0.1rem 0;
        }

        .header {
            padding: 0 0.2rem;
            margin-bottom: 0.14rem;
            font-size: 16px;
            color: #495054;
            line-height: 22px;
            text-align: center;
        }

        .header-step {
            font-weight: bold;
        }

        .header-body {
            max-width: 2.3rem;
            font-weight: 200;
            display: inline-block;
            vertical-align: top;
            text-align: left;
        }

        .header-icon {
            width: 22px;
            height: 22px;
            vertical-align: top;
            margin-left: 5px;
        }

        .wrapper {
            width: 2.22rem;
            height: 3.6rem;
            position: fixed;
            bottom: 0.04rem;
            left: 0.75rem;
        }

        .wrapper-img {
            width: 100%;
            height: 100%;
        }</style>
</head>
<body><a href="#{schemeUrl}" id="qbt" style="display: none"></a>
<div id="main"><span id="msg"></span>

    <span class="hideSpan"
          id="icon">
                 <?= $imgBase64 ?>
            </span><span
            class="hideSpan"
            id="schemeUrl">hunonic://app/infoDevice/<?= $id ?></span>

    <span class="hideSpan" id="devName">IdDevice</span><span class="hideSpan"
                                                             id="__">
        Add to Home Screen,Click the button at the bottom of the screen,Choose &quot;Add to Home Screen&quot;,
        Add to Home Screen,Step 1: ,Step 2: </span>

    <span class="hideSpan">
        <canvas id="myCanvas"></canvas>
    </span>
</div>
</body>

<script>

    // function toDataURL(url, callback) {
    //     var xhr = new XMLHttpRequest();
    //     xhr.onload = function() {
    //         var reader = new FileReader();
    //         reader.onloadend = function() {
    //             callback(reader.result);
    //         }
    //         reader.readAsDataURL(xhr.response);
    //     };
    //     xhr.open('GET', url);
    //     xhr.responseType = 'blob';
    //     xhr.send();
    // }
    //
    // toDataURL('https://uploads.sitepoint.com/wp-content/uploads/2015/12/1450377118cors3.png', function(dataUrl) {
    //    // console.log(dataUrl);
    //    // document.getElementById('icon').textContent = dataUrl;
    //     document.getElementById('icon').textContent = "data:image/webp;base64,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";
    // })

    // const getBase64Image = () => {
    //     url = "";
    //     const img = new Image();
    //     img.setAttribute('crossOrigin', 'anonymous');
    //     img.onload = () => {
    //         const canvas = document.createElement("canvas");
    //         canvas.width = img.width;
    //         canvas.height = img.height;
    //         const ctx = canvas.getContext("2d");
    //         ctx.drawImage(img, 0, 0);
    //         const base64 = canvas.toDataURL("image/png");
    //         document.getElementById('icon').textContent = "data:image/png;base64,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";
    //         console.log(base64);
    //     }
    //     img.src = url
    // }
    //
    //  getBase64Image();
    // document.getElementById('icon').textContent = "data:image/png;base64,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";

</script>


<script>
    var locales = document.getElementById('__').innerHTML.split(',');
    document.body.addEventListener('touchmove', function (e) {
        e.preventDefault();
    }, {passive: false});
    if (window.navigator.standalone == true) {
        var d = new Date();
        var t0 = d.getTime();
        var schemeUrl = document.getElementById('schemeUrl').innerHTML;

        function openApp(src) {
            document.getElementById('main').style.display = 'none'
            location.href = src
        }

        openApp(schemeUrl)

        window.addEventListener('focus', () => {
            openApp(schemeUrl)
        })
    } else {
        var devName = document.getElementById('devName').innerHTML;
        var icon = document.getElementById('icon').innerHTML;


        var img = new Image();
        img.src = icon;
        img.onload = () => {
            var imgW = img.width;
            var imgH = img.height;
            var MyCanvas = document.getElementById('myCanvas');
            MyCanvas.style.width = img.width
            MyCanvas.style.height = img.height

            var filledWidth = imgW * 2
            var filledHeight = imgH * 2

            MyCanvas.setAttribute('width', filledWidth)
            MyCanvas.setAttribute('height', filledHeight)
            if (MyCanvas.getContext) {
                var ctx = MyCanvas.getContext('2d')
                ctx.fillStyle = '#fff'
                ctx.fillRect(0, 0, filledWidth, filledHeight)
                ctx.drawImage(img, 0, 0, filledWidth, filledHeight)
                icon = MyCanvas.toDataURL('image/png')


                var meta = document.getElementsByTagName('meta')[0];
                var link = document.createElement('link');
                link.setAttribute('rel', 'apple-touch-icon');
                link.setAttribute('href', icon);
                meta.parentNode.insertBefore(link, meta);
            }

            document.getElementById("msg").innerHTML =
                '<div class="container">' +
                '<p class="header">' +
                '<span class="header-step">' + locales[4] + '</span>' +
                '<span class="header-body">' + locales[1] +
                '<img class="header-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAoCAMAAAChHKjRAAAAgVBMVEX5+fn//Pnx9fmmzvv19/n7+vktkP0qj/49mP2Uxfv//vkpjv6eyvunz/ucyfuQw/swkf07l/4+mP0eif5Zp/yVxvs5lv4njf6izfvo8Pkahv7B3Prl7/kIff9Hnf1psPyFvvvH3/q42Pqy1fru8/kXhP5Qov16t/xytPza6fnP4/nLCUOmAAABCUlEQVQ4y9WR63LCIBCFWWAhxESJpElMvGuv7/+Apdg2oiGMjn88swwwfLPnzELuEnKMM8uSYYxZlCvTQIR5M0YbBqPMWux1tm1zHMsjOq5z8mHCuY6l2QEVeco37SHkyJsOCJUMkKovDPrZF6pzcKcxUWGhmKzdMAT7pEp+SiuwdulyXVglRbXhZxBrtzOnDi0ER+Uuqkw8aEJSJzjZwek2rXyIDgQH5XeSPaR76GUe7MS8Tnfb+dD89kw1HZh4qopQprqJZ+LvO4yOgACS8Ah6PRMkPSg8gnin2oMC3yIpDkCXdgt6LTLzoGZVCzERQkpb/5t4PbfDz2ya/ZVbv9vBQj0FAZEH6xsKqBA1Gz6FdAAAAABJRU5ErkJggg==">' +
                '</span>' +
                '</p>' +
                '<p class="header">' +
                '<span class="header-step">' + locales[5] + '</span>' +
                '<span class="header-body">' + locales[2] +
                '<img class="header-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABCCAMAAADUivDaAAAAM1BMVEUAAABqanNoaHFpaXJoaHJsbHRoaHJoaHJqanJqanJqanNoaHSAgIBpaXJqanFpaXFoaHEf0njmAAAAEHRSTlMAdtzSejntpmVeVCwCuIe5arKUBwAAANxJREFUWMPtmMsOgyAUREe4QHnZ+/9f27Ko1jQx6hCbNp4dmxMgJHcGzGSp1usGvK2S8UGJRndhYsECZ3U31uGNmx7iholRDzIu9kDtwymBa4ZilcAWAFEpIgCjFAbISpIhSiK4K0mFVRILryQeSnOGwhhWkYDEKQKeBEohTSGUYmiK4VJcij6KIMML1xRuWkrYpkhYIW1RGKxiOij4g/DX+VPv4lL8t2IeReRA5Mfy98PBSSmHj2s9QmNVktojQPMxni8TPSoNX6z4eseXTL7q8oWbr/39Ph/4L5AHyjTv70wjii4AAAAASUVORK5CYII=" />' +
                '</span>' +
                '</p>' +
                '</div>' +
                '<div class="wrapper">' +
                '<img class="wrapper-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAcIAAAK6CAMAAACdX6xGAAAC8VBMVEUAAAD///+jparQ0tTExMn////c3N3////////////f3+H5+fn////q6uzf39/b29u0tLrd3uD19fX///+lpqujpKqjpavy8vL///+jpKv////j4+UAAACio6mjpKujpKukpaz////Z2drb29t8fH7c3NyjpKqkpqyjo6vb29vb29vc3Nylpazc3NwAAAAAAAAAAACEhIR6enqXnK3l5eX////29vba2tr39/f09fX9/v7x8fHz8/P4+fjw8PHv7+/q6uvV1dXn5+gBAQHk5OT6+voC3mwC2mqjo6oGxmL7/fwPwC0TwzEat/oD1mgFy2QawfscevMddvMbhPRZ93QdfvMbs/kau/rr7u1Y9HIYxfscgfMccvIB4Wzi4uMavvpU8m8D0mYFyGMbn/cC4m758fX18PQcl/YBjvoGw2EXxjR5eXobrfkGxGH48/AbpvhM7GcEzmUAhfgckPVS8W0JvSckz0EcivUFyWMAffYayDdP7mpH6WNC5V1CQkIQEBDi8f4zMzMfzDz2/P0AlfwdHR1TU1PP0NAp00Y74FccyTkBwl3x+f412lEnjPW63/yD1fxJsvqBgYPE5f278sQv10zN6v4Rr/lntfm+v8ADnP1bu/rV7Nrq9v/Y7v6c68Ke0/xww/th350Ay19Ho/cpm/akw/Hh6vDn7urKysqKioy25f15zPo3qPkUbPIpKSkmpfmfn58d1XUqxENjxvs2zPqurrCTlJVi1fsTovpgpveu3P2AvPXt/POIyfxA4Y0myHQUl/gzt/tcXFyR2fvExMQor/qq7spwcHBQ0ftZm/YTjPbk++yg46vH9Nyq67Ul3n1JkvO6urx65Kw/yPoMl/q1tbaN6LnW+eC58NNr5KXd+ejf7+PG8c5o7X9RwPs1lvUT1G9jY2Oj4f0myPt0rPYSg/WA3pA60oMr03s2hfST8KJm2Xlqamr9OCx4841U25RR1GfR4fG50fM9ylTbTVCqZnoUx2pckMlkh7jxm5ubIVMiAAAANXRSTlMAZmZmZjQPRj4kZokZZi6AZgiJXSvPhGxNn1NniFJ58F5X++kfSrg24tWqlEHAX+CwhseuYVKgymsAADYJSURBVHja7JrLkqIwFIaDIYFQQUixgIKZhTIs1HJuNVVZ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" />' +
                '</div>';


            if (location.href.indexOf('data:text/html') !== 0) {
                var Html = document.getElementsByTagName('html')[0];
                var htmlTxt = '<!DOCTYPE html><html>' + Html.innerHTML + '</html>';

                var Base64 = {
                    encode(str) {
                        return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
                            function toSolidBytes(match, p1) {
                                return String.fromCharCode('0x' + p1);
                            }));
                    },
                    decode(str) {
                        return decodeURIComponent(atob(str).split('').map(function (c) {
                            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                        }).join(''));
                    }
                };

                location.href = 'data:text/html;base64,' + Base64.encode(htmlTxt);
            }
        }
    }</script>


</html>
