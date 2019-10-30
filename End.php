<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/End.css">
</head>
<body>
<div class="end">
  <div class="alert">
    <h1 class="title">游戏结束</h1>
    <div class="alert-content">
      <div class="ranking">本局分数：
        <div>n/a</div>
      </div>
      <div class="branch">本局时间:
        <div>
          n/a
        </div>
      </div>
      <div class="operation">
        <a href="/PlayingFeld.html">再来一局</a>
        <button>查看排名</button>
      </div>
    </div>
  </div>
</div>
<div class="RankingList">
  <div class="container">
    <table class="table">
      <caption>排行榜</caption>
      <thead>
      <tr>
        <th>名次</th>
        <th>名称</th>
        <th width="60%">分数</th>
        <th>时间</th>
      </tr>
      </thead>
      <tbody>
      <!--      <tr><td>{$key}</td><td>{$val['username']}</td><td>{$val['crystal']}</td><td>{$val['date']}</td></tr>-->
      </tbody>
    </table>
  </div>
</div>
<script src="./js/vendor/jquery-3.4.1.min.js"></script>
<script>
    $(function () {
        let data = sessionStorage.getItem('score').split('&');
        data.forEach(function (i, t) {
            switch (t) {
                case 1:
                    $('.ranking div').text(i.split('=')[1]);
                    break;
                case 2:
                    $('.branch div').text(i.split('=')[1] + 's');
                    break;
            }
        });
        $('button').on('click', function () {
            $('.end').hide();
            $('.RankingList').show();
            $('body').css('background', '#fff');
        });
        let ranking = "";
        $.get('./score.php', function (data) {
            bubbleSort(JSON.parse(data)).forEach(function (i, t) {
                ranking+="<tr><td>"+(t+1)+"</td><td>"+i[0]+"</td><td>"+i[1]+"</td><td>"+i[2]+"</td></tr>";
            });
        $('.table tbody').html(ranking);
        });

        function bubbleSort(arr) {
            var len = arr.length;
            for (var i = 0; i < len - 1; i++) {
                for (var j = 0; j < len - 1 - i; j++) {
                    if (arr[j][2] > arr[j + 1][2]) {        // 相邻元素两两对比
                        var temp = arr[j + 1];        // 元素交换
                        arr[j + 1] = arr[j];
                        arr[j] = temp;
                    }
                }
            }
            return arr;
        }
    })
</script>
</body>
</html>
